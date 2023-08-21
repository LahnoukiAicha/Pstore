<?php
session_start();
include('bd.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tele = $_POST['tele'];
$adresse = $_POST['adresse'];
$id = $_POST['id'];

if (
    !empty($nom) &&
    !empty($prenom) &&
    !empty($tele) &&
    !empty($adresse) &&
    !empty($id) 
) {
    $sql = "UPDATE  client SET nom=?, prenom=?, tele=?, adresse=? where id=?";

    $stm = $dbh->prepare($sql);
    $stm->execute([$nom, $prenom, $tele, $adresse,$id]);

    if ($stm->rowCount() != 0) {
        //echo "Article modifié"";
        $_SESSION['message']['text']=" Client modifiée avec succés!";
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
header('Location:../vue/client.php');

















 // with function as usual 
/*function ajoutArticle($nom,$prenom,$tele,$adresse,$dateFab,$dateExp){
    include('bd.php');
    $sql="INSERT INTO article(nom,prenom,tele,adresse,dateFab,dateExp) 
    VALUES('$nom','$prenom','$tele','$adresse','$dateFab','$dateExp')";
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
ajoutArticle($_POST['nom'],$_POST['prenom'],$_POST['tele'],$_POST['adresse'],$_POST['dateFab'],$_POST['dateExp']);
*/
 ?>