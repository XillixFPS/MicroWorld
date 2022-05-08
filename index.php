<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

$managerCategorie = new CategorieManager($db);
$managerProduit = new ProduitManager($db);
$listCateg = $managerCategorie->getList();
?>
<div class="container text-center">

<div class="py-5 text-center">
  <img class="d-block mx-auto mb-2" src="assets/icon.png" alt="logo photoforyou" width="10%" height="auto">
    <h1 class="display-5">MicroWorld</h1>
      <p class="lead">Pour avoir du matériels de pro gameurs / streameurs à petit prix !!!</p>

  <div class="jumbotron ">
        <p class="lead">Moins de temps à chercher. Plus de résultats.</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
          <div class="modal fade" id="exampleModalToggle" role="dialog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content rounded-5 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h2 class="fw-bold mb-0">Connexion</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!-- fin div modal-header -->
      
                <div class="modal-body p-5 pt-0 text-center">
                    <img class="mb-4" src="assets/icon.png" alt="" width="72" height="auto"><!-- Icône du site -->
                      <form method="POST" action="connexion.php"><!-- Formulaire de connexion -->
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control rounded-4"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" name="email" id="floatingInput" placeholder="nom@exemple.fr">
                          <label for="floatingInput">Email</label><!-- Champs formulaire pour l'Email -->
                        </div><!-- fin div form-floating -->
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Mot de passe" name="password" >
                          <label for="floatingPassword">Mot de Passe</label><!-- Champs formualire pour le mots de passe -->
                        </div><!-- fin div form-floating -->
                        <div class="checkbox mb-3">
                          <label>
                            <input type="checkbox" value="remember-me"> Se Souvenir de moi
                          </label>
                        </div><!-- fin div form-floating -->
                          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" name="connexion" value="Valider" type="submit">Connexion</button><!-- Bouton de connexion -->
                          <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
                          <hr class="my-4">
                          <h2 class="fs-5 fw-bold mb-3">Ou créez-vous un compte</h2>
                          <a class="w-100 py-2 mb-2 btn btn-outline-dark rounded-4" href="inscription" role="button">Créer un Compte</a>
                      </form><!-- fin du formulaire -->
                  </div><!-- fin div modal-body -->
                </div><!-- fin div modal-content -->
              </div><!-- fin div modal-dialog -->
            </div><!-- fin div modal -->
            <a class="btn btn-outline-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Inscription | Connexion</a>
          </div>
  </div>

  <hr class="featurette-divider">
  </main>

  <div class='container px-4 px-lg-5 mt-5'>
  <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center'>
    <form method="POST" action="search.php">
        <input type="search" name="query" placeholder="Rechercher..."/>
        <input type="submit" name="search" value="Valider">
    </form>
  </div>
  </div>
    
    <div class='container px-4 px-lg-5 mt-5'>
    <h2 class="text-center mb-5">NOUVEAUTÉS</h2>	
    <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center'>
      <?php
      $listProduit = $managerProduit->getNeufDerniers();
      foreach ($listProduit as $key => $value){
        $nom = $managerProduit->getNomCategorie($value->getIdCategorie());
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


  </div>
  </div><!-- /.container -->

<?php
require_once "includes/footer.php";
?>
