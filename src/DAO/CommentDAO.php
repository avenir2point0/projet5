<?php

namespace App\DAO;

use App\Model\Comment;
use Framework\DAO;

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($idArt)
    {
        $sql = 'SELECT id, pseudo, content, published, date_added FROM comment WHERE article_id = ? && published = 1';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['date_added']);
        return $comment;
    }

    public function saveComment($comment)
    {
        extract($comment);
        $sql = 'INSERT INTO comment (pseudo, content, article_id, date_added) VALUES (?, ?, ?, NOW())';
        $this->sql($sql, [$comment['pseudo'], htmlspecialchars($comment['content']), $comment['articleId']]);
        $_SESSION['message'] = sprintf('Votre message a été enregistré, et est en attente de publication');
    }

    public function publishComment($comment)
    {
        extract($comment);
        $sql = 'UPDATE comment SET content = ?, published = "1" WHERE id = ?';
        $this->sql($sql, [$comment['content'], $comment['commentId']]);
        $_SESSION['message'] = sprintf('Le commentaire a été publié avec succès');
    }

    public function modifyComment($comment)
    {
        extract($comment);
        $sql = 'UPDATE comment SET content = ? WHERE id = ?';
        $this->sql($sql, [$comment['content'], $comment['commentId']]);
        $_SESSION['message'] = sprintf('Le commentaire a été modifié avec succès');
    }

    public function deleteComment($comment)
    {
        extract($comment);
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->sql($sql, [$comment['commentId']]);
        $_SESSION['message'] = sprintf('Le commentaire a été supprimé avec succès');
    }

    public function getComments()
    {
        $sql = 'SELECT id, pseudo, content, published, date_added FROM comment WHERE published = 1 ORDER BY id DESC';
        $result = $this->sql($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function getUnpublishedComments()
    {
        $sql = 'SELECT id, pseudo, content, published, date_added FROM comment WHERE published = 0';
        $result = $this->sql($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function getUnpublishedComment($commentId)
    {
        $sql = 'SELECT id, pseudo, content, published, date_added FROM comment WHERE id = ? && published = 0';
        $result = $this->sql($sql, [$commentId]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        }
    }

    public function getComment($commentId)
    {
        $sql = 'SELECT id, pseudo, content, published, date_added FROM comment WHERE id = ? && published = 1';
        $result = $this->sql($sql, [$commentId]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        }
    }

}
