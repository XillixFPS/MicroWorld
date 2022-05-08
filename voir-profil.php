<?php
require_once "includes/header.php";
require_once "includes/autoload.php";


$managerCommande = new CommandeManager($db);
$managerLigneCommande = new LigneCommandeManager($db);
$managerProduit = new ProduitManager($db);
$Commande = $managerCommande->getByIdUser($_SESSION['id']);
$prixTotal = 0;
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <?php echo "<img class='rounded-circle mt-5' width='150px' src='images/profil/".$_SESSION["pp"]."'>
              <span class='font-weight-bold'>".htmlentities($_SESSION['firstname'])."\t".$_SESSION['lastname']."</span>
              <span class='text-black-50'>".htmlentities($_SESSION['email'])."</span>
              <span> </span>";?>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <?php echo "<h4 class='text-right'>Profil de"."\t".$_SESSION['firstname']."\t".$_SESSION['lastname']."</h4>"?>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Prenom</label><?php echo"<span class='form-control font-weight-bold'>"."\t".$_SESSION['firstname']."</span>";?></div>
                    <div class="col-md-6"><label class="labels">Nom</label><?php echo"<span class='form-control font-weight-bold'>"."\t".$_SESSION['lastname']."</span>";?></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Date de Naissance</label><?php echo"<span class='form-control font-weight-bold'>"."\t".htmlentities($_SESSION['birthdate'])."</span>";?></div>
            </div>
            </div>
        </div>
    </div>
</div>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Historique d'achats de <?php echo $_SESSION['firstname']."\t".$_SESSION['lastname']?></h1>
      </div>
    </div>
</section>

<div class="container rounded bg-white mt-5 mb-5">
<div class="box-perso">
  <div class="row">
          <b class="col">N° commande</b>
          <b class="col">Date</b>
  </div>
<?php   
  foreach ($Commande as $value) {
      echo '<a class="btn btn-outline-secondary mb-1 w-100 text-start" data-bs-toggle="collapse" href="#collapse'.$value->getIdCommande().'"><div class="row"><div class="d-inline col">'.$value->getIdCommande().'</div><div class="d-inline col">'.$value->getDateCommande().'</div></div></a>';
      echo '<div id="collapse'.$value->getIdCommande().'" class="collapse">';
      echo '<table class="table">';
      echo '<tr>';
      echo '    <thead>';
      echo '        <th></th>';
      echo '        <th>Nom</th>';
      echo '        <th>Prix</th>';
      echo '        <th>Quantité</th>';
      echo '        <th>Prix Total</th>';
      echo '    </thead>';
      echo '</tr>';
      $LigneCommande = $managerLigneCommande->get($value->getIdCommande());
      foreach ($LigneCommande as $value2) {
          $infoProduit = $managerProduit->get($value2->getIdProduit(), $value->getDateCommande());
          echo '<tr role=button onclick="window.location.href='."'".'produit.php?id='.$value2->getIdProduit()."'".'">';
          echo '  <td class="p-2"><img style="height:4em; width:auto;" src="images/articles/'.$infoProduit->getImg1().'" /></td>';
          echo '  <td class="p-2">'.substr($infoProduit->getNomProduit(), 0, 30).' ...</td>';
          echo '  <td class="p-2">'.$infoProduit->getPrix().' €</td>';
          echo '  <td class="p-2">x '.$value2->getQuantite().'</td>';
          echo '  <td class="p-2">'.$value2->getQuantite()*$infoProduit->getPrix().' €</td>';
          echo '</tr>';
          $prixTotal += $value2->getQuantite()*$infoProduit->getPrix();
      }
      echo '<tr><td></td><td></td><td></td><td></td><td>'.$prixTotal.' €</td></tr>';
      echo '</table>';
      echo '</div><br>';
      $prixTotal = 0;
  }
?>      
</div>
</div>
<?php
include "includes/footer.php";
?>

