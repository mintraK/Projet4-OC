<?php 
session_start();
class CommentaireUtilisateur{
        private $_id;
        private $_id_billet;
        private $_auteur;
        private $_commentaire;
        private $_signaler; 
        private $_date_commentaire;
    
        public function __construct(Array $data){
            $this->hydrate($data);
    
        }
        public function hydrate(Array $data){
            if(isset($data['id'])){
                $this->setid($data['id']);
            }
            if(isset($data['id_billet'])){
                $this->setIdBillet($data['id_billet']);
            }
            if(isset($data['auteur'])){
                $this->setAuteur($data['auteur']);
            }
            if(isset($data['commentaire'])){
                $this->setCommentaire($data['commentaire']);
            }
            if(isset($data['signaler'])){
                $this->setSignaler($data['signaler']);
            }
            if(isset($data['date_commentaire'])){
                $this->setDateCommentaire($data['date_commentaire']);
            }
        }
    
        //fonction pour getter
        public function id(){
            return $this->_id;
        }
        public function idBillet(){
            return $this->_id_billet;
        }
        public function auteur(){
            return $this->_auteur;
        }
        public function commentaire(){
            return $this->_commentaire;
        }
        public function signaler(){
            return $this->_signaler;
        }
        public function dateCommentaire(){
            return $this->_date_commentaire;
        }
        //fonction pour setter
        public function setid($id){
            $this->_id = $id; 
        } 
        public function setIdBillet($idBillet){
            $this->_id_Billet = $idBillet; 
        }
        public function setAuteur($auteur){
            $this->_auteur = $auteur;   
        }
        public function setCommentaire($commentaire){
            $this->_commentaire = $commentaire;  
        }
        public function setSignaler($signaler){
            $this->_signaler = $signaler; 
        }
        public function setDateCommentaire($dateCommentaire){
            $this->_date_commentaire = $dateCommentaire; 
        }
        
    
}