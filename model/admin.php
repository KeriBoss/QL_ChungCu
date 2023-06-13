<?php
require_once "database.php";

class Admin extends Database{
    /**
     * Login for user
     */
    function login($email, $password){
        $sql = parent::$connection->prepare("SELECT * FROM admin WHERE `admin`.`email` = ? AND `admin`.`password` = ?");
        $sql->bind_param('ss', $email, $password);
        return parent::select($sql);
    }
    /**
     * Register for user
     */
    function register($name, $email, $password){
        $sql = parent::$connection->prepare("INSERT INTO `admin`(`name`, `email`, `password`) VALUES ('?,?,?')");
        $sql->bind_param('sss', $name, $email, $password);
        return $sql->execute();
    }
}