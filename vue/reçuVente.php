
<?php

 include('entete.php');

 if(!empty($_GET['id'])){
  $vente=getVente($_GET['id']);
  
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
  background-color: rgb(6,183,233);
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
  border: 1px solid #ddd;
}
th,td{
  text-align: left;
  padding: 16px;
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

/*reçu*/
.cote-a-cote{
  display: flex;
  justify-content: space-between;
}

.page{
  width: 210mm;
  min-height: 297mm;
  padding: 20mm;
  margin: 10mm auto;
  border: 1px solid #d3d3d3;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

.subpage{
  padding: 1cm;
  border: 5px solid red;
  height: 257mm;
  outline: 2cm  solid #ffeaea;
}
@media print{
  .hidden-print,
  .hidden-print *{
    display: none !important;
  }
}
@page{
  size: A4;
  margin: 0;
}
@media print{
  html,
  body{
    width: 210mm;
    height: 297mm;
  }
  .hidden-print,
  .hidden-print *{
    display: none !important;
  }
  .page{
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}
button{
  background-color: rgb(6,183,233);
  color: white;
  width:100px;
  height: 30px;
  border: 1px solid #ccc;
  font-size: 15px;
  border-radius: 5px;
  text-align: center;
  margin: 15px;
  cursor: pointer;
  position: relative;
  left: 45%;
}


    </style>
</head>
      <div class="home-content">
      
          <button class="hidden-print" id="btnPrint"><i class='bx bx-printer' >Imprimer</i></button>
        
      <div class="page">
        
        <br>
            <div class="cote-a-cote">
              <h2>P-STORE Stock</h2>
              <div>
                <p>Reçu N° :<?=$vente['id']?> </p>
                <p>Date :<?=date('d/m/y  H:i:s',strtotime($vente['dateVente']))?> </p>
              </div>
            </div>

            <div class="cote-a-cote" style="width:50%;">
                <p>Client :</p>
                <p><?= $vente['nom']." ".$vente['prenom'] ?> </p>
            </div>

            <div class="cote-a-cote" style="width:50%;">
                <p>Telephone : </p>
                <p><?= $vente['tele']?> </p>
            </div>

            <div class="cote-a-cote" style="width:50%;">
                <p>Adresse : </p>
                <p><?= $vente['adresse']?> </p>
            </div>
            <br>

            <table class="mtable">
                <tr>
                  <th>Designation</th>
                  <th>Quantité</th>
                  <th>Prix Unitaire </th>
                  <th>Prix totale</th>
                  
              </tr>
             
              
                  <tr>
                    <td><?= $vente['nomArticle']?></td>
                    <td><?= $vente['quantite']?></td>
                    <td><?= $vente['prixUnitaire']?></td>
                    <td><?= $vente['prix']?></td>
                  </tr>
                
                
              </table>
        </div>


        
    </section>

<?php
 include('footer.php');
?>

<script>
var btnPrint =document.querySelector('#btnPrint');
btnPrint.addEventListener('click',()=>window.print());

 
</script>