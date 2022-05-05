<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

if($_SESSION['categorie']!=7)
{
    header('Location: page-erreur.php');
}

$managerproduit = new ProduitManager($db);
$listProduit = $managerproduit->getList();
?>
<div class="container">
            <div class="jumbotron">
                <div class="row row-cols-1 row-cols-md-3 g-4">
				<table class="table">
  					<thead class="thead-dark" style="width:100%">
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nom du Produit</th>
							<th scope="col">Categorie</th>
							<th scope="col">Prix</th>
							<th scope="col">Description</th>
							<th scope="col">Caracteristique</th>			
							<th scope="col">Active</th>
							<th scope="col">Quantite</th>
                            <th scope="col">Image 1</th>
                            <th scope="col">Image 2</th>
                            <th scope="col">Image 3</th>
                            <th scope="col">Image 4</th>
                            <th scope="col">Image 5</th>
						</tr>
					</thead>
				<tbody>
                    <?php
                foreach ($listProduit as $value) {
					echo "<tr>
					<th scope='row'>".$value->getIdproduit()."</th>
					<td>".$value->getNomProduit()."</td>
					<td>".$value->getLibelle()."</td>
					<td>".$value->getPrix()."</td>
					<td>".$value->getDescription()."</td>
					<td>".$value->getCaracteristiques()."</td>
					<td>".$value->getActive()."</td>
                    <td>".$value->getQuantite()."</td>
					<td><img width=35 height=35 src='images/profil/".$value->getImg1()."' ></td>
                    <td><img width=35 height=35 src='images/profil/".$value->getImg2()."' ></td>
                    <td><img width=35 height=35 src='images/profil/".$value->getImg3()."' ></td>
                    <td><img width=35 height=35 src='images/profil/".$value->getImg4()."' ></td>
                    <td><img width=35 height=35 src='images/profil/".$value->getImg5()."' ></td>
					<td>
					<!--<a href=''><button type='button'>Editer</button></a>-->";
					if($value->getActive()==0)
					{
						echo "<a href='active-user?id=".$value->getId()."'><button type='button' class='btn btn-success'>Activer</button></a>
						<a href='supr-user?id=".$value->getId()."'><button type='button' class='btn btn-danger'>Supprimer</button></a>";
					}
					elseif($value->getActive()==1){
						echo "<a href='desac-user?id=".$value->getId()."'><button type='button' class='btn btn-danger'>Désactiver</button></a>
						</td>
						</tr>";
					}				
					else {
						echo "<tr><td colspan='15'><center>Pas de Donnée</center></td></tr>";
					}
				
        			}

		?>
		</tbody>
	</table>
</div>
<a href="add-produit.php"><button type="button" class="btn btn-info">Ajouter un Produit</button></a>
<a href="update-produit.php"><button type="button" class="btn btn-info">Mettre à jour un Produit</button></a>
<a href="index.php"><button type="button" class="btn btn-primary">Retour</button></a>
</div>
</div>


<?php
require_once "includes/footer.php";
?>