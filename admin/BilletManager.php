<?php
require "Billet.php";
class BilletManager{

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
    public function add(Billet $billet){
        $req = $this->_db->prepare('INSERT INTO billets( titre,photo, contenu, date_creation) VALUES(:titre, :photo,:contenu, NOW())');
        $req->execute([ 
            'titre' => $billet->titre(),
            'photo' => $billet->photo(),
            'contenu' => $billet->contenu()
        ]);
            
       


    }
    //afficher tous les billets
    public function getList(){
       

        $req = $this->_db->query('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC');
        return $req;

    }

     // Récupération du billet
    public function get($id){
               
        $req = $this->_db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets WHERE id = ?');
        $req->execute([
            $id
        ]);
        $data = $req->fetch();
        return new Billet($data);
    
      
    }
    //Modifier le contenu de billet
    public function modifier(Billet $billet){
        
        $titre =  $billet->titre();
        $photo =   $billet->photo();
        $contenu =   $billet->contenu();
        
            $req = $this->_db->prepare('UPDATE billets SET titre = :titre, contenu = :contenu, date_creation= NOW() WHERE id = :id ');
            $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'id' => $billet->id()));
         


    }
    //supprimer l'article et ses commentaires
    public function supprimer($id){

        $req = $this->_db->prepare('DELETE FROM billets WHERE id = :id');
        $req->execute(array(
        'id' => $id));
    
        $req= $this->_db->prepare('DELETE FROM commentaires WHERE id_billet = :id');
        $req->execute(array(
        'id' => $id));
    
    }


}