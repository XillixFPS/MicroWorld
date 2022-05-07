<?php
include ('includes/header.php');
include ('includes/autoload.php');
if (!empty($_GET['idproduit'])) {
    $id = $_GET['idproduit'];
}

$managerProduit = new ProduitManager($db);
$infoProduit = $managerProduit->get($id);
?>
<main>
<section class="py-2">
    <form action="" method="post">
        <fieldset>
        <div class="row mt-5" style="width: 100%;">
            <div class="col-2"></div>
                <div class="col-8 mt-5 card p-5" style="border-radius:1em; box-shadow: 0px 0px 20px 0px rgba(255,255,255,0.4);">
            <?php
                echo'
                    <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="thumbs col-md-2">';
                        if(!empty($infoProduit->getImg1())){
                        echo '
                        <div class="row">
                        <img class="img-thumbnail" style="margin-left:2%; width:50%; height:auto;" src="images/articles/'.htmlentities($infoProduit->getImg1()).'" oncontextmenu="return false" alt="..." />
                        </div>';
                        }
                        if(!empty($infoProduit->getImg2())){
                        echo '
                        <div class="row">
                        <img class="img-thumbnail" style="margin-left:2%; width:50%; height:auto;" src="images/articles/'.htmlentities($infoProduit->getImg2()).'" oncontextmenu="return false" alt="..." />
                        </div>';
                        }
                        if(!empty($infoProduit->getImg3())){
                        echo '
                        <div class="row">
                        <img class="img-thumbnail" style="margin-left:2%; width:50%; height:auto;" src="images/articles/'.htmlentities($infoProduit->getImg3()).'" oncontextmenu="return false" alt="..." />
                        </div>';
                        }
                        if(!empty($infoProduit->getImg4())){
                        echo '
                        <div class="row">
                        <img class="img-thumbnail" style="margin-left:2%; width:50%; height:auto;" src="images/articles/'.htmlentities($infoProduit->getImg4()).'" oncontextmenu="return false" alt="..." />
                        </div>';
                        }
                        if(!empty($infoProduit->getImg5())){
                        echo '
                        <div class="row">
                        <img class="img-thumbnail" style="margin-left:2%; width:50%; height:auto;" src="images/articles/'.htmlentities($infoProduit->getImg5()).'" oncontextmenu="return false" alt="..." />
                        </div>';
                        }
                    echo"
                    </div>
                    
                        <div class='col-md-3'><img class='card-img-top mb-5 mb-md-0' id='main' style=' width:70%; height:auto;' src='images/articles/".htmlentities($infoProduit->getImg1())."' oncontextmenu='return false' alt='...' /></div>
                        <div class='col-md-7'>
                            <h1 class='display-5 fw-bolder'>".$infoProduit->getNomProduit()."</h1>
                            <div class='fs-5 mb-5'>
                                <span>".$infoProduit->getPrix()." €</span>
                            </div>
                <div class='d-flex'>";
                    if($_SESSION['categorie']!=7){
                        if($infoProduit->getQuantite()>0){
                        echo"
                        <button class='btn btn-outline-success flex-shrink-0' type='submit' name='acheter' value='acheter'>
                            <i class='bi-cart-fill me-1'></i>
                            Ajouter au panier !
                        </button>
                        </div>
                        <div class='small mb-1'>Disponibilité : ".$infoProduit->getQuantite()."</div>
                        ";
                        }
                        else{
                            echo "<div class='small mb-1'>Le produit n'est plus disponible</div>";
                        }
                    }
                    echo"</div>
                    </div>
                    <div class='row mt-5 gx-4 gx-lg-5 align-items-center'>
                        <div class='col-md-12'>
                            <h5 class='display-5'>Description :<br></h5>".$infoProduit->getDescription()."
                            <h5 class='display-5'>Caracteristiques :<br></h5></div>
                            <div class='col-md-3'>"
                            .$infoProduit->getCaracteristique()."
                            </div> 
                        </div>
            </div>
            ";
        ?>
            </div>
        
        </fieldset>
    </form>
</section>

</main>
</body>
    
<?php
include ('includes/footer.php'); 
?>