<?php

require_once('model/frontend/Manager.php');
require_once("admin/model/User.php"); 
class UserManager extends Manager
{
    public function userLogin($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo
        ));
        
        $user = $req->fetch();
         return new User($user);
        }
    public function userExist($pseudo, $mail){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, mail FROM membres WHERE  pseudo = :pseudo OR mail = :mail');
        $req->execute(array(
         'pseudo' => $pseudo,
         'mail' => $mail));
        $res = $req->fetch();
        if(empty($res)){
            return false;
        }
        else{
            return true;
        }
    }
    public function createUser($pseudo, $password_hache, $mail)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membres(pseudo, pwd, mail, dateConnexion) VALUES(:pseudo, :pass, :mail, CURDATE())');
        $isCreate = $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $password_hache,
            'mail' => $mail
        ));
        return $isCreate;
    }
     public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}