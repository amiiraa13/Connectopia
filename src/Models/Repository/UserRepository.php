<?php
//Recupere les pokémon dans la base de donné sous forme de tableau assosiatif

abstract class UserRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getUserId($id){
        return self::request("SELECT * FROM User WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserByName($userName, $password){
        return self::request("SELECT * FROM User WHERE username = '$userName' AND password='$password'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function register($userName,$password){
        return self::request("INSERT INTO User(Username,Password) VALUES('$userName','$password')");
    }
    public static function recup($userName){
        return self::request("SELECT * FROM User WHERE username = '$userName'")->fetch(PDO::FETCH_ASSOC);
    }
}