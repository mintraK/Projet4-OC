<?php
// require_once("model/frontend/Manager.php"); 
require_once("admin/model/CommentaireUtilisateur.php"); 

 class CommentManager //extends Manager
{    
    
    public function getComments($postId)
    {
         $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
        $req->execute(array($postId));
        while($data = $req->fetch())
        {   
            $commentaire = new CommentaireUtilisateur($data);
            $comments[] = $commentaire; 
        }
        return $comments;
    }
    public function addReportComment($idCommentaire)
    {  
        $db = $this->dbConnect();     
        $req = $db->prepare('UPDATE commentaires SET signaler =1 WHERE id = ?');
        $isReport = $req->execute(array($idCommentaire));
        return $isReport;  
    }
    public function postComment($postId, $author, $comment)
    {   
         $db = $this->dbConnect();
        $req3 = $db->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, signaler, date_commentaire) VALUES (:id_billet, :auteur, :commentaire, :signaler, NOW())');
        $isPostComment = $req3->execute(array(
            'id_billet' => $postId,
            'auteur' => $author,
            'commentaire' => $comment,
            'signaler' => 0
        ));
        return $isPostComment;      
    }

    public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}