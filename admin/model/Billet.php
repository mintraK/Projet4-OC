<?php 
class Billet{
        private $_id;
        private $_titre;
        private $_photo;
        private $_contenu; 
        private $_datecreation;
    
        public function __construct(Array $data){
            $this->hydrate($data);
    
        }
        public function hydrate(Array $data){
            if(isset($data['id'])){
                $this->setId($data['id']);
            }
            if(isset($data['titre'])){
                $this->setTitre($data['titre']);
            }
            if(isset($data['photo'])){
                $this->setPhoto($data['photo']);
            }
            if(isset($data['contenu'])){
                $this->setContenu($data['contenu']);
            }
            if(isset($data['datecreation'])){
                $this->setDateCreation($data['datecreation']);
            }
        }
    
        //fonction pour getter
        public function id(){
            return $this->_id;
        }
        public function titre(){
            return $this->_titre;
        }
        public function photo(){
            return $this->_photo;
        }
        public function contenu(){
            return $this->_contenu;
        }
        public function dateCreation(){
            return $this->_datecreation;
        }
        //fonction pour setter
        public function setId($id){
            $this->_id = $id;  
        }
        public function setTitre($titre){
            $this->_titre = $titre;
        }
        public function setPhoto($photo){
            $this->_photo = $photo;  
        }
        public function setContenu($contenu){
            $this->_contenu = $contenu;  
        }
        public function setDateCreation($dateCreation){
            $this->_datecreation = $dateCreation;   
        }
}