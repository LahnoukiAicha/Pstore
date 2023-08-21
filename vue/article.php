<?php
 include('entete.php');
 $articles = array();
 if(!empty($_GET['id'])){
  $article=getArticle($_GET['id']);
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
                  <form action=" <?= !empty($_GET['id']) ? "../model/modifArticle.php" : "../model/ajoutArticle.php" ?>" method="post" enctype="multipart/form-data">
                <label for="nomArticle">Nom de l'article: </label>
                <input value="<?= !empty($_GET['id']) ? $article['nomArticle'] : "" ?>" type="text" name="nomArticle" id="nomArticle" placeholder=" Veuillez saisir le nom:">
                <input value="<?= !empty($_GET['id']) ? $article['id'] : "" ?>" type="hidden" name="id" id="id">
                <label for="categorie">Catégorie: </label>
                <select name="id_categorie" id="id_categorie">
                <?php
                   $categories=getCategorie();
                   if(!empty($categories)&& is_array($categories)){
                    foreach($categories as $key=>$value){
                      ?>
                      <option <?= !empty($_GET['id'])&& $article['id_categorie']==$value['id'] ? "Selected" : "" ?>
                      value="<?= $value['id']?>"><?= $value['libelle']?> </option>
                      <?php
                    }
                   }
                   ?>
                    
                </select>

                <label for="quantite">Qantité: </label>
                <input  value="<?= !empty($_GET['id']) ? $article['quantite'] : "" ?>"type="number" name="quantite" id="quantite" placeholder=" Veuillez saisir la quantite:">

                <label for="prixUnitaire">Prix unitaire </label>
                <input value="<?= !empty($_GET['id']) ? $article['prixUnitaire'] : "" ?>"type="number" name="prixUnitaire" id="prixUnitaire" placeholder=" Veuillez saisir le prix:">

                <label for="dateFab">Date de fabrication: </label>
                <input value="<?= !empty($_GET['id']) ? $article['dateFab'] : "" ?>"type="datetime-local" name="dateFab" id="dateFab" >

                <label for="dateExp">Date d'expiration: </label>
                <input value="<?= !empty($_GET['id']) ? $article['dateExp'] : "" ?>"type="datetime-local" name="dateExp" id="dateExp" >
                
                <label for="images">images: </label>
                <input value="<?= !empty($_GET['id']) ? $article['images'] : "" ?>"type="file" name="images" id="images" >
                
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
            <div  style="display: block;"class="boxi">
            
            <!--search table--->
            <div class="filter-container">
                <label for="filterName">Article: </label>
                <input type="text" id="filterName" placeholder="entrer le nom">

                <label for="filterCategory">Catégorie: </label>
                <select id="filterCategory">
                     <option value="">Tous </option>
                     <?php
                         $categories = getCategorie();
                         if (!empty($categories) && is_array($categories)) {
                         foreach ($categories as $key => $value) {
                         echo "<option value=\"{$value['libelle']}\">{$value['libelle']}</option>";
                            }
                         }
                        ?>
                </select>

                <label for="filterDate">Date: </label>
                <input type="date" id="filterDate">

                <label for="filterQuantity">Quantité: </label>
                <input type="number" id="filterQuantity">
            </div>

<!---the table show-->
              <table class="mtable"> 
                <tr>
                  <th>Nom de l'article</th>
                  <th>Catégorie</th>
                  <th>Quantité</th>
                  <th>Prix Unitaire </th>
                  <th>Date de fabriquation</th>
                  <th>Date d'expiration</th>
                  <th>Image</th>
                  <th>action</th>
              </tr>
              
              <?php 
            
              
              $articles = getArticle();
              if(!empty($articles)&& is_array($articles)){
                foreach($articles as $key=>$value){
                  ?>
                  <tr>
                    <td><?= $value['nomArticle']?></td>
                    <td><?= $value['libelle']?></td>
                    <td><?= $value['quantite']?></td>
                    <td><?= $value['prixUnitaire']?></td>
                    <td><?= date('d/m/y  H:i:s',strtotime($value['dateFab']))?></td>
                    <td><?= date('d/m/y  H:i:s',strtotime($value['dateExp']))?></td>
                    <td><img src="<?= $value['images'] ?>" alt="" width="70" ></td>
                    <td>
                      <a href="?id=<?= $value['id']?>"><i class='bx bx-edit-alt'></i></a>
                      <a href="../model/annulerArticle.php?id=<?= $value['id'] ?>" style="color:red;"><i class='bx bx-trash'></i></a>
                    
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