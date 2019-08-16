<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\ArticleDAO;

class DeleteArticleController
{
    public function __invoke()
    {
        if(isset($_POST['submit'])) {
            if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                $articleDAO = new ArticleDAO();
                $articleDAO->deleteArticle($_POST);
                header('Location:'.(new \Framework\UrlGenerator)->generate('admin'));
            }

            echo 'Probleme d\'authentification, essayez plus tard';
        }
    }
}
