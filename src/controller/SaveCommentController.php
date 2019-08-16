<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\CommentDAO;
use Framework\View;

class SaveCommentController
{
    private $commentDAO;

    public function __construct()
    {
        $this->commentDAO = new CommentDAO();
    }

    public function __invoke()
    {
        if(isset($_POST['submit'])) {
            if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                $this->commentDAO->saveComment($_POST);
                header('Location:'.(new \Framework\UrlGenerator)->generate('home'));
            }
        }
    }
}
