<?php
include 'config.php';
try{
    $db = new PDO($dsn, $username, $password);
}
catch(PDOException $e){
    die('Erreur : ' . $e->getMessage());
}

spl_autoload_register(function($class) {
    include("class/$class.class.php");
});