<?php
 include('entete.php');
 if(!empty($_GET['id'])){
  $article=getCommande($_GET['id']);
 }
?>
<head>
    <style>
        form{
  width:100%;
}
input,
textarea,
select{
  margin-bottom: 10px;
  box-sizing: border-box;
  width: 100%;
  margin: 10px;
  padding: 5px 3px;
  border-radius: 5px;
  border: 1px solid #ccc;
  display: block;
}
.radio{
  margin-bottom: 10px;
  width: 20px;
}
button{
  background-color: #F9CB40;
  color: white;
  width: 150px;
  height: 30px;
  border: 1px solid #ccc;
  font-size: 15px;
  border-radius: 5px;
}
label{
  display: block;
}
.alert{
  margin: 10px;
  padding: 15px;
  color: white;
  border-radius: 10px;
}
.alert.danger{
  background-color: red;
}
.alert.success{
  background-color:#2bd47d;
}
.alert.warning{
  background-color: orange;
}
/*table*/
table.mtable{
  width: 100%;
  border-collapse: collapse;
  border: 1px solid transparent;
}
th,td{
  text-align: left;
  padding: 16px;
  font-size: small;
}
th{
  color:#608583;
}
table.mtable tr:nth-child(even){
  background: #f2f2f2;
}
table.mtable td{
  padding: 10px;
}

/*list*/

ul.mtable,ol.mtable{
  padding: 0;
  margin: 0;
  list-style: none;
}
ul.mtable li, ol.mtable li{
  padding: 10px;

}
ul.mtable li:nth-child(even),ol.mtable li:nth-child(even){
  background: #f2f2f2;
}
    </style>
</head>
      <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <form action=" <?= !empty($_GET['id']) ? "../model/modifCommande.php" : "../model/ajoutCommande.php" ?>" method="post">
                <input value="<?= !empty($_GET['id']) ? $article['id'] : "" ?>" type="hidden" name="id" id="id">
                <label for="id_article">Article: </label>
                <select onchange="setPrix()" name="id_article" id="id_article">
                   <?php
                   $commandes=getArticle();
                   if(!empty($commandes)&& is_array($commandes)){
                    foreach($commandes as $key=>$value){
                      ?>
                      <option  data-prix="<?= $value['prixUnitaire'] ?>" value="<?= $value['id'] ?>"><?= $value['nomArticle']." - ". $value['quantite']." disponible"   ?></option>
                      <?php
                    }
                   }
                   ?>
                </select>
                <label for="id_fournisseur">Fournisseur: </label>
                <select name="id_fournisseur" id="id_fournisseur">
                   <?php
                   $fournisseurs=getFournisseur();
                   if(!empty($fournisseurs)&& is_array($fournisseurs)){
                    foreach($fournisseurs as $key=>$value){
                      ?>
                      <option  value="<?= $value['id'] ?>"> <?= $value['nom']."  ". $value['prenom'] ?></option>
                      <?php
                    }
                   }
                   ?>
                </select>

                <label for="quantite">Qantité: </label>
                <input onkeyup="setPrix()" value="<?= !empty($_GET['id']) ? $article['quantite'] : "" ?>"type="number" name="quantite" id="quantite" placeholder=" Veuillez saisir la quantite:">

                <label for="prix">Prix  </label>
                <input value="<?= !empty($_GET['id']) ? $article['prix'] : "" ?>"type="number" name="prix" id="prix" placeholder=" Veuillez saisir le prix:">


                <button type="submit">Valider</button>

                <?php 
                if(!empty($_SESSION['message']['text'])){
                ?>
                <div class="alert <?=$_SESSION['message']['type']?>">
                <?=$_SESSION['message']['text']?>
              </div>
                <?php 
                }?>
                </form>
            </div>
            <div class="box">
              <table class="mtable">
                <tr>
                  <th>Article</th>
                  <th>fournisseur</th>
                  <th>Quantité</th>
                  <th>Prix </th>
                  <th>Date</th>
                  <th>action</th>
              </tr>
              <?php 
              
              $commandes= getCommande();
              //var_dump($commandes);
              if(!empty($commandes)&& is_array($commandes)){
                foreach($commandes as $key=>$value){
                  ?>
                  <tr>
                    <td><?= $value['nomArticle']?></td>
                    <td><?= $value['nom']." ".$value['prenom']?></td>
                    <td><?= $value['quantite']?></td>
                    <td><?= $value['prix']?></td>
                    <td><?= date('d/m/y  H:i:s',strtotime($value['dateCmde']))?></td>
                    <td>
                      <a href="reçuCommande.php?id=<?= $value['id']?>"><i class='bx bx-receipt'></i></a>
                      <a href="../model/annulerCommande.php?id=<?= $value['id'] ?>" style="color:red;"><i class='bx bx-trash'></i></a>

                    </td>
                  </tr>
                
                <?php
                }
              }
              ?>
              </table>
            </div>
        </div>
      </div>
    </section>

<?php
 include('footer.php');
?>

<script>

   
  function setPrix(){
     var article=document.querySelector('#id_article');
     var quantite=document.querySelector('#quantite');
     var prix=document.querySelector('#prix');
     var prixUnitaire=article.options[article.selectedIndex].getAttribute('data-prix');

     prix.value=Number(quantite.value)*Number(prixUnitaire);

  }
</script>