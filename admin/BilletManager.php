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
        $req = $this->_db->prepare('INSERT INTO billets( titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
        $req->execute([ 
            'titre' => $billet->titre(),
            'contenu' => $billet->contenu()
        ]);

    }
     // Récupération du billet
    public function get($id){
               
        $req = $this->_db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets WHERE id = ?');
        $req->execute([
            $id
        ]);
        $data = $req->fetch();
        return new Billet($data);
    
      
    }



}