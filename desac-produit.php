<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

if($_SESSION['categorie']!=7)
{
    header('Location: page-erreur');
}
if($_GET['idproduit']) {
	$idproduit = $_GET['idproduit'];

    $produitManager = new ProduitManager($db);
    $produit = $produitManager->get($idproduit);
    
}
?>
<h3>Voulez vous désactiver ce produit ?</h3>
<form action="" method="post">

	<input type="hidden" name="id" value="<?php echo $idproduit ?>" />
	<button type="submit">Sauvegarder les changements</button>
</form>

<?php
include ('includes/footer.php'); 
?>

<?php
if($_POST){
    $idproduit = $_POST['id'];
    try {
        $desacproduit = $produitManager->desactivateProduit($produit);
        echo'<script>location.href="gerer-produit";</script>';
    } catch (PDOException $e) {
        echo"<br> Erreur:". $e->getMessage();
    }
}
?>