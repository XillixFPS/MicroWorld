<?php
class LigneCommande{
    private $_idCommande;
    private $_idProduit;
    private $_quantite;

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

    public function getIdProduit(){
        return $this->_idProduit;
    }

    public function getQuantite(){
        return $this->_quantite;
    }

    // Setters
    public function setIdCommande($idCommande){
        $this->_idCommande = $idCommande;
    }

    public function setIdProduit($idProduit){
        $this->_idProduit = $idProduit;
    }

    public function setQuantite($quantite){
        $this->_quantite = $quantite;
    }

}

?>