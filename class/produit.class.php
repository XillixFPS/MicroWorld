<?php
class Produit {
    private $_idproduit;
    private $_nomProduit;
    private $_idCategorie;
    private $_prix;
    private $_description;
    private $_caracteristique;
    private $_active;
    private $_img1;
    private $_img2;
    private $_img3;
    private $_img4;
    private $_img5;
    private $_quantite;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters
    public function getIdproduit() {
        return $this->_idproduit;
    }

    public function getNomProduit() {
        return $this->_nomProduit;
    }

    public function getIdCategorie() {
        return $this->_idCategorie;
    }

    public function getPrix() {
        return $this->_prix;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getCaracteristique() {
        return $this->_caracteristique;
    }

    public function getActive() {
        return $this->_active;
    }

    public function getImg1() {
        return $this->_img1;
    }

    public function getImg2() {
        return $this->_img2;
    }

    public function getImg3() {
        return $this->_img3;
    }

    public function getImg4() {
        return $this->_img4;
    }

    public function getImg5() {
        return $this->_img5;
    }

    public function getQuantite() {
        return $this->_quantite;
    }

    // Setters
    public function setIdproduit($idproduit) {
        $this->_idproduit = $idproduit;
    }

    public function setNomProduit($nomProduit) {
        $this->_nomProduit = $nomProduit;
    }

    public function setIdCategorie($idCategorie) {
        $this->_idCategorie = $idCategorie;
    }

    public function setPrix($prix) {
        $this->_prix = $prix;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }

    public function setCaracteristique($caracteristique) {
        $this->_caracteristique = $caracteristique;
    }

    public function setActive($active) {
        $this->_active = $active;
    }

    public function setImg1($img1) {
        $this->_img1 = $img1;
    }

    public function setImg2($img2) {
        $this->_img2 = $img2;
    }

    public function setImg3($img3) {
        $this->_img3 = $img3;
    }

    public function setImg4($img4) {
        $this->_img4 = $img4;
    }

    public function setImg5($img5) {
        $this->_img5 = $img5;
    }

    public function setQuantite($quantite) {
        $this->_quantite = $quantite;
    }
}
?>