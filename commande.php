<?php
require_once "includes/autoload.php";
require_once "includes/header.php";
require_once "includes/fonctionPanier.php";
?>
<?php
if(isset($_POST['submit'])){
    $managerCommande = new CommandeManager($db);
    $managerLigneCommande = new LigneCommandeManager($db);

    $managerCommande->add(
        new Commande([
            'idUser' => $_SESSION['id'],
            'dateCommande' => date('Y-m-d H:i:s')
        ])
    );

    $idCommande = $managerCommande->getLastId();
    $nbArticles=count($_SESSION['panier']['idProduit']);
    for($i=0 ;$i < $nbArticles ; $i++){
        $managerLigneCommande->add(
            new LigneCommande([
                'idCommande' => $idCommande,
                'idProduit' => $_SESSION['panier']['idProduit'][$i],
                'quantite' => $_SESSION['panier']['quantite'][$i]
            ])
        );
    }
    echo '<script>location.href="voir-profil.php";</script>';
}
?>

<?php
include ('includes/footer.php'); 
?>