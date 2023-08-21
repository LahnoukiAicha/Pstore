
<?php
 include('entete.php');
 ?>
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Commande</div>
              <div class="number"><?php echo getAllCommande()['nbre']?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis <?php echo date('d M Y',strtotime(getDateCommande()['vendue']))?></span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Vente</div>
              <div class="number"><?php echo getAllVente()['nbre']?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis <?php echo date('d M Y',strtotime(getDateVente()['vendue']))?></span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Article</div>
              <div class="number"><?php echo getAllArticle()['nbre'] //profit?></div>  
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">CA</div>
              <div class="number"><?php echo number_format(getAllCA()['nbre'])?></div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Aujourd'hui</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title" id="vnt">Vente recentes</div>
            <?php
            $ventes=getLastVente();
            ?>
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Date</li>
                <?php 
                foreach($ventes as $key=>$value){
                  ?>
                  <li><a href="#"><?=date('d M Y',strtotime($value['dateVente']))?></a></li>

                  <?php
                }
                ?>
              </ul>
              <ul class="details">
                <li class="topic">Client</li>
                <?php 
                foreach($ventes as $key=>$value){
                  ?>
                  <li><a href="#"><?=$value['nom']." ".$value['prenom']?></a></li>

                  <?php
                }
                ?>

                
              </ul>
              <ul class="details">
                <li class="topic">Produit</li>
                <?php 
                foreach($ventes as $key=>$value){
                  ?>
                  <li><a href="#"><?=$value['categorie']?></a></li>

                  <?php
                }
                ?>
              </ul>
              <ul class="details">
                <li class="topic">Prix</li>
                <?php 
                foreach($ventes as $key=>$value){
                  ?>
                  <li><a href="#"><?=number_format($value['prix'],0,","," ")." DH"?></a></li>

                  <?php
                }
                ?>
              </ul>
            </div>
            <div class="button">
              <a href="vente.php">Voir Tout</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Produit le plus vendu</div>
            <?php
            $ventes=getMostVente();
            foreach($ventes as $key=>$value){
            ?>
            <ul class="top-sales-details">
              <li>
                <a href="#">
                  <span class="product"><?= $value['nomArticle']." - " .$value['categorie']?></span>
                </a>
                <span class="price"><?= $value['prix']?> DH</span>
              </li>
              
            </ul>
            <?php
            }?>
          </div>
        </div>
      </div>
    </section>
   
  

<?php
 include('footer.php');
?>