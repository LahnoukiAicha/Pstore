<?php
session_start();
include('bd.php');

$libelle = $_POST['libelle'];



if (
    !empty($libelle)
) {
    $sql = "INSERT INTO categoriearticle (libelle) VALUES (?)";
    $stm = $dbh->prepare($sql);
    $stm->execute([$libelle]);
    if($stm->rowcount()!=0){
        $_SESSION['message']['text']=" Categorie ajouté avec succés!";
        $_SESSION['message']['type']="success";
    }
    else {
        $_SESSION['message']['text']="Une erreur s'est produite lors de l'ajout du categorie!";
        $_SESSION['message']['type']="danger";
    }
}
else{
    $_SESSION['message']['text']="Informations Invalides!";
    $_SESSION['message']['type']="danger";

}

header('Location:../vue/categorie.php');

 ?>