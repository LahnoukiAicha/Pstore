<?php
include('bd.php');

/*function getArticle(){
    $sql="SELECT * FROM article";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
}*/

// en utilisant le id 

function getArticle($id=null){
    if(!empty($id)){
        $sql="SELECT nomArticle,quantite,libelle,prixUnitaire,dateFab,dateExp,id_categorie,a.id,images
         FROM article as a ,categoriearticle as c where a.id_categorie=c.id and a.id=?";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute(array($id));
    return $stm->fetch();
    }
    
    else {
        $sql="SELECT nomArticle,quantite,libelle,prixUnitaire,dateFab,dateExp,id_categorie,a.id,images
        FROM article as a ,categoriearticle as c where a.id_categorie=c.id";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();

    }
}

function getCategorie($id=null){
    if(!empty($id)){
        $sql="SELECT * FROM categoriearticle where id=?";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute(array($id));
    return $stm->fetch();
    }
    else {
        $sql="SELECT * FROM categoriearticle";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();

    }
}
function getClient($id=null){
    if(!empty($id)){
        $sql="SELECT * FROM client where id=?";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute(array($id));
    return $stm->fetch();
    }
    else {
        $sql="SELECT * FROM client";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();

    }
}

function getVente($id=null){
    if(!empty($id)){
        $sql="SELECT v.id,nomArticle,nom,prenom,v.quantite,prix,dateVente,id_categorie,adresse,tele,prixUnitaire,a.id as idArticle FROM client
        as c,vente as v ,article as a where v.id_article=a.id  and v.id_client=c.id and v.id=? and etat=?";

        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute(array($id,1));
    return $stm->fetch();
    }
    else {
        $sql="SELECT v.id,nomArticle,nom,prenom,v.quantite,id_categorie,prix,dateVente,a.id as idArticle FROM client
        as c,vente as v ,article as a where v.id_article=a.id  and v.id_client=c.id and etat=?";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute([1]);
        return $stm->fetchAll();

    }
}

function getFournisseur($id=null){
    if(!empty($id)){
        $sql="SELECT * FROM fournisseur  where id=?";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute(array($id));
    return $stm->fetch();
    }
    else {
        $sql="SELECT * FROM fournisseur ";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();

    }
}

function getCommande($id=null){
    if(!empty($id)){
        $sql="SELECT co.id,nomArticle,nom,prenom,co.quantite,prix,dateCmde,id_categorie,adresse,tele,prixUnitaire,a.id as idArticle FROM fournisseur
        as f,commande as co ,article as a where co.id_article=a.id  and co.id_fournisseur=f.id and co.id=? ";

        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute(array($id));
    return $stm->fetch();
    }
    else {
        $sql="SELECT co.id,nomArticle,nom,prenom,co.quantite,id_categorie,prix,dateCmde,a.id as idArticle FROM fournisseur
        as f,commande as co ,article as a where co.id_article=a.id  and co.id_fournisseur=f.id ";
        $stm=$GLOBALS['dbh']->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();

    }
}

function getAllCommande(){
    $sql="SELECT COUNT(*) as nbre from commande";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute();
return $stm->fetch();
}
function getAllVente(){
    $sql="SELECT COUNT(*) as nbre from vente where etat=?";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute([1]);
return $stm->fetch();
}
function getAllArticle(){
    $sql="SELECT COUNT(*) as nbre from article";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute();
return $stm->fetch();
}


function getAllCA(){
    $sql="SELECT sum(prix) as nbre from vente";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute();
return $stm->fetch();
}

function getLastVente($id = null) {
    $sql = "SELECT v.id, nomArticle, nom, prenom, v.quantite, ca.libelle AS categorie, prix, dateVente, a.id AS idArticle
            FROM client AS c, vente AS v, article AS a, categoriearticle AS ca
            WHERE v.id_article = a.id AND v.id_client = c.id AND a.id_categorie = ca.id AND etat = ?
            ORDER BY dateVente DESC
            LIMIT 10";
    
    $stm = $GLOBALS['dbh']->prepare($sql);
    $stm->execute([1]);
    return $stm->fetchAll();
}

function getMostVente($id=null){
   
    $sql="SELECT v.id,nomArticle,sum(prix) as prix ,ca.libelle AS categorie FROM client
    as c,vente as v ,article as a ,categoriearticle AS ca  where v.id_article=a.id  and v.id_client=c.id and a.id_categorie = ca.id and etat=?
    group by a.id
    ORDER BY sum(prix) DESC LIMIT 10";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute([1]);
    return $stm->fetchAll();
}

//dashboard charts
   function getDateCommande(){
    $sql="SELECT dateCmde as vendue from commande ORDER BY dateCmde DESC LIMIT 1";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute();
return $stm->fetch();
   }
   function getDateVente(){
    $sql="SELECT dateVente as vendue from vente";
    $stm=$GLOBALS['dbh']->prepare($sql);
    $stm->execute();
return $stm->fetch();
   }



?>