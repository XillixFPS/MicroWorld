<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

if($_GET['idproduit']) {
	$idproduit = $_GET['idproduit'];

    $produitManager = new ProduitManager($db);
    $produit = $produitManager->get($idproduit);
    
}

if($_SESSION['categorie']!=7)
{
    header('Location: page-erreur');
}
if (isset($_POST['submit'])) {
    // Traitement de la photo
    $img1 = $produit->getImg1(); 
    if(!empty($_FILES['img1']))
    {
    switch($_FILES['img1']['type'])
    {
      case 'image/jpeg': $extention = 'jpg'; break;
      case 'image/gif': $extention = 'gif'; break;
      case 'image/png': $extention = 'png'; break;
      case 'image/tif': $extention = 'tif'; break;
      case 'image/png': $extention = 'png'; break;
      default:          $extention=''; break;
    }
    if($extention && $_FILES['img1']['size']< 30 * 1024 * 1024)
    {
        //Changer le nom de l'image
        $characts='abcdefghijklmnopqrstuvwxyz';
        $characts.='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts.='1234567890';
        $code_aleatoire='';
        for($i=0;$i<10;$i++)
        {
            $code_aleatoire .=substr($characts,rand()%(strlen($characts)),1);
        }
        $nomfichier1 = $code_aleatoire.".".$extention;
        $fileName= $_FILES['img1']['name'];
        $tempName = $_FILES['img1']['tmp_name'];
        if(isset($fileName)){
          if(!empty($fileName)){
            $location = "images/articles/";
            move_uploaded_file($tempName, $location.$nomfichier1);
            $img1 = $nomfichier1;
          }
    }
    
    }
    }

    $img2 = $produit->getImg2();  
    if(!empty($_FILES['img2']))
    {
    switch($_FILES['img2']['type'])
    {
      case 'image/jpeg': $extention = 'jpg'; break;
      case 'image/gif': $extention = 'gif'; break;
      case 'image/png': $extention = 'png'; break;
      case 'image/tif': $extention = 'tif'; break;
      case 'image/png': $extention = 'png'; break;
      default:          $extention=''; break;
    }
    if($extention && $_FILES['img2']['size']< 30 * 1024 * 1024)
    {
        //Changer le nom de l'image
        $characts='abcdefghijklmnopqrstuvwxyz';
        $characts.='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts.='1234567890';
        $code_aleatoire='';
        for($i=0;$i<10;$i++)
        {
            $code_aleatoire .=substr($characts,rand()%(strlen($characts)),1);
        }
        $nomfichier2 = $code_aleatoire.".".$extention;
        $fileName= $_FILES['img2']['name'];
        $tempName = $_FILES['img2']['tmp_name'];
        if(isset($fileName)){
          if(!empty($fileName)){
            $location = "images/articles/";
            move_uploaded_file($tempName, $location.$nomfichier2);
            $img2 = $nomfichier2;
          }
    }
    
    }
    }

    $img3 = $produit->getImg3(); 
    if(!empty($_FILES['img3']))
    {
    switch($_FILES['img3']['type'])
    {
      case 'image/jpeg': $extention = 'jpg'; break;
      case 'image/gif': $extention = 'gif'; break;
      case 'image/png': $extention = 'png'; break;
      case 'image/tif': $extention = 'tif'; break;
      case 'image/png': $extention = 'png'; break;
      default:          $extention=''; break;
    }
    if($extention && $_FILES['img3']['size']< 30 * 1024 * 1024)
    {
        //Changer le nom de l'image
        $characts='abcdefghijklmnopqrstuvwxyz';
        $characts.='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts.='1234567890';
        $code_aleatoire='';
        for($i=0;$i<10;$i++)
        {
            $code_aleatoire .=substr($characts,rand()%(strlen($characts)),1);
        }
        $nomfichier3 = $code_aleatoire.".".$extention;
        $fileName= $_FILES['img3']['name'];
        $tempName = $_FILES['img3']['tmp_name'];
        if(isset($fileName)){
          if(!empty($fileName)){
            $location = "images/articles/";
            move_uploaded_file($tempName, $location.$nomfichier3);
            $img3 = $nomfichier3;
          }
    }
    
    }
    }

    $img4 = $produit->getImg4();
    if(!empty($_FILES['img4']))
    {
    switch($_FILES['img4']['type'])
    {
      case 'image/jpeg': $extention = 'jpg'; break;
      case 'image/gif': $extention = 'gif'; break;
      case 'image/png': $extention = 'png'; break;
      case 'image/tif': $extention = 'tif'; break;
      case 'image/png': $extention = 'png'; break;
      default:          $extention=''; break;
    }
    if($extention && $_FILES['img4']['size']< 30 * 1024 * 1024)
    {
        //Changer le nom de l'image
        $characts='abcdefghijklmnopqrstuvwxyz';
        $characts.='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts.='1234567890';
        $code_aleatoire='';
        for($i=0;$i<10;$i++)
        {
            $code_aleatoire .=substr($characts,rand()%(strlen($characts)),1);
        }
        $nomfichier4 = $code_aleatoire.".".$extention;
        $fileName= $_FILES['img4']['name'];
        $tempName = $_FILES['img4']['tmp_name'];
        if(isset($fileName)){
          if(!empty($fileName)){
            $location = "images/articles/";
            move_uploaded_file($tempName, $location.$nomfichier4);
            $img4 = $nomfichier4;
          }
    }
    
    }
    }

    $img5 = $produit->getImg5();
    if(!empty($_FILES['img5']))
    {
    switch($_FILES['img5']['type'])
    {
      case 'image/jpeg': $extention = 'jpg'; break;
      case 'image/gif': $extention = 'gif'; break;
      case 'image/png': $extention = 'png'; break;
      case 'image/tif': $extention = 'tif'; break;
      case 'image/png': $extention = 'png'; break;
      default:          $extention=''; break;
    }
    if($extention && $_FILES['img5']['size']< 30 * 1024 * 1024)
    {
        //Changer le nom de l'image
        $characts='abcdefghijklmnopqrstuvwxyz';
        $characts.='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts.='1234567890';
        $code_aleatoire='';
        for($i=0;$i<10;$i++)
        {
            $code_aleatoire .=substr($characts,rand()%(strlen($characts)),1);
        }
        $nomfichier5 = $code_aleatoire.".".$extention;
        $fileName= $_FILES['img5']['name'];
        $tempName = $_FILES['img5']['tmp_name'];
        if(isset($fileName)){
          if(!empty($fileName)){
            $location = "images/articles/";
            move_uploaded_file($tempName, $location.$nomfichier5);
            $img5 = $nomfichier5;
          }
    }
    
    }
    }

    $nomProduit = htmlspecialchars($_POST['nomProduit']);
    $categorie = (int)$_POST['categorie'];
    $prix = (int)$_POST['prix'];
    $description = htmlspecialchars($_POST['description']);
    $caracteristique = htmlspecialchars($_POST['caracteristique']);
    $quantite = (int)$_POST['quantite'];

    $ok=TRUE;

    if(strlen($nomProduit)<3 || strlen($nomProduit)>100){
      echo "Le nom du produit est trop grand (".strlen($nomProduit).")";
      $ok=FALSE;
    }

    if(strlen($description)>3000){
      echo "La description du produit est trop grand (".strlen($nomProduit).")";
      $ok=FALSE;
    }

    if(strlen($caracteristique)>3000){
      echo "Les caracteristiques du produit est trop grand (".strlen($nomProduit).")";
      $ok=FALSE;
    }
    
    if($ok){
    $manager = new ProduitManager($db);
    $produit = $manager->update(
        new Produit([
            'idProduit' => $idproduit,
            'nomProduit' => $nomProduit,
            'idCategorie' => $categorie,
            'prix' => $prix,
            'description' => $description,
            'caracteristique' => $caracteristique,
            'img1' => $img1,
            'img2' => $img2,
            'img3' => $img3,
            'img4' => $img4,
            'img5' => $img5,
            'quantite' => $quantite
        ])
    );
    } 
}  
?>


