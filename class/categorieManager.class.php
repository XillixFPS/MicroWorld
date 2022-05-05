<?php
class CategorieManager{
    private $_db;

    public function __construct($db){
        $this->setDB($db);
    }

    public function setDB(PDO $db){
        $this->_db = $db;
    }

    public function add(Categorie $categorie){
        $req = $this->_db->prepare('INSERT INTO categorie(libelle, active) VALUES(:libelle, :active)');
        $req->bindValue(':libelle', $categorie->getLibelle());
        $req->bindValue(':active', $categorie->getActive());
        $req->execute();
    }

    public function delete(Categorie $categorie){
        $req = $this->_db->prepare('DELETE FROM categorie WHERE idCategorie = :idCategorie');
        $req->bindValue(':idCategorie', $categorie->getIdCategorie());
        $req->execute();
    }

    public function update(Categorie $categorie){
        $req = $this->_db->prepare('UPDATE categorie SET libelle = :libelle, active = :active WHERE idCategorie = :idCategorie');
        $req->bindValue(':idCategorie', $categorie->getIdCategorie());
        $req->bindValue(':libelle', $categorie->getLibelle());
        $req->bindValue(':active', $categorie->getActive());
        $req->execute();
    }

    public function get($idCategorie){
        $req = $this->_db->prepare('SELECT * FROM categorie WHERE idCategorie = :idCategorie');
        $req->bindValue(':idCategorie', $idCategorie);
        $req->execute();
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Categorie($donnees);
    }

    public function getList(){
        $categories = [];
        $req = $this->_db->query('SELECT * FROM categorie');
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
            $categories[] = new Categorie($donnees);
        }
        return $categories;
    }
}
?>