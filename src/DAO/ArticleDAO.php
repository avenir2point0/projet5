<?php

namespace App\DAO;

use App\Model\Article;
use Framework\DAO;

class ArticleDAO extends DAO
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, chapeau, content, author, date_added, edited FROM article ORDER BY id DESC';
        $result = $this->sql($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        return $articles;
    }

    public function getNewArticles()
    {
        $sql = 'SELECT id, title, chapeau, content, author, date_added, edited FROM article ORDER BY id DESC LIMIT 3';
        $result = $this->sql($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        return $articles;
    }

    public function getArticle($idArt)
    {
        $sql = 'SELECT id, title, chapeau, content, author, date_added, edited FROM article WHERE id = ?';
        $result = $this->sql($sql, [$idArt]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        }
    }

    public function saveArticle($article)
    {
        extract($article);
        $sql = 'INSERT INTO article (title, chapeau, content, author, date_added) VALUES (?, ?, ?, ?, NOW())';
        $this->sql($sql, [$article['title'], $article['chapeau'], $article['content'], $article['author']]);
        $_SESSION['message'] = sprintf('L\'article a été enregistré avec succès');
    }

    public function modifyArticle($article)
    {
        extract($article);
        $sql = 'UPDATE article SET  title = ?, author = ?, chapeau = ?, content = ?,edited = NOW() WHERE id = ?';
        $this->sql($sql, [$article['title'], $article['author'], $article['chapeau'], $article['content'], $article['articleId']]);
        $_SESSION['message'] = sprintf('L\'article a été modifié avec succès');
    }

    public function deleteArticle($article)
    {
        extract($article);
        $sql = 'DELETE FROM article WHERE id = ?';
        $this->sql($sql, [$article['articleId']]);
        $_SESSION['message'] = sprintf('L\'article a été supprimé avec succès');
    }

    private function buildObject(array $row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setChapeau($row['chapeau']);
        $article->setContent($row['content']);
        $article->setDateAdded($row['date_added']);
        $article->setAuthor($row['author']);
        $article->setEdited($row['edited']);
        return $article;
    }
}
