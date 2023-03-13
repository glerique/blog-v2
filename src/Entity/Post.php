<?php

namespace App\Entity;

use App\Entity\Entity;



class Post extends Entity
{
    protected $title;
    protected $standfirst;
    protected $content;
    protected $author;
    protected $creationDate;
    protected $updateDate;
    protected $published;
    protected $userId;

    //GETTERS    
    
    public function getTitle()
    {
        return $this->title;
    }

    public function getStandfirst()
    {
        return $this->standfirst;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getupdateDate()
    {
        return $this->updateDate;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    //SETTERS

        public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setStandfirst($standfirst)
    {
        $this->standfirst = $standfirst;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function setupdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    public function setPublished($published)
    {
        $this->published = $published;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}