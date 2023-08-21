<?php
include('bd.php');

if (!empty($_GET['id'])) {
    // Mettre à jour l'état de la vente pour l'annuler
    $sql = "UPDATE vente SET etat = ? WHERE id = ?";
    $stm = $dbh->prepare($sql);
    $stm->execute([0, $_GET['id']]);

    // Réajuster la quantité d'articles si nécessaire
    $sql = "UPDATE article SET quantite = quantite + ? WHERE id = ?";
    $stm = $dbh->prepare($sql);
    $stm->execute([$quantite, $id_article]);
}

header('Location:../vue/vente.php');
?>
