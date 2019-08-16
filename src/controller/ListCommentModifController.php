<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\CommentDAO;
use Framework\View;

class ListCommentModifController
{
    private $commentDAO;
    private $view;

    public function __construct()
    {
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function __invoke()
    {
        if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == 1) {
            $comments = $this->commentDAO->getComments();
            $this->view->render(
                'comment_modification_list', [
                'comments' => $comments
                ]
            );
            return;
        }

        header('Location:' .(new \Framework\UrlGenerator)->generate('home'));
    }
}
