<?php

 include('entete.php');
 if(!empty($_GET['id'])){
  $categorie=getCategorie($_GET['id']);
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
.boxi{
  display: flex;
  align-items: center;
  justify-content: center;
  background: #EDF3F1;
  padding: 10px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.42);
  margin:10px;

}
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
                <form action=" <?= !empty($_GET['id']) ? "../model/modifCategorie.php" : "../model/ajoutCategorie.php" ?>" method="post" enctype="multipart/form-data">
                <label for="libelle">Libelle: </label>
                <input value="<?= !empty($_GET['id']) ? $categorie['libelle'] : "" ?>" type="text" name="libelle" id="libelle" placeholder=" Veuillez saisir la categorie">
                <input value="<?= !empty($_GET['id']) ? $categorie['id'] : "" ?>" type="hidden" name="id" id="id">
      
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
            <div class="boxi">
              <form action="" method="get">
              <table class="mtable">
                <tr>
                  <th>Libelle</th>
                  <th>Action</th>
                 
              </tr>
              
              <?php 
              
              $categories = getCategorie();
              if(!empty($categories)&& is_array($categories)){
                foreach($categories as $key=>$value){
                  ?>
                  <tr>
                    <td><?= $value['libelle']?></td>
                    <td><a href="?id=<?= $value['id']?>"><i class='bx bx-edit-alt'></i></a> </td>
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