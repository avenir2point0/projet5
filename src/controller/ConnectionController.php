<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\UserDAO;
use Framework\View;

class ConnectionController
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
                $userDAO->connection($_POST);
                header('Location:'.(new \Framework\UrlGenerator)->generate('home'));
            }
        }
        $this->view->render(
            'connection_form', [
            'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
            ]
        );
    }
}