<div class="container px-4 px-lg-5 mt-5">
<!--Début Formulaire-->
 <!-- Formulaire d'inscription -->
 <form method="post" action="" id="form" enctype="multipart/form-data" novalidate>
 <fieldset>
  <legend>Mettre à jour un Produit</legend>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="nomProduit">Nom du produit</label>
        <input type="text" class="form-control" minlength="3" maxlength="100" value="<?php echo $produit->getNomProduit()?>" name="nomProduit" id="nomProduit" required>
      </div>
    </div>
    <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Choisir Catégorie</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="categorie" required>
        <option selected></option>
        <?php
        $managerCatagorie = new CategorieManager($db);
        $listeCategorie = $managerCatagorie->getList();
        foreach ($listeCategorie as $value)
        echo "<option value=".$value->getIdCategorie().">".$value->getLibelle()."</option>";
        ?>
      </select>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="prix">Prix</label>
        <input type="number" class="form-control" min=0 name="prix" id="prix" value="<?php echo $produit->getPrix()?>" required>
      </div>
    </div>
    <div class="mb-3">
		<label for="description" class="form-label">Description</label>
		<textarea class="w-100 form-control" name="description" id="description" rows="10" required><?php echo $produit->getDescription()?></textarea>
	</div>
	<div class="mb-3">
		<label for="caracteristique" class="form-label">Caracteristiques</label>
		<textarea class="w-100 form-control" name="caracteristique" id="caracteristique" rows="30" required><?php echo $produit->getCaracteristique()?></textarea>
	</div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="quantite">Quantité</label>
        <input type="number" class="form-control" min=0 name="quantite" id="quantite" value="<?php echo $produit->getQuantite()?>" required>
      </div>
    </div>

    

    <div class="form-group row">
        <div class="col-md-4 mb-3">
            <label class="form-label" for="nom">Image 1</label>
            <?php echo"<img width=90 height=auto src='images/articles/".$produit->getImg1()."' >";?>
            <input class="form-control" type="file" onchange="actuPhoto(this)" id="img1" name="img1" accept="image/jpeg, image/png, image/gif" value="<?php echo $produit->getImg1()?>">
        </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label class="form-label" for="nom">Image 2</label>
        <?php echo"<img width=90 height=auto src='images/articles/".$produit->getImg2()."' >";?>
        <input class="form-control" type="file" onchange="actuPhoto(this)" id="img2" name="img2" accept="image/jpeg, image/png, image/gif" value="<?php echo $produit->getImg2()?>">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label class="form-label" for="nom">Image 3</label>
        <?php echo"<img width=90 height=auto src='images/articles/".$produit->getImg3()."' >";?>
        <input class="form-control" type="file" onchange="actuPhoto(this)" id="img3" name="img3" accept="image/jpeg, image/png, image/gif" value="<?php echo $produit->getImg3()?>">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label class="form-label" for="nom">Image 4</label>
        <?php echo"<img width=90 height=auto src='images/articles/".$produit->getImg4()."' >";?>
        <input class="form-control" type="file" onchange="actuPhoto(this)" id="img4" name="img4" accept="image/jpeg, image/png, image/gif" value="<?php echo $produit->getImg4()?>">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label class="form-label" for="nom">Image 5</label>
        <?php echo"<img width=90 height=auto src='images/articles/".$produit->getImg5()."' >";?>
        <input class="form-control" type="file" onchange="actuPhoto(this)" id="img5" name="img5" accept="image/jpeg, image/png, image/gif" value="<?php echo $produit->getImg5()?>">
      </div>
    </div>
    <img src="" id="photo" style="width:20%;border-radius: 50%;" class="img-responsive float-right">
    
    <br/>
    <input type="submit" value="Confirmer" class="btn btn-primary" name="submit"/>
    
    </fieldset>
</form>
</div> 
<?php
require_once "includes/footer.php";
?>
