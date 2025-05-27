<?php
include 'components/menu.php';
?>
<!DOCTYPE html>
<html lang="fi">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="icon" href="images/Logot/oh3ac5.ico">
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-12E7VJ916H"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-12E7VJ916H', { 'send_page_view': true });
  </script>



</head>


<header class="header">
    <!-- Vasen: Hamburger-nappi -->
    <a href="javascript:void(0)" class="header-reorderB" title="MENU">
        <i onclick="openNav()" class="fa fa-reorder"></i>
    </a>

    <!-- Keskitetty logo-teksti -->
     <div class="header_logo-text-container">
    <p class="header_logo-text">OH3AC</p>
    <p class="header_logo-text2">Lahden Radioamatöörikerho</p>
</div>
    <!-- Oikea: Logo -->
    <img src="images/Logot/OH3AC-MastoLogo.svg" alt="Logo" class="header_logo">
</header>

</html>