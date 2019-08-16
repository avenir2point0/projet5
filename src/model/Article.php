<?php

namespace App\Model;

class Article
{
    private $id;

    private $title;

    private $chapeau;
    
    private $content;
    
    private $author;
    
    private $date_added;

    private $edited;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getChapeau()
    {
        return $this->chapeau;
    }

    /**
     * @param mixed $chapeau
     */
    public function setChapeau($chapeau)
    {
        $this->chapeau = $chapeau;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * @param mixed $date_added
     */
    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;
    }

    /**
     * @return mixed
     */
    public function getEdited()
    {
        return $this->edited;
    }

    /**
     * @param mixed $date_added
     */
    public function setEdited($edited)
    {
        $this->edited = $edited;
    }
}
