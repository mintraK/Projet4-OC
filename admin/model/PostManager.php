<?php
 require_once("Billet.php"); 
 class PostManager
 {
    public function getListPosts(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets ORDER BY date_creation DESC');
        $req->execute();
        while( $data = $req->fetch()){     
                $post = new Billet($data); 
                $allPost[] = $post; 
        }
        return  $allPost;
    }

    public function getPost($postId)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets WHERE id = ?');
        $req->execute([
            $postId
        ]);
        $num_of_rows = $req->rowCount() ;
        if ($num_of_rows > 0)
        {
            $data = $req->fetch();
            return new Billet($data); 
        }
        else {
            $req = $db->prepare('SELECT id, titre, photo, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS datecreation FROM billets WHERE id = ?');
            $req->execute([
                1
            ]);
            $data = $req->fetch();
            return new Billet($data);
        } 
        
    }
    public function editArticle(Billet $billet){
        $db = $this->dbConnect();
        $titre =  $billet->titre();
        $photo =   $billet->photo();
        $contenu =   $billet->contenu();
        
        $req = $db->prepare('UPDATE billets SET titre = :titre, contenu = :contenu, date_creation= NOW() WHERE id = :id ');
        $isEdit =  $req->execute(array(
        'titre' => $titre,
        'contenu' => $contenu,
        'id' => $billet->id()));
        return $isEdit;

    }

    public function addArticle(Billet $post){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO billets( titre,photo, contenu, date_creation) VALUES(:titre, :photo,:contenu, NOW())');
        $isAdd = $req->execute([ 
            'titre' => $post->titre(),
            'photo' => $post->photo(),
            'contenu' => $post->contenu()
        ]);  
        return $isAdd;

    }
    public function deleteArticle($postId){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM billets WHERE id = :id');
        $isDelete = $req->execute(array(
        'id' => $postId));
        return $isDelete;
    }
    public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
    
}