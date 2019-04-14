<?php
require_once("CommentaireUtilisateur.php"); 

class CommentManager 
{
    public function reportComment(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, auteur, id_billet, commentaire  FROM commentaires WHERE signaler = 1 ');
        $req->execute();
        
        while($donnees = $req->fetch())
        {      
            $commentaire = new CommentaireUtilisateur($donnees);
            $allcomment[] = $commentaire; 
        }
        return $allcomment;
    
    }
    public function deleteCommentOfArticle($postId){
        $db = $this->dbConnect();
        $req= $db->prepare('DELETE FROM commentaires WHERE id_billet = :id');
        $isDelete = $req->execute(array(
            'id' => $postId
        ));
        return $isDelete;
    } 
    public function deleteComment($commentId){
        $db = $this->dbConnect();
        $req= $db->prepare('DELETE FROM commentaires WHERE id = :id');
        $isDelete = $req->execute(array(
            'id' => $commentId));
        return $isDelete;
    }
    public function ignoreComment($commentId){
        $db = $this->dbConnect();
        $req= $db->prepare('UPDATE commentaires SET signaler=0 WHERE id = :id');
        $isIgnore = $req->execute(array(
            'id' => $_GET['commentId']
        ));
        return $isIgnore;
    }
    public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}