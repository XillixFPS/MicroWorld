<?php
class CommandeManager{
    private $_db;

    public function __construct($db){
        $this->setDB($db);
    }

    public function setDB(PDO $db){
        $this->_db = $db;
    }
    
    public function add(Commande $commande){
        $req = $this->_db->prepare('INSERT INTO commande (idUser, dateCommande) VALUES (:idUser, :dateCommande)');
        $req->bindValue(':idUser', $commande->getIdUser());
        $req->bindValue(':dateCommande', $commande->getDateCommande());
        $req->execute();
    }

    public function delete(Commande $commande){
        $this->_db->exec('DELETE FROM commande WHERE idCommande = '.$commande->getIdCommande());
    }

    public function get($idCommande){
        $idCommande = (int) $idCommande;
        $req = $this->_db->query('SELECT * FROM commande WHERE idCommande = '.$idCommande);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Commande($donnees);
    }

    public function getByIdUser($idUser){
        $idUser = (int) $idUser;
        $req = $this->_db->query('SELECT * FROM commande WHERE idUser = '.$idUser);
        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
        $commandes = [];
        foreach ($donnees as $donnee){
            $commandes[] = new Commande($donnee);
        }
        return $commandes;
    }

    public function getLastId(){
        $req = $this->_db->query('SELECT MAX(idCommande) FROM commande');
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees['MAX(idCommande)'];
    }



}

?>