<?php

declare(strict_types=1);

namespace App\controller;

use Framework\View;

class DisconnectController
{
    public function __construct()
    {
        $this->view = new View();  
    }

    public function __invoke()
    {
        $this->view->render('disconnect_page');
    }
}
