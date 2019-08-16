<?php

declare(strict_types=1);

namespace App\controller;

use Framework\View;

class AdminController
{
    public function __construct()
    {
        $this->view = new View();  
    }

    public function __invoke()
    {   
        if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == 1) {
            $this->view->render('admin_page');
            return;
        }

        header('Location:' .(new \Framework\UrlGenerator)->generate('home'));
    }
}
