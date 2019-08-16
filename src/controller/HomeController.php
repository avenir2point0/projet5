<?php

declare(strict_types=1);

namespace App\Controller;

use App\DAO\ArticleDAO;
use Framework\View;

class HomeController
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
        $articles = $this->articleDAO->getNewArticles();
        $this->view->render(
            'home', [
            'articles' => $articles
            ]
        );
    }
}
