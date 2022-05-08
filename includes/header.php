<?php
//On commence une session en tant que visiteur avec la valeur 0
session_start();
if (!isset($_SESSION['categorie']))
{
  $_SESSION['categorie']=0;
}
//On crée un ficher logs
//On récupère la date et l'heure
if(isset($_SESSION['login'])){
  $date ="[".date("d")."/".date("m")."/".date("Y")."]";
  $heure ="[".date("H").":".date("i").":".date("s")."]";
  $url = $_SERVER['REMOTE_ADDR']." - ".$_SESSION['firstname']." - ".$_SESSION['lastname']." - ".$_SESSION['id']." connect to ". $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
  $reunion = $date.$heure.$url."\n";
  $files = fopen("logs/logs.txt", "a+");
  fputs($files, $reunion);
  fclose($files);
}else{
  $date ="[".date("d")."/".date("m")."/".date("Y")."]";
  $heure ="[".date("H").":".date("i").":".date("s")."]";
  $url = $_SERVER['REMOTE_ADDR']." connect to ". $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
  $reunion = $date.$heure.$url."\n";
  $files = fopen("logs/logs.txt", "a+");
  fputs($files, $reunion);
  fclose($files);

  //Affichage des dates en français
  setlocale(LC_TIME, 'fr_FR');
  date_default_timezone_set('Europe/Paris');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MicroWorld</title>
    <link rel="shortcut icon" type="image/png" href="assets/icon.png"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

 
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index">MicroWorld</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <?php
    include "autoload.php";
    //On change la navbar suivant si l'utilisateur est un client, un visiteur, un admin ou un photographe
        switch($_SESSION['categorie'])
        {
            case 1:
                $niveauHab = "%C%";
                break;
            case 0:
                $niveauHab = "%V%";
                break;
            case 7:
                $niveauHab = "%A%";
                break;
        }

        //On fait une requête qui affiche les différents menu par rapport au niveau d'habilitation
        $req= "SELECT idMenu,nomMenu,URL FROM menu WHERE habilitation LIKE '".$niveauHab."'";
        $ins=$db->prepare($req);
        $ins->execute();
        $num = $ins->fetchAll();
    ?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <?php
              
              foreach ($num as $value) 
                  {
                    // Menu (avec une longueur de 1 dans la BDD)
                    if (strlen($value['idMenu'])==1) 
                    {
                      $niv = substr($value['idMenu'], 0, 1); // On mémorise le niveau
                      echo "<li class='nav-item dropdown'>".PHP_EOL;
                        echo "<a class='nav-link dropdown-toggle' data-toggle='dropdown' href=".$value['URL'].">".$value['nomMenu']."</a>".PHP_EOL;
                          echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>".PHP_EOL;
                            foreach ($num as $value) 
                              {
                              // Sous menu (avec une longueur de 2 dans la BDD)
                              if (strlen($value['idMenu'])==2 AND substr($value['idMenu'],0,1)==$niv )
                                {
                                echo "<li><a class='dropdown-item' href=".$value['URL'].">".$value['nomMenu']."</a></li>";
                                }   
                            }
                          echo "</ul>";
                      echo "</li>";
                    }
                  }
            ?>
        </ul><!-- fin ul navbar-nav -->
      </div><!-- fin div collaspe -->
      
        <?php
        //Si on pas connecté, on affiche le bouton Inscription | Connexion, qui affiche un modal pour se connecter ou s'inscrire, en tant que photographe ou en tant que client
            if (!isset($_SESSION['login']) )
            {
        ?>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-outline-light" href="panier.php">
                <i class="bi-cart-fill me-1"></i>
                Panier
                <span class="badge bg-light text-dark ms-1 rounded-pill"></span>
            </a>
            <div class="modal fade" id="exampleModalToggle" role="dialog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
        <?php
            }//fin if !isset

            //On affiche différents contenu dans la navbar pour les différents types d'utilisateurs
            //Pour le client, On affiche l'onglet crédit et sa photo de profil où il peut aller consulter son profil
            if($_SESSION['categorie']!=0)
            {
            echo "
            <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
            <a class='btn btn-outline-light' href='panier.php'>
                <i class='bi-cart-fill me-1'></i>
                Panier
                <span class='badge bg-light text-dark ms-1 rounded-pill'></span>
            </a>
            </div>
            <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
              <div class='collapse navbar-collapse'>
                <ul class='navbar-nav dropdown-menu-lg-end'>
                  <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown'>
                      <img src='images/profil/".htmlentities($_SESSION['pp'])."' class='rounded-circle' alt='' width=35 height=35/>
                    </a>
                      <ul class='dropdown-menu dropdown-menu-lg-end'>
                        <li> <a class='dropdown-item' href='voir-profil.php'>Voir Profil</a></li>
                        <li><a class='dropdown-item' href='deconnexion.php'>Deconnexion</a></li>
                      </ul>
                  </li>   
                </ul>
              </div>
              </div>";
            }
            ?>
    
    </div><!-- fin div collapse -->
</nav><!-- fin navbar -->
</header><!-- fin header -->


