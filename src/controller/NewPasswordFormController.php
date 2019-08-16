<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\UserDAO;
use Framework\View;

class NewPasswordFormController
{
    public function __construct()
    {
        $this->view = new View();
        $this->userDAO = new UserDAO();
    }

    public function __invoke()
    {
        if(isset($_POST['submit'])) {
            if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                $userDAO = new UserDAO();
                $userDAO->changePassword($_POST);
                header('Location:'.(new \Framework\UrlGenerator)->generate('home'));
            }
        }
        $this->view->render('new_password_form', [
            'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
        ]);
    }
}
