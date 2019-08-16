<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\UserDAO;
use Framework\View;

class RegisterController
{
    public function __construct()
    {
        $this->userDAO = new UserDAO();
        $this->view = new View();  
    }

    public function __invoke()
    {
        if(isset($_POST['submit'])) {
            if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                $userDAO = new UserDAO();
                $userDAO->register($_POST);
                header('Location:'.(new \Framework\UrlGenerator)->generate('home'));
            }

            echo 'Un probleme est apparu, recommencez plus tard !';
        }
        $this->view->render(
            'register_page', [
            'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
            ]
        );
    }
}
