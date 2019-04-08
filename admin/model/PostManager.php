<?php
 require_once("Billet.php"); 
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
    public function editArticle(Billet $billet){
       
        $titre =  $billet->titre();
        $photo =   $billet->photo();
        $contenu =   $billet->contenu();
        
            $req = $this->_db->prepare('UPDATE billets SET titre = :titre, contenu = :contenu, date_creation= NOW() WHERE id = :id ');
            $isEdit =  $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'id' => $billet->id()));
            return $isEdit;

    }

    public function addArticle(Billet $post){
       
        $req = $this->_db->prepare('INSERT INTO billets( titre,photo, contenu, date_creation) VALUES(:titre, :photo,:contenu, NOW())');
        $isAdd = $req->execute([ 
            'titre' => $post->titre(),
            'photo' => $post->photo(),
            'contenu' => $post->contenu()
        ]);  
        return $isAdd;

    }
    public function deleteArticle($postId){
       
        $req = $this->_db->prepare('DELETE FROM billets WHERE id = :id');
        $isDelete = $req->execute(array(
        'id' => $postId));
        return $isDelete;
    }
    
}