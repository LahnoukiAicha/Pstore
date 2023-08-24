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

.filter-container {
        display: flex;
        align-items: center;
        gap: 10px; /* Adjust the gap between inputs as needed */
        margin-bottom: 20px;
    }

    .filter-container label {
        flex: 1;
    }

    .filter-container input,
    .filter-container select {
        flex: 10;
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
            <div class="box"  style="display: block;">
              <!--search table--->
              <div class="filter-container">
                <label for="filterName">Article: </label>
                <input type="text" id="filterName" placeholder="entrer le nom">

                <label for="filterCategory">Fournisseur: </label>
                <select id="filterCategory">
                     <option value="">Tous </option>
                     <?php
                         $categories = getFournisseur();
                         if (!empty($categories) && is_array($categories)) {
                         foreach ($categories as $key => $value) {
                         echo "<option value=\"{$value['nom']}\">{$value['nom']}</option>";
                            }
                         }
                        ?>
                </select>


                <label for="filterQuantity">Quantité: </label>
                <input type="number" id="filterQuantity">
                
                <label for="filterDate">Date: </label>
                <input type="text" id="filterDate">
            </div>
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
                    <td><?= date('d/m/y',strtotime($value['dateCmde']))?></td>
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
                            <!----search function-->
                            <script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterName = document.getElementById("filterName");
        const filterCategory = document.getElementById("filterCategory");
        const filterDate = document.getElementById("filterDate");
        const filterQuantity = document.getElementById("filterQuantity");
        const tableRows = document.querySelectorAll(".mtable tbody tr");

        // Add event listeners to the filter inputs
        filterName.addEventListener("input", filterTable);
        filterCategory.addEventListener("change", filterTable);
        filterDate.addEventListener("input", filterTable);
        filterQuantity.addEventListener("input", filterTable);

        function filterTable() {
            const nameFilter = filterName.value.toLowerCase();
            const categoryFilter = filterCategory.value.toLowerCase();
            const dateFilter = filterDate.value;
            const quantityFilter = filterQuantity.value;

            tableRows.forEach(row => {
                const rowName = row.cells[0].textContent.toLowerCase();
                const rowCategory = row.cells[1].textContent.toLowerCase();
                const rowDate = row.cells[4].textContent;
                const rowQuantity = row.cells[2].textContent;

                const nameMatch = rowName.includes(nameFilter);
                const categoryMatch = categoryFilter === "" || rowCategory.includes(categoryFilter);
                const dateMatch = rowDate.includes(dateFilter);
                const quantityMatch = rowQuantity.includes(quantityFilter);

                if (nameMatch && categoryMatch && dateMatch && quantityMatch) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        }
    });
</script>
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