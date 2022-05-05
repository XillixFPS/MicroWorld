<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

if($_SESSION['categorie']!=7)
{
    header('Location: page-erreur.php');
}

$managerUser = new UserManager($db);
$listUsers = $managerUser->getUsers();
?>
<div class="container">
            <div class="jumbotron">
                <div class="row row-cols-1 row-cols-md-3 g-4">
				<table class="table">
  					<thead class="thead-dark" style="width:100%">
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nom</th>
							<th scope="col">Prenom</th>
							<th scope="col">Email</th>
							<th scope="col">Date de Naissance</th>
							<th scope="col">Active</th>			
							<th scope="col">Catégorie</th>
							<th scope="col">PhotoUser</th>
						</tr>
					</thead>
				<tbody>
                    <?php
                foreach ($listUsers as $value) {
					echo "<tr>
					<th scope='row'>".$value->getId()."</th>
					<td>".$value->getFirstname()."</td>
					<td>".$value->getLastname()."</td>
					<td>".$value->getEmail()."</td>
					<td>".$value->getBirthdate()."</td>
					<td>".$value->getActive()."</td>
					<td>".$value->getCategorie()."</td>
					<td><img width=35 height=35 src='images/profil/".$value->getPp()."' ></td>
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
</div>
</div>


<?php
require_once "includes/footer.php";
?>