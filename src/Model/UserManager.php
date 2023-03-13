<?php

namespace App\Model;

use App\Entity\User;
use App\Util\Database;

class UserManager extends Database
{

  protected $db; // Instance de PDO

  public function __construct()
  {
    $db = $this->dbConnect();
    $this->setDb($db);
  }

  public function setDb(\PDO $db)
  {
    $this->db = $db;
  }

  public function count()
  {
    $query = $this->db->prepare('SELECT COUNT(*) FROM user');
    $query->execute();
    $count = $query->fetchColumn();
    return $count;
  }

  public function add(User $user)
  {
    $query = $this->db->prepare('INSERT INTO user(lastName, firstName, email, nickname, password, userRole)
        VALUES(:lastName, :firstName, :email, :nickname, :password, :userRole)');
    $query->bindValue(':lastName', $user->getLastName());
    $query->bindValue(':firstName', $user->getFirstName());
    $query->bindValue(':email', $user->getEmail());
    $query->bindValue(':nickname', $user->getNickname());
    $query->bindValue(':password', $user->getPassword());
    $query->bindValue(':userRole', $user->getUserRole());
    $query->execute();
  }

  public function get($id)
  {
    $id = (int) $id;
    $query = $this->db->prepare('SELECT id, lastName, firstName, email, nickname, password, userRole FROM user WHERE id = ' . $id);
    $query->execute();
    if ($query->rowCount() != 1) {
      return false;
    } else {
      $data = $query->fetch(\PDO::FETCH_ASSOC);
      return new User($data);
    }
  }

  public function getNickname($id)
  {
    $id = (int) $id;
    $query = $this->db->prepare('SELECT nickname FROM user WHERE id = ' . $id);
    $query->execute();
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    //Permet d'obtenir le resultat en chaine de caratère et non en tableau 
    return implode($data);
  }

  public function getList()
  {


    $query = $this->db->prepare('SELECT id, lastName, firstName, email, nickname, password, userRole FROM user');
    $query->execute();

    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\User');

    $users = $query->fetchAll();
    return $users;
  }

  public function update(User $user)
  {
    $query = $this->db->prepare('UPDATE user SET lastName = :lastName, firstName = :firstName,  
                                              nickname = :nickname,  userRole = :userRole WHERE id = :id');
    $query->bindValue(':lastName', $user->getLastName());
    $query->bindValue(':firstName', $user->getFirstName());
    $query->bindValue(':nickname', $user->getNickname());
    $query->bindValue(':userRole', $user->getUserRole());
    $query->bindValue(':id', $user->getId());
    $query->execute();
  }

  public function getByEmail($email)
  {
    $query = $this->db->prepare('SELECT * FROM user WHERE email = :email');
    $query->execute([':email' => $email]);
    return $query->fetch(\PDO::FETCH_ASSOC);
  }

  public function getByNickname($nickname)
  {
    $query = $this->db->prepare('SELECT * FROM user WHERE nickname = :nickname');
    $query->execute([':nickname' => $nickname]);
    return $query->fetch(\PDO::FETCH_ASSOC);
  }
}
