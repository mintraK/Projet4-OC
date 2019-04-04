<?php
session_start();
require "CommentaireUtilisateur.php";
class CommentaireManager{

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
    public function add(CommentaireUtilisateur $commentaire){


    // $auteur = $_SESSION['pseudo'];
    // $commentaire = $_POST['texteCommentaire'];
 
    $req3 = $this->_db->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, signaler, date_commentaire) VALUES (:id_billet, :auteur, :commentaire, :signaler, NOW())');
    $req3->execute(array(
        'id_billet' => $commentaire->idBillet(),
        'auteur' => $commentaire->auteur(),
        'commentaire' => $commentaire->commentaire(),
        'signaler' => $commentaire->signaler()));
      
        
         header("Location:commentaires.php?billet=".$commentaire->idBillet());
    
    }
    //afficher tous les commentaires
    public function getList($id){
        $req = $this->_db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
        $req->execute(array($id));
        return $req;


        // $billets = [];

        // $req = $this->_db->query('SELECT id, titre,photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC');
        // return $req;

    }
    public function getSignaler(){
         // On récupère les commentaires signalés
        $req = $this->_db->query('SELECT id, auteur, commentaire  FROM commentaires WHERE signaler = 1 ');
        return $req;
    }
    public function signaler($idCommentaire){       
        $req = $this->_db->prepare('UPDATE commentaires SET signaler =1 WHERE id = ?');
        $req->execute(array($idCommentaire));
        // header("Location:commentaires.php?billet=".$commentaire->idBillet());
        // $_POST['idCommentaire'] = NULL;

    }
    public function supprimerCommentaire($idCommentaire){
        $req= $this->_db->prepare('DELETE FROM commentaires WHERE id = :id');
        $req->execute(array(
        'id' => $idCommentaire));
    

    }
    public function Commentaireignorer($idCommentaire){
        $req= $this->_db->prepare('UPDATE commentaires SET signaler=0 WHERE id = :id');
        $req->execute(array(
        'id' => $idCommentaire));
    
    }
     // Récupération du commentaire
    public function getCommentaire($id){

        $req = $this->_db->prepare('SELECT id, id_billet, auteur, commentaire, signaler, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS dateCommentaire FROM commentaires WHERE id = ?');
        $req->execute([
            $id
        ]);
        $data = $req->fetch();
        return new commentaireUtilisateur($data);
    
      
    }
    //Modifier le contenu de billet
    public function modifier(Billet $billet){
        
        // $titre =  $billet->titre();
        // $contenu =   $billet->contenu();
        
        //     $req = $this->_db->prepare('UPDATE billets SET titre = :titre, contenu = :contenu, date_creation= NOW() WHERE id = :id ');
        //     $req->execute(array(
        //     'titre' => $titre,
        //     'contenu' => $contenu,
        //     'id' => $billet->id()));
         


    }
    //supprimer l'article et ses commentaires
    public function supprimer($id){

        // $req = $this->_db->prepare('DELETE FROM billets WHERE id = :id');
        // $req->execute(array(
        // 'id' => $id));
    
        // $req= $this->_db->prepare('DELETE FROM commentaires WHERE id_billet = :id');
        // $req->execute(array(
        // 'id' => $id));
    
    }


}