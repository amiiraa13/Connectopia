<?php
//Recupere les pokémon dans la base de donné sous forme de tableau assosiatif

abstract class PostRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getPost(){
        return self::request("SELECT * FROM post")->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function getById($id){
        return self::request("SELECT * FROM post WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByTitle($title){
        return self::request("SELECT * FROM post WHERE title='$title'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertDb($post){
        return self::request("INSERT INTO post(title,content,id_user) VALUES('".$post->getTitle(). "','".$post->getContent()."', ".$_SESSION["id"].")");
    }

    public static function getByContent($content){
        return self::request("SELECT * FROM post WHERE content = '$content' ")->fetch(PDO::FETCH_ASSOC);
    }

    public static function deletePost($post){
        return self::request("DELETE FROM post WHERE id=".$post);
    }

    public static function modifyPost($tata,$tutu,$id){
        return self::request("UPDATE POST SET title = '$tata', content ='$tutu' WHERE id = $id");
    }

}