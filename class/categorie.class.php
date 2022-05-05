<?php
class Categorie{
    private $_idCategorie;
    private $_libelle;
    private $_active;

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
    public function getIdCategorie(){
        return $this->_idCategorie;
    }

    public function getLibelle(){
        return $this->_libelle;
    }

    public function getActive(){
        return $this->_active;
    }

    // Setters
    public function setIdCategorie($idCategorie){
        $this->_idCategorie = $idCategorie;
    }

    public function setLibelle($libelle){
        $this->_libelle = $libelle;
    }

    public function setActive($active){
        $this->_active = $active;
    }




}



?>