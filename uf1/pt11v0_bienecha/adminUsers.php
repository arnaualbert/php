<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>DAWBI-M07-Pt11</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    
<form action="login.php" method="post">
    <div class="container-fluid">
        <?php include_once "topmenu.php";?>
        <div class="container">
        <h2>Restaurant application</h2>
<p>
<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.dHyASr9pXLLJDsDGsI5sNwHaCB%26pid%3DApi&f=1&ipt=a3732b13562c33d77dbb90761ad3f256487d6e6574233555969d69e3e56efeca&ipo=images">
</p>

<p>En aquest apartat es podra veure els usuaris que son admins
</p>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>