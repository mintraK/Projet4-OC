<?php 
session_start();
class CommentaireUtilisateur{
        private $_id;
        private $_idBillet;
        private $_auteur;
        private $_commentaire;
        private $_signaler; 
        private $_dateCommentaire;
    
        public function __construct(Array $data){
            $this->hydrate($data);
    
        }
        public function hydrate(Array $data){
            if(isset($data['id'])){
                $this->setId($data['id']);
            }
            if(isset($data['idBillet'])){
                $this->setIdBillet($data['idBillet']);
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
            if(isset($data['dateCommentaire'])){
                $this->setDateCommentaire($data['dateCommentaire']);
            }
        }
    
        //fonction pour getter
        public function id(){
            return $this->_id;
        }
        public function idBillet(){
            return $this->_idBillet;
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
            return $this->_dateCommentaire;
        }
        //fonction pour setter

        public function setIdBillet($idBillet){
            $this->_idBillet = $idBillet;
           
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
        public function setDateCreation($dateCommentaire){
            $this->_dateCommentaire = $dateCommentaire;
           
        }
        
    
}