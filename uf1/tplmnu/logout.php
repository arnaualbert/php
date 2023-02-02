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

            <?php
            session_start();
            if (isset($_SESSION["user_valid"])) {  //user valid
                session_destroy();
                echo "<p>Logout done.</p>";
            }
            else {  //user not logged yet.
                echo "<p>Not logged!</p>";
            }
        ?>    

    </body>
</html>