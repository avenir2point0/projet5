<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\ArticleDAO;
use App\DAO\CommentDAO;
use Framework\View;

class CreateCommentController
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
        $article = $this->articleDAO->getArticle($params['id']);
        $this->view->render(
            'comment_creation_form', [
            'article' => $article,
            'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
            ]
        );
    }
}
