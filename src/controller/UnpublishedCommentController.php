<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\CommentDAO;
use Framework\View;

class UnpublishedCommentController
{
    private $commentDAO;
    private $view;

    public function __construct()
    {
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function __invoke(array $params = [])
    {
        if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == 1) {
            $comment = $this->commentDAO->getUnpublishedComment($params['id']);
            $this->view->render(
                'comment_unpublished_form', [
                'comment' => $comment,
                'csrfToken' => $_SESSION['csrfToken'] = (new \App\Tool\TokenGenerator)->generateCsrfToken()
                ]
            );
            return;
        }
        
        header('Location:' .(new \Framework\UrlGenerator)->generate('home'));    
    }
}
