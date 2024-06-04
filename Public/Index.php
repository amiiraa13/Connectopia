<?php
session_start();
//Lance l'appli et lies les fichier entre eux
require_once(__DIR__ . "/../src/models/Db.php");
require_once(__DIR__ . "/../src/models/repository/UserRepository.php");
require_once(__DIR__ . "/../src/models/repository/PostRepository.php");
require_once(__DIR__ . "/../src/models/Post.php");
require_once(__DIR__ . "/../src/models/User.php");
require_once(__DIR__ . "/../src/controllers/Controller.php");
require_once(__DIR__ . "/../src/controllers/LoginController.php");

require_once(__DIR__ . "/../src/controllers/MainController.php");
require_once(__DIR__ . "/../src/controllers/LogoutController.php");
require_once(__DIR__ . "/../core/Router.php");

try{
   $app = new Router();
   $app->start();
}
catch(PDOException $e){
    die($e->getMessage());
}

?>