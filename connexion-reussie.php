<?php
include "includes/autoload.php";
include "includes/header.php";
if($_SESSION['login']!=true)
{
    header('Location: connexion.php');
}
?>
<body>
    <div class="container">
    	<div class="jumbotron">
      		<h1 class="display-4">Page des utilisateurs de Microworld</h1>
      		<?php echo '<p class="lead">Bonjour '.htmlentities($_SESSION['firstname']).' '.htmlentities($_SESSION['lastname']).' comment allez vous ?</p>'?>
      		<hr class="my-4">
    </div>
	</div>
</body>
<?php
include ('includes/footer.php'); 
?>