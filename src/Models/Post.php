<?php
//Recupere les pokemon et les transforme en objet

class Post extends PostRepository{
 private $id;
 private $id_user;
  private $title;
  private $content;
  
  
  public function __construct($title, $content,$id_user,$id=0){
    $this->title=htmlspecialchars($title);
    $this->setContent($content);
    $this->id=$id;
    $this->setId_user($id_user);
  }
  public function getId(){return $this->id;}
  public function getTitle(){ return $this->title; }
  public function setTitle($title){ $this->title = htmlspecialchars($title); }
  public function getContent(){ return $this->content; }
  public function setContent($content){ $this->content = htmlspecialchars($content); }
  public function getId_user(){ return $this->id_user;}
  public function setId_user($id_user){$this->id_user=$id_user;}

  
}