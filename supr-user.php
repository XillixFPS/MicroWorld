<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

if($_SESSION['categorie']!=7)
{
    header('Location: page-erreur');
}
if($_GET['id']) {
	$id = $_GET['id'];

    $userManager = new UserManager($db);
    $user = $userManager->getUserById($id);
    
}
?>
<h3>Voulez vous supprimer cet utilisateur ?</h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
	<button type="submit">Sauvegarder les changements</button>
</form>

<?php
include ('includes/footer.php'); 
?>

<?php
if($_POST){
    $id = $_POST['id'];
    try {
        $deleteuser = $userManager->delete($user);
        echo'<script>location.href="gerer-user";</script>';
    } catch (PDOException $e) {
        echo"<br> Erreur:". $e->getMessage();
    }
}
?>