<?php
session_start();
include('bd.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tele = $_POST['tele'];
$adresse = $_POST['adresse'];


if (
    !empty($nom) &&
    !empty($prenom) &&
    !empty($tele) &&
    !empty($adresse) 
) {
    $sql = "INSERT INTO client (nom, prenom, tele, adresse) 
            VALUES (?, ?, ?, ?)";

    $stm = $dbh->prepare($sql);
    $stm->execute([$nom, $prenom, $tele, $adresse]);
    echo"database good";

    if ($stm->rowCount() != 0) {
        //echo "Article ajouté";
        $_SESSION['message']['text']=" Client ajouté avec succés!";
        $_SESSION['message']['type']="success";
        
    } else {
        //echo "Erreur lors de l'ajout";
        $_SESSION['message']['text']="Une erreur s'est produite lors de l'ajout !";
        $_SESSION['message']['type']="danger";
    }
} else {
   // echo "Informations non valides";
        $_SESSION['message']['text']="Inofrmations non valides!";
        $_SESSION['message']['type']="warning";
}
header('Location:../vue/client.php');

















 // with function as usual 
/*function ajoutArticle($nomArticle,$prenom,$tele,$adresse,$dateFab,$dateExp){
    include('bd.php');
    $sql="INSERT INTO article(nomArticle,prenom,tele,adresse,dateFab,dateExp) 
    VALUES('$nomArticle','$prenom','$tele','$adresse','$dateFab','$dateExp')";
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
ajoutArticle($_POST['nomArticle'],$_POST['prenom'],$_POST['tele'],$_POST['adresse'],$_POST['dateFab'],$_POST['dateExp']);
*/
 ?>