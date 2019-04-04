<?php
require_once("model/frontend/Manager.php"); 
require_once("admin/CommentaireUtilisateur.php"); 

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {   $db = $this->dbConnect();
        $req3 = $db->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, signaler, date_commentaire) VALUES (:id_billet, :auteur, :commentaire, :signaler, NOW())');
        $req3->execute(array(
            'id_billet' => $postId,
            'auteur' => $author,
            'commentaire' => $comment,
            'signaler' => 0
        ));
        
        
         header("Location:index.php?action=post&amp;id=.$postId.");
        // $db = $this->dbConnect();
        // $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        // $affectedLines = $comments->execute(array($postId, $author, $comment));

        // return $affectedLines;
    }

    public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}