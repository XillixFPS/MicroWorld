<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

if($_POST['search']){
    $query = $_POST['query'];
    $produitManager = new ProduitManager($db);
    $search = $produitManager->searchProduit($query);
}
?>
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Recherche pour <?php echo $query; ?></h1>
        <p class="lead text-muted">rechercher ce que vous voulez</p>
      </div>
    </div>
</section>
<div class='container px-4 px-lg-5 mt-5'>
  <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center'>
    <form method="POST" action="">
        <input type="search" name="query" placeholder="Rechercher..."/>
        <input type="submit" name="search" value="Valider">
    </form>
  </div>
  </div>
<div class='container px-4 px-lg-5 mt-5'>
    <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
      <?php
      foreach ($search as $key => $value){
        echo"
            <div class='col mb-5'>
                <div class='card h-100'>
                    <!-- Product image-->
                    <img class='rounded mx-auto d-block' src='images/articles/".htmlentities($value->getImg1())."' oncontextmenu='return false' alt='...' style='margin-left: 35%; margin-top: 5%; width:25%; height:auto;'/>
                    <!-- Product details-->
                    <div class='card-body p-4'>
                        <div class='text-center'>
                            <!-- Product name-->
                            <h5 class='fw-bolder'>".$value->getNomProduit()."</h5>
                            <!-- Product price-->
                            ".$value->getPrix()."€
                            <br>
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