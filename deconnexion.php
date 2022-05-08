<?php
include("includes/header.php");
include ('includes/fonctionPanier.php');
session_destroy();
header('Location: index.php');
// Libération de la mémoire
$result->close();
$conn->close();
?>
<?php
include ('includes/footer.php'); 
?>