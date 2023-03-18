<?php

namespace App\Model;

use App\Entity\Post;
use App\Model\Model;

class PostManager extends Model
{
  protected $table = 'post';

  public function setDb(\PDO $db)
  {
    $this->db = $db;
  }

  public function count()
  {
    $query = $this->db->prepare('SELECT COUNT(*) FROM post');
    $query->execute();
    $count = $query->fetchColumn();
    return $count;
  }

  public function add(Post $post)
  {
    $query = $this->db->prepare('INSERT INTO post(title, standfirst, content, author, creationDate, published, userId)
    VALUES(:title, :standfirst, :content, :author, :creationDate, :published, :userId)');
    $query->bindValue(':title', $post->getTitle());
    $query->bindValue(':standfirst', $post->getStandfirst());
    $query->bindValue(':content', $post->getContent());
    $query->bindValue(':author', $post->getAuthor());
    $query->bindValue(':creationDate', $post->getCreationDate());
    $query->bindValue(':published', $post->getPublished());
    $query->bindValue(':userId', $post->getUserId());
    $query->execute();
  }

  public function delete($id)
  {
    $query = $this->db->prepare('DELETE FROM post WHERE id = ' . $id);
    $query->execute();
    if ($query->rowCount() != 1) {
      return false;
    } else {
      return true;
    }
  }

  public function get($id)
  {
    $id = (int) $id;
    $query = $this->db->prepare('SELECT id, title, standfirst, content, author, date_format(creationDate,"%d/%m/%Y") AS creationDate, 
                                    date_format(updateDate,"%d/%m/%Y") AS modificationDate, published, userId FROM post WHERE id = ' . $id);
    $query->execute();
    if ($query->rowCount() != 1) {
      return false;
    } else {
      $donnees = $query->fetch(\PDO::FETCH_ASSOC);
      return new Post($donnees);
    }
  }

  public function getPostTitle($postId)
  {
    $query = $this->db->prepare('SELECT title FROM post WHERE id = ' . $postId);
    $query->execute();
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    
    //Permet d'obtenir le resultat en chaine de caratère et non en tableau 
    return implode($data);
  }

  public function getList()
  {

    $query = $this->db->prepare('SELECT id, title, standfirst, content, date_format(creationDate,"%d/%m/%Y") AS creationDate,
                                   date_format(updateDate,"%d/%m/%Y") AS modificationDate, published, userId FROM post');
    $query->execute();
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\Post');
    $posts = $query->fetchAll();

    return $posts;
  }

  public function getPublishedList()
  {

    $query = $this->db->prepare('SELECT id, title, standfirst, content, author, date_format(creationDate,"%d/%m/%Y") AS creationDate,
                                     date_format(updateDate,"%d/%m/%Y") AS modificationDate, published, userId FROM post WHERE published = "Publié" ORDER BY id DESC');
    $query->execute();
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\Post');
    $posts = $query->fetchAll();

    return $posts;
  }

  public function update(Post $post)
  {
    $query = $this->db->prepare('UPDATE post SET title = :title, standfirst = :standfirst, content = :content, author = :author,  
                                                 updateDate = :updateDate, published = :published, userId = :userId  WHERE id = :id');
    $query->bindValue(':title', $post->getTitle());
    $query->bindValue(':standfirst', $post->getStandfirst());
    $query->bindValue(':content', $post->getContent());
    $query->bindValue(':author', $post->getAuthor());
    $query->bindValue(':updateDate', $post->getUpdateDate());
    $query->bindValue(':published', $post->getPublished());
    $query->bindValue(':userId', $post->getUserId());
    $query->bindValue(':id', $post->getId());
    $query->execute();
  }
}
