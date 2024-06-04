<?php



class MainController extends Controller{
    public function index(){
        try{  
            
           
            if (!isset($_SESSION["id"])) {
                header("Location:/login");
                    exit();
            }$userID =$_SESSION["id"];
            $user = User::getUserId($userID);
            $username =$user["Username"];
            
            if (isset($_POST["newVal"])) {
                Post::modifyPost($_POST["newTitle"],$_POST["newContent"],$_POST["newVal"]);
            }
            if(isset($_POST["delete"])){
                Post::deletePost($_POST["delete"]);
            }  
            if(isset($_POST["submit"])){
                $postUpdate = new post ($_POST["title"],$_POST["text"],$_SESSION["id"]);
                Post::insertDB($postUpdate);
            }
            $postDb = post::getPost();
            $posts = [];
          
            foreach($postDb as $post){
                $posts[] = new Post($post["title"],$post["content"],$post["id_user"], $post["id"]);
            }
            
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }   
        require(__DIR__ . "/../../views/main.php");
    }
}
?>