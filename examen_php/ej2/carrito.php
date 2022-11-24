<?php session_start(); 
          $productlist = unserialize($_SESSION['productlist']);

// $productos = $_SESSION['productlist'];?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Carrito</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
        include "topmenu.php";
        ?>
        <div class="container">
        <h2>Carrito</h2>
        <p>Bienvenido</p>
        <?php 
        var_dump($productlist);?>
    </body>
</html>