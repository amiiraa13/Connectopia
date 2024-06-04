<?php
//Redirige l'utilisateur vers une autre page
abstract class Controller{
    public function redirect($path){
        header("Location:$path");
        exit();
    }
    abstract public function index();
}
?>