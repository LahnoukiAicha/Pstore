<?php 
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  // Redirect to login page if user is not authenticated
  header('location:auth.php');
  exit();
}
include_once('../model/function.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title> <?php
    echo ucfirst(str_replace('.php',"",basename($_SERVER['PHP_SELF'])));
    ?></title>
    <link rel="stylesheet" href="../public/css/stylee.css"/>
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
   

    <div class="sidebar hidden-print">
      <div class="logo-details">
      <i class='bx bxl-product-hunt'></i>
        <span class="logo_name">P-STORE</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php"<?php if(basename($_SERVER['PHP_SELF'])=="dashboard.php"){?> class = "active" <?php }?> >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
        <a href="vente.php" <?php if(basename($_SERVER['PHP_SELF'])=="vente.php"){?> class = "active" <?php }?>>
            <i class="bx bx-shopping-bag"></i>
            <span class="links_name">Vente</span>
          </a>
        </li>
        <li>
        <a href="client.php" <?php if(basename($_SERVER['PHP_SELF'])=="client.php"){?> class = "active" <?php }?>>
        <i class='bx bxs-user-detail'></i>
            <span class="links_name">Client</span>
          </a>
        </li>
        <li>
          <a href="article.php" <?php if(basename($_SERVER['PHP_SELF'])=="article.php"){?> class = "active" <?php }?>>
            <i class="bx bx-box"></i>
            <span class="links_name">Article</span>
          </a>
        </li>
        
        <li>
        <a href="fournisseur.php" <?php if(basename($_SERVER['PHP_SELF'])=="fournisseur.php"){?> class = "active" <?php }?>>
            <i class="bx bx-user"></i>
            <span class="links_name">Fournisseur</span>
          </a>
        </li>
        <li>
          <a href="commande.php" <?php if(basename($_SERVER['PHP_SELF'])=="commande.php"){?> class = "active" <?php }?>>
          <i class='bx bx-command'></i>
            <span class="links_name">Commande</span>
          </a>
        </li>
        <li>
          <a href="categorie.php" <?php if(basename($_SERVER['PHP_SELF'])=="categorie.php"){?> class = "active" <?php }?>>
          <i class='bx bx-category'></i>
            <span class="links_name">Categorie</span>
          </a>
        </li>
  
        </li>
        <li class="log_out">
          <a href="auth.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav classe="hidden-print">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn hidden-print"></i>
          <span class="dashboard"> <?php
    echo ucfirst(str_replace('.php',"",basename($_SERVER['PHP_SELF'])));
    ?></span>
        </div>
        <div class="search-box hidden-print">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details hidden-print">
          <img src="../public/images/aicha.jpg" alt="">
          <span class="admin_name">Lahnouki Aicha</span>
        </div>
      </nav>