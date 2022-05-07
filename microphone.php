<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

$categorie =8;
$managerCategorie = new CategorieManager($db);
$managerProduit = new ProduitManager($db);
$nom = $managerProduit->getNomCategorie($categorie);
?>
<section class="py-3 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><?php echo $nom ?></h1>
        <p class="lead text-muted">Les meilleurs des microphones pour entendre votre sublime voix</p>
      </div>
    </div>
</section>
<div class='container px-4 px-lg-5 mt-5'>
    <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
      <?php
      $listProduit = $managerProduit->getListByCategorie($categorie);
      foreach ($listProduit as $key => $value){
        echo"
            <div class='col mb-5'>
                <div class='card h-100'>
                    <!-- Product image-->
                    <img class='rounded mx-auto d-block' src='images/articles/".htmlentities($value->getImg1())."' oncontextmenu='return false' alt='...' style='margin-left: 35%; margin-top: 5%; width:80px; height:auto;'/>
                    <!-- Product details-->
                    <div class='card-body p-4'>
                        <div class='text-center'>
                            <!-- Product name-->
                            <h5 class='fw-bolder'>".$value->getNomProduit()."</h5>
                            <!-- Product price-->
                            ".$value->getPrix()."€
                            <br>
                            <small class='text-muted'>".$nom."</small>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                        <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='produit?idproduit=".$value->getIdProduit()."'>Voir plus</a></div>
                    </div>
                </div>
            </div>";
      }
     ?>
    </div>
</div>  
<?php
require_once "includes/footer.php";
?>