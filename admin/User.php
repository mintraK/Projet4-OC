<?php 
class User{
        private $_id;
        private $_pseudo;
        private $_pwd;
        private $_mail; 
        private $_dateConnexion;
    
        public function __construct(Array $data){
            $this->hydrate($data);
    
        }
        public function hydrate(Array $data){
            if(isset($data['id'])){
                $this->setId($data['id']);
            }
            if(isset($data['pseudo'])){
                $this->setPseudo($data['pseudo']);
            }
            if(isset($data['pwd'])){
                $this->setPwd($data['pwd']);
            }
            if(isset($data['mail'])){
                $this->setMail($data['mail']);
            }
            if(isset($data['dateConnexion'])){
                $this->setDateConnexion($data['dateConnexion']);
            }
        }
    
        //fonction pour getter
        public function id(){
            return $this->_id;
        }
        public function pseudo(){
            return $this->_pseudo;
        }
        public function pwd(){
            return $this->_pwd;
        }
        public function mail(){
            return $this->_mail;
        }
        public function dateConnexion(){
            return $this->_dateConnexion;
        }
        //fonction pour setter
        public function setId($id){
            $this->_id = $id;
           
        }
        public function setPseudo($pseudo){
            $this->_pseudo = $pseudo;
           
        }
        public function setPwd($pwd){
            $this->_pwd = $pwd;
           
        }
        public function setMail($mail){
            $this->_mail = $mail;
           
        }
        public function setDateConnexion($dateConnexion){
            $this->_dateConnexion = $dateConnexion;
           
        }
        
    
}