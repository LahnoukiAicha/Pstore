<?php
session_start();
include('bd.php');

$nomArticle = $_POST['nomArticle'];
$categorie = $_POST['id_categorie'];
$quantite = $_POST['quantite'];
$prixUnitaire = $_POST['prixUnitaire'];
$dateFab = $_POST['dateFab'];
$dateExp = $_POST['dateExp'];
$images = $_FILES['images'];

if (
    !empty($nomArticle) &&
    !empty($categorie) &&
    !empty($quantite) &&
    !empty($prixUnitaire) &&
    !empty($dateFab) &&
    !empty($dateExp)&&
    !empty($images)
) {
    $sql = "INSERT INTO article (nomArticle, id_categorie, quantite, prixUnitaire, dateFab, dateExp,images) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stm = $dbh->prepare($sql);

    $name=$_FILES['images']['name'];
    $tmp_name=$_FILES['images']['tmp_name'];

    $folder="../public/images/";
    $dest="../public/images/$name";

    if(!is_dir($folder)){
        mkdir($folder,0777,true);
    }
    if(move_uploaded_file($tmp_name,$dest)){
        $stm->execute([$nomArticle, $categorie, $quantite, $prixUnitaire, $dateFab, $dateExp,$dest]);

        if ($stm->rowCount() != 0) {
            //echo "Article ajouté";
            $_SESSION['message']['text']=" Article ajouté avec succés!";
            $_SESSION['message']['type']="success";
            
        } else {
            //echo "Erreur lors de l'ajout";
            $_SESSION['message']['text']="Une erreur s'est produite lors de l'ajout !";
            $_SESSION['message']['type']="danger";
        }
    } else {
       // echo "Informations non valides";
            $_SESSION['message']['text']="Une erreur dans l'importation de l'image!";
            $_SESSION['message']['type']="warning";
    }
        
    }
 else {
    
        echo "File upload failed: " . $_FILES['images']['error'];

}
header('Location:../vue/article.php');

















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