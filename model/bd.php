<?php
#connexion à la base de donnée 


$user='root';
$base='stock'; //nom de la base de donnée
$password='';
$dsn='mysql:host=127.0.0.1:3306;dbname=stock';

try{
    $dbh= new PDO($dsn,$user,$password);
    #echo "connexion réussite!! </br>";
}
catch(PDOException $e){
    print("Erreur: ".$e->getMessage());
    die();
}
?>