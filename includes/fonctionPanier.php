<?php
function creationPanier(){
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier']=array();
        $_SESSION['panier']['idProduit']=array();
        $_SESSION['panier']['quantite']=array();
        $_SESSION['panier']['prix']=array();
        $_SESSION['panier']['nomProduit']=array();
        $_SESSION['panier']['image']=array();
        $_SESSION['panier']['quantiteMax']=array();
    }
    return true;
}

function ajouterArticle($idProduit,$quantite,$prix,$nomProduit,$image,$quantiteMax){
    if(creationPanier()){
        $positionProduit=array_search($idProduit,$_SESSION['panier']['idProduit']);
        if($positionProduit!==false){
            $_SESSION['panier']['quantite'][$positionProduit]+=$quantite;
        }
        else{
            array_push($_SESSION['panier']['idProduit'],$idProduit);
            array_push($_SESSION['panier']['quantite'],$quantite);
            array_push($_SESSION['panier']['prix'],$prix);
            array_push($_SESSION['panier']['nomProduit'],$nomProduit);
            array_push($_SESSION['panier']['image'],$image);
            array_push($_SESSION['panier']['quantiteMax'],$quantiteMax);
        }
    }
    else{
        echo "Une erreur est survenue";
    }
}

function supprimerArticle($idProduit){
    if(creationPanier()){
        $tmp=array();
        $tmp['idProduit']=array();
        $tmp['quantite']=array();
        $tmp['prix']=array();
        $tmp['nomProduit']=array();
        $tmp['image']=array();
        $tmp['quantiteMax']=array();

        for($i=0;$i<count($_SESSION['panier']['idProduit']);$i++){
            if($_SESSION['panier']['idProduit'][$i]!=$idProduit){
                array_push($tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
                array_push($tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
                array_push($tmp['prix'],$_SESSION['panier']['prix'][$i]);
                array_push($tmp['nomProduit'],$_SESSION['panier']['nomProduit'][$i]);
                array_push($tmp['image'],$_SESSION['panier']['image'][$i]);
                array_push($tmp['quantiteMax'],$_SESSION['panier']['quantiteMax'][$i]);
            }
        }

        $_SESSION['panier']=$tmp;
        unset($tmp);
    }
    else{
        echo "Une erreur est survenue";
    }
}

function modifierQuantite($idProduit,$quantite){
    if(creationPanier()){
        if($quantite>0){
            $positionProduit=array_search($idProduit,$_SESSION['panier']['idProduit']);
            if($positionProduit!==false){
                $_SESSION['panier']['quantite'][$positionProduit]=$quantite;
            }
        }
        else{
            supprimerArticle($idProduit);
        }
    }
    else{
        echo "Une erreur est survenue";
    }
}

function MontantGlobal(){
    $total=0;
    for($i=0;$i<count($_SESSION['panier']['idProduit']);$i++){
        $total+=$_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix'][$i];
    }
    return $total;
}

function compterArticles(){
    if(isset($_SESSION['panier'])){
        return count($_SESSION['panier']['idProduit']);
    }
    else{
        return 0;
    }
}

function supprimePannier(){
    unset($_SESSION['panier']);
}




?>