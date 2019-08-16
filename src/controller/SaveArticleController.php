<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\ArticleDAO;
use Framework\View;

class SaveArticleController
{
    private $articleDAO;
    private $view;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->view = new View();
    }

    public function __invoke()
    {
        if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == 1) {
            if(isset($_POST['submit'])) {
                if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                    $this->articleDAO->saveArticle($_POST);
                    header('Location:'.(new \Framework\UrlGenerator)->generate('admin'));
                }

                echo 'Il y a eu un probleme d\'authentification, réessayez plus tard';
            }
            $this->view->render(
                'article_creation_form', [
                'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
                ]
            );
            return;
        }
        
        header('Location:' .(new \Framework\UrlGenerator)->generate('home'));
    }
}
