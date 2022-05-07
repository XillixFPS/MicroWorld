<?php
class ProduitManager{
    private $_db;

    public function __construct($db){
        $this->setDB($db);
    }

    public function setDB(PDO $db){
        $this->_db = $db;
    }

    public function add(Produit $produit){
        $req = $this->_db->prepare('INSERT INTO produit(nomProduit, idCategorie, prix, description, caracteristique, active, img1, img2, img3, img4, img5, quantite) VALUES(:nomProduit, :idCategorie, :prix, :description, :caracteristique, 1, :img1, :img2, :img3, :img4, :img5, :quantite)');
        $req->bindValue(':nomProduit', $produit->getNomProduit());
        $req->bindValue(':idCategorie', $produit->getIdCategorie());
        $req->bindValue(':prix', $produit->getPrix());
        $req->bindValue(':description', $produit->getDescription());
        $req->bindValue(':caracteristique', $produit->getCaracteristique());
        $req->bindValue(':img1', $produit->getImg1());
        $req->bindValue(':img2', $produit->getImg2());
        $req->bindValue(':img3', $produit->getImg3());
        $req->bindValue(':img4', $produit->getImg4());
        $req->bindValue(':img5', $produit->getImg5());
        $req->bindValue(':quantite', $produit->getQuantite());
        $req->execute();
        
        echo "Produit ajouté";
    }

    public function delete(Produit $produit){
        $this->_db->exec('DELETE FROM produit WHERE idproduit = '.$produit->getIdProduit());
    }

    public function update(Produit $produit){
        $req = $this->_db->prepare('UPDATE produit SET nomProduit = :nomProduit, idCategorie = :idCategorie, prix = :prix, description = :description, caracteristique = :caracteristique, img1 = :img1, img2 = :img2, img3 = :img3, img4 = :img4, img5 = :img5, quantite = :quantite WHERE idProduit = :idProduit');
        $req->bindValue(':nomProduit', $produit->getNomProduit());
        $req->bindValue(':idCategorie', $produit->getIdCategorie());
        $req->bindValue(':prix', $produit->getPrix());
        $req->bindValue(':description', $produit->getDescription());
        $req->bindValue(':caracteristique', $produit->getCaracteristique());
        $req->bindValue(':img1', $produit->getImg1());
        $req->bindValue(':img2', $produit->getImg2());
        $req->bindValue(':img3', $produit->getImg3());
        $req->bindValue(':img4', $produit->getImg4());
        $req->bindValue(':img5', $produit->getImg5());
        $req->bindValue(':quantite', $produit->getQuantite());
        $req->bindValue(':idProduit', $produit->getIdProduit());
        $req->execute();
        echo'<script>location.href="gerer-produit";</script>';
    }

    public function get($id){
        $id = (int) $id;
        $req = $this->_db->query('SELECT * FROM produit WHERE idproduit = '.$id.' LIMIT 1');
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Produit($donnees);
    }
    
    public function getList(){
        $produits = [];
        $req = $this->_db->query('SELECT * FROM produit');
            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $produits[] = new Produit($donnees);
            }
            if(count($produits)>0){
                return $produits;
            }
            else{
                ini_set('display_errors', 'off');
                echo "Aucun produit trouvé";
            }
            
    }

    public function getListByCategorie($idCategorie){
        $produits = [];
        $req = $this->_db->query('SELECT * FROM produit WHERE idCategorie = '.$idCategorie.' AND active = 1');
            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $produits[] = new Produit($donnees);
            }
            if(count($produits)>0){
                return $produits;
            }
            else{
                ini_set('display_errors', 'off');
                echo "Aucun produit trouvé";
            }
    }

    public function getNeufDerniers(){
        $produits = [];
        $req = $this->_db->query('SELECT * FROM produit WHERE active = 1 ORDER BY idProduit DESC LIMIT 9');
        while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
            $produits[] = new Produit($donnees);
        }
        return $produits;
    }

    public function getByNom($nom){
        $produits = [];
        $req = $this->_db->query('SELECT * FROM produit WHERE nomProduit LIKE "%'.$nom.'%" AND active = 1');
        while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
            $produits[] = new Produit($donnees);
        }
        return $produits;
    }

    public function getNomCategorie($idCategorie){
        $req = $this->_db->query('SELECT libelle FROM categorie WHERE idCategorie = '.$idCategorie);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return $donnees['libelle'];
    }

    public function addUneQuantite($idProduit, $quantite){
        $req = $this->_db->prepare('UPDATE produit SET quantite = quantite + :quantite WHERE idProduit = :idProduit');
        $req->bindValue(':quantite', $quantite);
        $req->bindValue(':idProduit', $idProduit);
        $req->execute();
    }

    public function removeUneQuantite($idProduit, $quantite){
        $req = $this->_db->prepare('UPDATE produit SET quantite = quantite - :quantite WHERE idProduit = :idProduit');
        $req->bindValue(':quantite', $quantite);
        $req->bindValue(':idProduit', $idProduit);
        $req->execute();
    }

    public function desactivateProduit(Produit $produit){
        $req = $this->_db->prepare('UPDATE produit SET active = 0 WHERE idproduit = :id');
        $req->bindValue(':id', $produit->getIdProduit());
        $req->execute();
    }

    public function activateProduit(Produit $produit){
        $req = $this->_db->prepare('UPDATE produit SET active = 1 WHERE idproduit = :id');
        $req->bindValue(':id', $produit->getIdProduit());
        $req->execute();
    }

}
?>