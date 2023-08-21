<?php


include('bd.php');

if (!empty($_GET['id'])) {
    $idToDelete = $_GET['id'];


    // Retrieve the quantity from the commande table before deletion
    $sql_get_quantity = "SELECT quantite,id_article FROM commande WHERE id = ?";
    $stm_get_quantity = $dbh->prepare($sql_get_quantity);
    $stm_get_quantity->execute([$idToDelete]);
    $row = $stm_get_quantity->fetch(PDO::FETCH_ASSOC);
    $quantiteToRestore = $row['quantite'];

    // Delete the row from the commande table
    $sql_delete_commande = "DELETE FROM commande WHERE id = ?";
    $stm_delete_commande = $dbh->prepare($sql_delete_commande);
    $stm_delete_commande->execute([$idToDelete]);

    // Update the article table
    $sql_update_article = "UPDATE article SET quantite = quantite - ? WHERE id = ?";
    $stm_update_article = $dbh->prepare($sql_update_article);
    $stm_update_article->execute([$quantiteToRestore, $row['id_article']]);

    header('Location:../vue/commande.php');
    exit; // Terminate script execution after redirect
} else {
    echo "Missing ID or ID_Article for deletion/update.";
}
?>