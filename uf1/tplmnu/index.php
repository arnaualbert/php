<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
        include "topmenu.php";
        ?>
        <div class="container">
        <h2>Restautante TIKITAKA</h2>
        <p>Bienvenido</p>
        <p><?php   echo $_SESSION['USER_NAME'] ?? "" ?></p>
        <p>Proin ut nibh mi. Aenean dapibus risus lobortis, accumsan massa facilisis, dapibus sem. </p>
        <p>Aliquam erat volutpat. </p>
        <p>Curabitur vel purus nec libero mattis molestie sit amet at lacus. </p>
        <p>Mauris hendrerit consequat accumsan. </p>
        <p>Quisque rutrum pretium dictum. </p>
        <p>Sed id ligula pretium, fringilla quam eget, luctus nulla. </p>
        <div>
        <?php
        include "footer.php";
        ?>
    </body>
</html>