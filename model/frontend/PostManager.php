<?php
// require "Manager.php";
require_once("model/frontend/Manager.php"); 
require_once("admin/model/Billet.php"); 
// require "../../admin/Billet.php";
class PostManager extends Manager
{
    public function getLastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre,photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC LIMIT 0, 1');
        $data = $req->fetch();
        return new Billet($data);
    }
    public function getListPosts(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC');
        while( $data = $req->fetch()){     
                $post = new Billet($data); 
                $allPost[] = $post; 
        }
        return  $allPost;
       
    }

    public function getPost($postId)
    {
        // $db = $this->dbConnect();
        // $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        // $req->execute(array($postId));
        // $post = $req->fetch();

        // return $post;
        $db = $this->dbConnect();
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