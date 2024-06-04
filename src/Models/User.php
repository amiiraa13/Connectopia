<?php
//Recupere les pokemon et les transforme en objet

class User extends UserRepository {
  private $id;
  private $userName;
  private $password;
  
  public function __construct($id, $userName, $password){
    $this->id=htmlspecialchars($id);
    $this->setUserName($userName);
    $this->setPassword($password);
  }

  public function getId(){ return $this->id; }

  public function getUserName(){ return $this->userName; }
  public function setUserName($userName){ $this->userName = htmlspecialchars($userName); }

  public function getPassword(){ return $this->password;}
  public function setPassword($password){ $this->password=$password; }

  
}
