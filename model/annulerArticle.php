<?php


include('bd.php');

if (!empty($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Delete the row from the commande table
    $sql_delete_commande = "DELETE FROM article WHERE id = ?";
    $stm_delete_commande = $dbh->prepare($sql_delete_commande);
    $stm_delete_commande->execute([$idToDelete]);

    header('Location:../vue/article.php');
    exit; // Terminate script execution after redirect
} else {
    echo "Missing ID or ID_Article for deletion/update.";
}
?>