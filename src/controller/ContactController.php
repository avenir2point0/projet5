<?php

declare(strict_types=1);

namespace App\controller;

use App\Tool\Contact;
use Framework\View;

class ContactController
{
    public function __construct()
    {
        $this->view = new View();
        $this->contactForm = new Contact();
    }

    public function __invoke()
    {
        if(isset($_POST['submit'])) {
            if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                $contactForm = new Contact();
                $contactForm->buildContact($_POST);
                header('Location:'.(new \Framework\UrlGenerator)->generate('home'));
            }
            
            echo 'Un probleme d\'authentification est survenue';
        }
        $this->view->render(
            'contact_form', [
            'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
            ]
        );
        
    }
}
