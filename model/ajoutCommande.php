<?php

session_start();
include('bd.php');
include_once('function.php');

$id_article = $_POST['id_article'];
$id_fournisseur = $_POST['id_fournisseur'];
$quantite = $_POST['quantite'];
$prix = $_POST['prix'];

if (
    !empty($id_article) &&
    !empty($id_fournisseur) &&
    !empty($quantite) &&
    !empty($prix) 
    
) {
    

            $sql = "INSERT INTO commande (id_article, id_fournisseur, quantite, prix) 
            VALUES (?, ?, ?, ?)";

             $stm = $dbh->prepare($sql);
             $stm->execute([$id_article, $id_fournisseur, $quantite, $prix]);

             if ($stm->rowCount() != 0) {
                //quand on effectue une vente , la quantité des articles originales change

                $sql="UPDATE article SET quantite =quantite+? where id=?";
                $stm = $dbh->prepare($sql);
                $stm->execute([$quantite,$id_article]); // le point ? = id_article
                if ($stm->rowCount() != 0){
                    $_SESSION['message']['text']=" Commande effectuée avec succés!";
                    $_SESSION['message']['type']="success";
                }else{
                    
                    $_SESSION['message']['text']="impossible de faire une commande !";
                    $_SESSION['message']['type']="danger";
                    

                }
        
            
        
            } else {
        //echo "Erreur lors de l'ajout";
                    $_SESSION['message']['text']="un problème s'est produite lors de la commande !";
                    $_SESSION['message']['type']="danger";
                    
          }

        }
    

    else {
   // echo "Informations non valides";
        $_SESSION['message']['text']="Inofrmations non valides!";
        $_SESSION['message']['type']="danger";
}
header('Location:../vue/commande.php');

















 // with function as usual 
/*function ajoutArticle($id_article,$id_fournisseur,$quantite,$prix,$dateFab,$dateExp){
    include('bd.php');
    $sql="INSERT INTO article(id_article,id_fournisseur,quantite,prix,dateFab,dateExp) 
    VALUES('$id_article','$id_fournisseur','$quantite','$prix','$dateFab','$dateExp')";
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
ajoutArticle($_POST['id_article'],$_POST['id_fournisseur'],$_POST['quantite'],$_POST['prix'],$_POST['dateFab'],$_POST['dateExp']);
*/
 ?>