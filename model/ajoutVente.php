<?php

session_start();
include('bd.php');
include_once('function.php');

$id_article = $_POST['id_article'];
$id_client = $_POST['id_client'];
$quantite = $_POST['quantite'];
$prix = $_POST['prix'];
if (
    !empty($id_article) &&
    !empty($id_client) &&
    !empty($quantite) &&
    !empty($prix) 
) {
    $article=getArticle($id_article);
    if(!empty($article) && is_array($article)){
        if($quantite>$article['quantite']){
            $_SESSION['message']['text']="La quantité à vendre n'est pas disponible !";
            $_SESSION['message']['type']="danger";
        }
        else{
            $sql = "INSERT INTO vente (id_article, id_client, quantite, prix) 
            VALUES (?, ?, ?, ?)";

             $stm = $dbh->prepare($sql);
             $stm->execute([$id_article, $id_client, $quantite, $prix]);

             if ($stm->rowCount() != 0) {
                //quand on effectue une vente , la quantité des articles originales change

                $sql="UPDATE article SET quantite =quantite-? where id=?";
                $stm = $dbh->prepare($sql);
                $stm->execute([$quantite,$id_article]); // le point ? = id_article
                if ($stm->rowCount() != 0){
                    $_SESSION['message']['text']=" Vente effectuée avec succés!";
                    $_SESSION['message']['type']="success";
                }else{
                    
                    $_SESSION['message']['text']="impossible de faire une vente !";
                    $_SESSION['message']['type']="danger";
                    

                }
        
            
        
            } else {
        //echo "Erreur lors de l'ajout";
                    $_SESSION['message']['text']="un problème s'est produite lors de la vente !";
                    $_SESSION['message']['type']="danger";
                    
          }

        }
    }

    
} else {
   // echo "Informations non valides";
        $_SESSION['message']['text']="Inofrmations non valides!";
        $_SESSION['message']['type']="warning";
}
header('Location:../vue/vente.php');

















 // with function as usual 
/*function ajoutArticle($id_article,$id_client,$quantite,$prix,$dateFab,$dateExp){
    include('bd.php');
    $sql="INSERT INTO article(id_article,id_client,quantite,prix,dateFab,dateExp) 
    VALUES('$id_article','$id_client','$quantite','$prix','$dateFab','$dateExp')";
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
ajoutArticle($_POST['id_article'],$_POST['id_client'],$_POST['quantite'],$_POST['prix'],$_POST['dateFab'],$_POST['dateExp']);
*/
 ?>