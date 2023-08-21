<?php
session_start();
include('bd.php');

$libelle = $_POST['libelle'];

$id = $_POST['id'];

if (
    !empty($libelle) &&
    !empty($id) 
) {
    $sql = "UPDATE  categoriearticle SET libelle= ?where id=?";
    $stm = $dbh->prepare($sql);
    $stm->execute([$libelle, $id]);

    if ($stm->rowCount() != 0) {
        //echo "Article modifié"";
        $_SESSION['message']['text']=" Categorie modifiée avec succés!";
        $_SESSION['message']['type']="success";
        
    } else {
        //echo "Erreur lors de l'ajout";
        $_SESSION['message']['text']="Une erreur s'est produite lors de la modification !";
        $_SESSION['message']['type']="warning";
    }
} else {
   // echo "Informations non valides";
        $_SESSION['message']['text']="Inofrmations non valides!";
        $_SESSION['message']['type']="warning";
}
header('Location:../vue/categorie.php');

















 // with function as usual 
/*function ajoutArticle($nomArticle,$categorie,$quantite,$prixUnitaire,$dateFab,$dateExp){
    include('bd.php');
    $sql="INSERT INTO article(nomArticle,categorie,quantite,prixUnitaire,dateFab,dateExp) 
    VALUES('$nomArticle','$categorie','$quantite','$prixUnitaire','$dateFab','$dateExp')";
    $stm=$dbh->prepare($sql);
    $stm->execute();

    if($stm->rowcount()!=0){
        $_SESSION['message']['text']=" Article ajouté avec succés!";
        $_SESSION['message']['type']="success";
    }
    else {
        $_SESSION['message']['text']="Une erreur s'est produite!";
        $_SESSION['message']['type']="danger";
    }
}
ajoutArticle($_POST['nomArticle'],$_POST['categorie'],$_POST['quantite'],$_POST['prixUnitaire'],$_POST['dateFab'],$_POST['dateExp']);
*/
 ?>