<?php
 include('entete.php');
 if(!empty($_GET['id'])){
  $client=getClient($_GET['id']);
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
                <form action="<?= !empty($_GET['id']) ? "../model/modifClient.php" : "../model/ajoutClient.php" ?>" method="POST">
                <label for="nom">Nom du client: </label>
                <input value="<?= !empty($_GET['id']) ? $client['nom'] : "" ?>" type="text" name="nom" id="nom" placeholder=" Veuillez saisir le nom:">
                <input value="<?= !empty($_GET['id']) ? $client['id'] : "" ?>" type="hidden" name="id" id="id">
    

                <label for="prenom">Prenom: </label>
                <input  value="<?= !empty($_GET['id']) ? $client['prenom'] : "" ?>"type="text" name="prenom" id="prenom" placeholder=" Veuillez saisir la prenom:">

                <label for="tele">Telephone: </label>
                <input value="<?= !empty($_GET['id']) ? $client['tele'] : "" ?>"type="text" name="tele" id="tele" placeholder=" Veuillez saisir le N° de telephone:">

                <label for="adresse">Adresse: </label>
                <input value="<?= !empty($_GET['id']) ? $client['adresse'] : "" ?>"type="text" name="adresse" id="adresse" placeholder="Veuillez saisir l'adresse:" >

      
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
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Telephone</th>
                  <th> Adresse</th>
                  <th>action</th>
              </tr>
              <?php 
              
              $clients = getClient();
              if(!empty($clients)&& is_array($clients)){
                foreach($clients as $key=>$value){
                  
                  ?>
                  <tr>
                    <td><?= $value['nom']?></td>
                    <td><?= $value['prenom']?></td>
                    <td><?= $value['tele']?></td>
                    <td><?= $value['adresse']?></td>
                    <td><a href="?id=<?= $value['id']?>"><i class='bx bx-edit-alt'></i></a></td>
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