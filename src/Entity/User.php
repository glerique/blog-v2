<?php 

namespace App\Entity;



class User extends Entity
{
    private $lastName;
    private $firstName;
    private $email;
    private $nickname;
    private $password;
    private $userRole;

    //GETTERS
        
    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getpassword()
    {
        return $this->password;
    }

    public function getUserRole()
    {
        return $this->userRole;
    }

    //SETTERS
    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }
}