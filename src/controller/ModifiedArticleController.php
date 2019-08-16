<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\ArticleDAO;

class ModifiedArticleController
{
    public function __invoke()
    {
        if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == 1) {
            if(isset($_POST['submit'])) {
                if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                    $articleDAO = new ArticleDAO();
                    $articleDAO->modifyArticle($_POST);
                    header('Location:'.(new \Framework\UrlGenerator)->generate('admin'));
                }

                echo 'Un probleme est survenu, essayez plus tard';
            }
        }
        
        header('Location:' .(new \Framework\UrlGenerator)->generate('home'));    
    }
}
