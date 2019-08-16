<?php

declare(strict_types=1);

namespace App\controller;

use App\DAO\CommentDAO;

class DeleteCommentController
{
    public function __invoke()
    {
        if(isset($_POST['submit'])) {
            if ($_POST['csrfToken'] == $_SESSION['csrfToken']) {
                $commentDAO = new CommentDAO();
                $commentDAO->deleteComment($_POST);
                header('Location:'.(new \Framework\UrlGenerator)->generate('admin'));
            }

            echo 'Un probleme est apparu, essayez plus tard';
        }
    }
}
