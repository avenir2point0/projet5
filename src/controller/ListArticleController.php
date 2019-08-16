<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\ArticleDAO;
use Framework\View;

class ListArticleController
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
            $articles = $this->articleDAO->getArticles();
            $this->view->render(
                'article_modification_list', [
                'articles' => $articles
                ]
            );
            return;
        }
        
        header('Location:' .(new \Framework\UrlGenerator)->generate('home'));
    }
}
