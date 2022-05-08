<?php
include ('includes/header.php');
include ('includes/autoload.php');
include ('includes/fonctionPanier.php');

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $id = (isset($_POST['id'])? $_POST['id']:  (isset($_GET['id'])? $_GET['id']:null )) ;
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
   $img = (isset($_POST['img'])? $_POST['img']:  (isset($_GET['img'])? $_GET['img']:null )) ;
   $qMax = (isset($_POST['quantiteMax'])? $_POST['quantiteMax']:  (isset($_GET['quantiteMax'])? $_GET['quantiteMax']:null )) ;

   //On vérifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($id,$q,$p,$l,$img,$qMax);
         break;

      Case "suppression":
         supprimerArticle($id);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQuantite($_SESSION['panier']['idProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}
?>
<section class="py-2 text-center container">
    <div class="row py-lg-2">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Votre Panier</h1>
      </div>
    </div>
</section>
<div class='container px-4 px-lg-5 mt-3'>
               <form method="post" action="panier.php">
                  <table class="table">
                     <tr>
                        <th class="col-2"></th>
                        <th class="col-3">Libellé</th>
                        <th class="col-2">Quantité</th>
                        <th class="col-2">Prix Unitaire</th>
                        <th class="col-2">Action</th>
                     </tr>
                     <?php
                        $chemin = "images/articles/";
                     if(creationPanier()){
                        $nbArticles=count($_SESSION['panier']['idProduit']);
                        if($nbArticles <= 0){
                        echo "
                        <tr>
                           <td>Votre panier est vide </td>
                        </tr>
                        </table>
                        </form>";
                        }
                        else{
                           for($i=0 ;$i < $nbArticles ; $i++){
                              echo "<tr>";
                                 echo "<th scope='row'><img class=\"img-thumbnail\" style=\" width:70%; height:auto;\" src='$chemin".htmlspecialchars($_SESSION['panier']['image'][$i])."'/></td>";
                                 echo "<td>".htmlspecialchars($_SESSION['panier']['nomProduit'][$i])."</th>";
                                 echo "<td><input class=\"form-control\" type=\"number\" min=1 max=".htmlspecialchars($_SESSION['panier']['quantiteMax'][$i])." name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantite'][$i])."\"/></td>";
                                 echo "<td>".htmlspecialchars($_SESSION['panier']['prix'][$i])." €</td>";
                                 echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&id=".rawurlencode($_SESSION['panier']['idProduit'][$i]))."\"><button type='button' class='btn btn-danger'>Retirer</button></a></td>";
                              echo "</tr>";//fin de la ligne
                  }
                           echo "</table>";//fin table
                           echo "<table class='table'>";
                              echo "<tr>";
                                 echo "<th class='col-8'></th>";
                                 echo "<th class='col-8'></th>";
                              echo "</tr>";
                              echo "<tr>";
                                 echo "<td><h4>Total : ".MontantGlobal()." €</h4></td>";
                                 echo "<td><h6>Nombre d'articles : ".compterArticles()."</h6></td>";
                              echo "</tr>";
                              echo "<tr>";
                                 echo "<td><input class='btn btn-info' type=\"submit\" value=\"Rafraichir\"/></td>";
                                 echo "<td><input type=\"hidden\" name=\"action\" value=\"refresh\"/></td>";
                              echo "</tr>";
               echo "</form>";//fin du formulaire
                           if (!isset($_SESSION['login'])){
                           echo "<tr>";
                              echo "
                              <td>
                              <div class=\"alert alert-warning\" role=\"alert\">
                                 <strong>Vous devez vous connecter pour passer votre commande</strong>
                              </div>
                              </td>";
                           }
                           else{
                              echo "<form method='post' action='commande.php'>";
                              echo "
                              <td>
                                 <input class='btn btn-success' name=\"submit\" type=\"submit\" value=\"Passer Commande\"/>
                              </td>";
                              echo "</form'>";
                           }
                              
                           echo "</tr>";
                           echo "</table>";
                        
                        }
                     }
                     ?>
</div>

<?php
include ('includes/footer.php'); 
?>