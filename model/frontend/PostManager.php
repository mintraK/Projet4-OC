<?php
require_once("admin/model/Billet.php"); 
class PostManager 
{   
    private $_db;
    public function __construct(){
        try
        {
            $this->_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    public function getLastPost()
    {
        $req = $this->_db->query('SELECT id, titre,photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC LIMIT 0, 1');
        $data = $req->fetch();
        return new Billet($data);
    }
    public function getListPosts(){
       
        $req = $this->_db->query('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC');
        while( $data = $req->fetch()){     
                $post = new Billet($data); 
                $allPost[] = $post; 
        }
        return  $allPost;
    }

    public function getPost($postId)
    {
        $req = $this->_db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets WHERE id = ?');
        $req->execute([
            $postId
        ]);
        $data = $req->fetch();
        return new Billet($data); 
    }
}