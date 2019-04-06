<?php
require_once("model/Manager.php"); 
require_once("CommentaireUtilisateur.php"); 

class CommentManager extends Manager
{
    // public function getComments($postId)
    // {
    //     $db = $this->dbConnect();
    //     $comments = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
    //     $comments->execute(array($postId));

    //     return $comments;
    // }

    // public function postComment($postId, $author, $comment)
    // {   $db = $this->dbConnect();
    //     $req3 = $db->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, signaler, date_commentaire) VALUES (:id_billet, :auteur, :commentaire, :signaler, NOW())');
    //     $req3->execute(array(
    //         'id_billet' => $postId,
    //         'auteur' => $author,
    //         'commentaire' => $comment,
    //         'signaler' => 0
    //     ));        
    //      header("Location:index.php?action=post&amp;id=.$postId.");
    // }
    public function reportComment(){
    
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, auteur, commentaire  FROM commentaires WHERE signaler = 1 ');
        $req->execute();
        
        while($donnees = $req->fetch())
        {       // creer un nouvelle objet 
                $commentaire = new CommentaireUtilisateur($donnees); 
                // met objet dans un tableau
                $allcomment[] = $commentaire; 
        }
        return $allcomment;
    
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