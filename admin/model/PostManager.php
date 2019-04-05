<?php
// require "Manager.php";
 require_once("Manager.php"); 
 require_once("Billet.php"); 
// // require "../../admin/Billet.php";
 class PostManager extends Manager
 {
    // public function getLastPost()
    // {
    //     $db = $this->dbConnect();
    //     $req = $db->query('SELECT id, titre,photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC LIMIT 0, 1');
    //     $data = $req->fetch();
    //     return new Billet($data);
    // }
    public function getListPosts(){
        
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC');
        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets WHERE id = ?');
        $req->execute([
            $postId
        ]);
        $data = $req->fetch();
        return new Billet($data);
        
    }
    public function editArticle(Billet $billet){
        $db = $this->dbConnect();
        $titre =  $billet->titre();
        $photo =   $billet->photo();
        $contenu =   $billet->contenu();
        
            $req = $db->prepare('UPDATE billets SET titre = :titre, contenu = :contenu, date_creation= NOW() WHERE id = :id ');
            $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'id' => $billet->id()));

    }

    public function addArticle(Billet $post){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO billets( titre,photo, contenu, date_creation) VALUES(:titre, :photo,:contenu, NOW())');
        $req->execute([ 
            'titre' => $post->titre(),
            'photo' => $post->photo(),
            'contenu' => $post->contenu()
        ]);
            

    }
    public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}