<?php
require_once("CommentaireUtilisateur.php"); 

class CommentManager extends Manager
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
    public function reportComment(){
    
        $req = $this->_db->prepare('SELECT id, auteur, commentaire  FROM commentaires WHERE signaler = 1 ');
        $req->execute();
        
        while($donnees = $req->fetch())
        {      
            $commentaire = new CommentaireUtilisateur($donnees);
            $allcomment[] = $commentaire; 
        }
        return $allcomment;
    
    }
    public function deleteCommentOfArticle($postId){
       
        $req= $this->_db->prepare('DELETE FROM commentaires WHERE id_billet = :id');
        $isDelete = $req->execute(array(
            'id' => $postId
        ));
        return $isDelete;
    } 
    public function deleteComment($commentId){
        
        $req= $this->_db->prepare('DELETE FROM commentaires WHERE id = :id');
        $isDelete = $req->execute(array(
            'id' => $commentId));
        return $isDelete;
    }
    public function ignoreComment($commentId){

        $req= $this->_db->prepare('UPDATE commentaires SET signaler=0 WHERE id = :id');
        $isIgnore = $req->execute(array(
            'id' => $_GET['commentId']
        ));
        return $isIgnore;
    }
}