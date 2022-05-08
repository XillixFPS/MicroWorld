<?php
class LigneCommandeManager{
    private $_db;

    public function __construct($db){
        $this->setDB($db);
    }

    public function setDB(PDO $db){
        $this->_db = $db;
    }

    public function add(LigneCommande $ligneCommande){
        $req = $this->_db->prepare('INSERT INTO ligneCommande (idCommande, idProduit, quantite) VALUES ((SELECT idCommande FROM commande WHERE idCommande = :idCommande), (SELECT idProduit FROM produit WHERE idProduit = :idProduit), :quantite)');
        $req->bindValue(':idCommande', $ligneCommande->getIdCommande());
        $req->bindValue(':idProduit', $ligneCommande->getIdProduit());
        $req->bindValue(':quantite', $ligneCommande->getQuantite());
        $req->execute();
    }

    public function get($idCommande){
        $idCommande = (int) $idCommande;
        $req = $this->_db->query('SELECT idProduit, quantite FROM ligneCommande WHERE idCommande = '.$idCommande);
        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
        $ligneCommande = [];
        foreach ($donnees as $donnee) {
            $ligneCommande[] = new LigneCommande($donnee);
        }
		return $ligneCommande;
    }


}

?>