<?php

namespace App\DAO;

use App\Model\User;
use App\Tool\TokenGenerator;
use App\Tool\Mailer;
use Framework\DAO;

class UserDAO extends DAO
{
    public function register($post)
    {
        $result = $this->sql('SELECT pseudo FROM user AS u WHERE u.pseudo = :pseudo',  [':pseudo' => $post['pseudo']])->fetch();

        if (!empty($result)) {
            $_SESSION['message'] = sprintf('Le pseudo suivant : %s est déjà utilisé, veuillez choisir un autre pseudo', $post['pseudo']);
            return;
        }

        if (!preg_match("#^[a-zA-Z0-9_]{3,16}$#", $post['pseudo'])) {
            $_SESSION['message'] = sprintf('Le pseudo %s n\'est pas valide, veuillez en soumettre un valide', $post['pseudo']);
            return;
        }

        if (!preg_match("#^[a-zA-Z0-9_]{3,16}$#", $post['name'])) {
            $_SESSION['message'] = sprintf('Le nom %s n\'est pas valide, veuillez en soumettre un valide', $post['name']);
            return;
        }
        
        $resultMail = $this->sql('SELECT email FROM user AS u WHERE u.email = :email', [':email' => $post['email']])->fetch();

        if (!empty($resultMail)) {
            $_SESSION['message'] = sprintf('L\'email suivant : %s est déjà utilisé, veuillez choisir un autre email', $post['email']);
            return;
        }

        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $post['email'])) {
            $_SESSION['message'] = sprintf('L\'adresse mail %s n\'est pas valide, veuillez en soumettre une valide', $post['email']);
            return;
        }

        if (!preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,12}$#", $post['password'])) {
            $_SESSION['message'] = sprintf('Le mot de passe %s n\'est pas valide, veuillez en soumettre un valide avec une majuscule et un caractère spécial', $post['password']);
            return;
        }

        if ($post['password'] !== $post['password2']) {
            $_SESSION['message'] = sprintf('Les mots de passe doivent être identiques');
            return;
        }

        extract($post);
        $sql = 'INSERT INTO user (name, pseudo, email, password, date_inscription) VALUES (?, ?, ?, ?, NOW())';
        $this->sql($sql, [htmlspecialchars($post['name']), htmlspecialchars($post['pseudo']), htmlspecialchars($post['email']), password_hash($post['password'], PASSWORD_DEFAULT)]);
        $_SESSION['message'] = sprintf('Enregistrement fait avec succès, vous pouvez vous connecter.');
    }


    public function connection($post)
    {
        $result = $this->sql('SELECT password, email FROM user AS u WHERE u.pseudo = :pseudo', [':pseudo' => $post['pseudo']])->fetch();

        if (empty($result)) {
            $_SESSION['message'] = sprintf('Le pseudo suivant : %s est inexistant', $post['pseudo']);
            return;
        }

        if (!preg_match("#^[a-zA-Z0-9_]{3,16}$#", $post['pseudo'])) {
            $_SESSION['message'] = sprintf('Le pseudo %s n\'est pas valide, veuillez en soumettre un valide', $post['pseudo']);
            return;
        }

        if (!password_verify($post['password'], $result['password'])) {
            $_SESSION['message'] = sprintf('Le mot de passe est invalide', $post['password']);
            return;
        }

        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $post['email'])) {
            $_SESSION['message'] = sprintf('L\'adresse mail %s n\'est pas valide, veuillez en soumettre une valide', $post['email']);
            return;
        }

        if ($post['email'] !== $result['email']) {
            $_SESSION['message'] = sprintf('L\'email suivant : %s est invalide', $post['email']);
            return;            
        }
        
        $user = $this->sql('SELECT id, name, pseudo, email, password, date_inscription AS dateInscription, admin FROM user AS u WHERE u.pseudo = :pseudo', [':pseudo' => $post['pseudo']]);
        $user->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $result = $user->fetch();

        if (\is_null($result)) {
            $_SESSION['message'] = sprintf('Le pseudo suivant : %s est inexistant', $post['pseudo']);
            return;
        }
        $_SESSION['user'] = [
            'id' => $result->getId(),
            'name' => $result->getName(),
            'pseudo' => $result->getPseudo(),
            'email' => $result->getEmail(),
            'dateInscription' => $result->getDateInscription(),
            'admin' => $result->getAdmin()
        ];

        $_SESSION['message'] = sprintf('Vous êtes maintenant connecté en tant que "%s"', $post['pseudo']);
    }

    public function forgottenPassword($post)
    {
        $result = $this->sql('SELECT pseudo, email FROM user AS u WHERE u.email = :email', [':email' => $post['email']], ' && u.pseudo = :pseudo', [':pseudo' => $post['pseudo']])->fetch();

        if (empty($result)) {
            $_SESSION['message'] = sprintf('Les identifiants sont invalides', $post['pseudo']);
            return;
        }

        if ($post['email'] !== $result['email'] || $post['pseudo'] !== $result['pseudo']) {
            $_SESSION['message'] = sprintf('Les identifiants sont invalides', $post['pseudo']);
            return;
        }

        $token = (new TokenGenerator())->generateInt();

        extract($post);
        $sql = 'UPDATE user SET  token = ?, password_is_editing = 1 WHERE pseudo = ?';
        $this->sql($sql, [$token, $post['pseudo']]);
        $_SESSION['message'] = sprintf('Un mail a été envoyé sur votre messagerie');

        $mail = new Mailer;
        $mail->sendMail($post, $token);
    }

    public function changePassword($post)
    {
        if (!preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,12}$#", $post['password'])) {
            $_SESSION['message'] = sprintf('Le mot de passe %s n\'est pas valide, veuillez en soumettre un valide avec une majuscule et un caractère spécial', $post['password']);
            return;
        }

        if ($post['password'] !== $post['password2']) {
            $_SESSION['message'] = sprintf('Les mots de passe doivent être identiques');
            return;
        }

        $result = $this->sql(
            'SELECT token, password_is_editing FROM user AS u 
        WHERE u.token = :token', [':token' =>  $post['token']], ' 
        && u.password_is_editing = 1'
        )->fetch();

        if ($result['password_is_editing'] == 0) {
            $_SESSION['message'] = sprintf('Vous ne pouvez changer de mot de passe qu\'une fois avec cet email');
            return;
        }

        extract($post);
        $sql = "UPDATE user AS u SET  u.password = ? , u.token = null, u.password_is_editing = 0 WHERE u.token = ? && password_is_editing = 1 ";
        $this->sql($sql, [password_hash($post['password'], PASSWORD_DEFAULT), $post['token']]);

        $_SESSION['message'] = sprintf('Le mot de passe a été changé');
    }
}
