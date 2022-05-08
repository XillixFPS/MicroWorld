<?php
class Commande{
    private $_idCommande;
    private $_idUser;
    private $_dateCommande;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    // Getters
    public function getIdCommande(){
        return $this->_idCommande;
    }

    public function getIdUser(){
        return $this->_idUser;
    }

    public function getDateCommande(){
        return $this->_dateCommande;
    }

    // Setters
    public function setIdCommande($idCommande){
        $this->_idCommande = $idCommande;
    }

    public function setIdUser($idUser){
        $this->_idUser = $idUser;
    }

    public function setDateCommande($dateCommande){
        $this->_dateCommande = $dateCommande;
    }
}

?>