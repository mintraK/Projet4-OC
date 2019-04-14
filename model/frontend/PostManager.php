<?php
require_once("admin/model/Billet.php"); 
class PostManager 
{   
    public function getLastPost()
    {   $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre,photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC LIMIT 0, 1');
        $req->execute();
        $data = $req->fetch();
        return new Billet($data);
    }
    public function getListPosts(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC');
        $req->execute();
        while( $data = $req->fetch()){     
                $post = new Billet($data); 
                $allPost[] = $post; 
        }
        return  $allPost;
    }

    public function getPost($postId)
    {   $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets WHERE id = ?');
        $req->execute([
            $postId
        ]);
        $data = $req->fetch();
        return new Billet($data); 
    }
    public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}