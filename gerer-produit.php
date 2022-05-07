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
			<a href="add-produit.php"><button type="button" class="btn btn-info">Ajouter un Produit</button></a>
			<a href="index.php"><button type="button" class="btn btn-primary">Retour</button></a>
                <div class="row row-cols-6 row-cols-md-8 g-4">
				<table class="table">
  					<thead class="thead-dark">
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nom du Produit</th>
							<th scope="col">Categorie</th>
							<th scope="col">Prix</th>			
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
					<td>".$value->getIdCategorie()."</td>
					<td>".$value->getPrix()."</td>
					<td>".$value->getActive()."</td>
                    <td>".$value->getQuantite()."</td>
					<td><img width=35 height=auto src='images/articles/".$value->getImg1()."' ></td>
                    <td><img width=35 height=auto src='images/articles/".$value->getImg2()."' ></td>
                    <td><img width=35 height=auto src='images/articles/".$value->getImg3()."' ></td>
                    <td><img width=35 height=auto src='images/articles/".$value->getImg4()."' ></td>
                    <td><img width=35 height=auto src='images/articles/".$value->getImg5()."' ></td>
					<td>
					<a href='produit?idproduit=".$value->getIdproduit()."'><button type='button' class='btn btn-secondary'>Consulter</button></a>
					<a href='update-produit?idproduit=".$value->getIdproduit()."'><button type='button' class='btn btn-dark'>Editer</button></a>";
					if($value->getActive()==0)
					{
						echo "<a href='active-produit?idproduit=".$value->getIdproduit()."'><button type='button' class='btn btn-success'>Activer</button></a>
						<a href='supr-produit?idproduit=".$value->getIdproduit()."'><button type='button' class='btn btn-danger'>Supprimer</button></a>";
					}
					elseif($value->getActive()==1){
						echo "<a href='desac-produit?idproduit=".$value->getIdproduit()."'><button type='button' class='btn btn-danger'>Désactiver</button></a>
						</td>
						</tr>";
					}				
				
        			}

		?>
		</tbody>
	</table>
</div>
</div>
</div>


<?php
require_once "includes/footer.php";
?>