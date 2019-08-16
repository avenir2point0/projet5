<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\ArticleDAO;
use Framework\View;

class ModifArticleController
{
    private $articleDAO;
    private $view;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->view = new View();
    }

    public function __invoke(array $params = [])
    {
        if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == 1) {
            $article = $this->articleDAO->getArticle($params['id']);
            $this->view->render(
                'article_modification_form', [
                'article' => $article,
                'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
                ]
            );
            return;
        }

        header('Location:' .(new \Framework\UrlGenerator)->generate('home'));
    }
}
