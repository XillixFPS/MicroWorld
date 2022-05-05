<?php
require_once "includes/autoload.php";
require_once "includes/header.php";
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
  <div class='container px-4 px-lg-5 mt-5'>
    <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
      
    </div>
  </div>



<?php
require_once "includes/footer.php";
?>