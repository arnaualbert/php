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
        <h3>Appetiser</h3>
        <table border="1" width="50%">
    <?php
    require_once 'fn-php/fn_users.php';
    $Menu = menu("files/menu.txt", 'appetiser');
    foreach ( $Menu as $plate ):
        ?>
        <tr>
        <?php
        foreach ( $plate as $element ):
        ?>
                <td align="center"><?php echo $element;?></td>
        <?php
        endforeach;
        ?>
        </tr>
    <?php
    endforeach;
    ?>
    </table><br><br>

    <h3>Firstcourse</h3>
    <table border="1" width="50%">
    <?php
    require_once 'fn-php/fn_users.php';
    $Menu = menu("files/menu.txt", 'firstcourse');
    foreach ( $Menu as $plate ):
        ?>
        <tr>
        <?php
        foreach ( $plate as $element ):
        ?>
                <td align="center"><?php echo $element;?></td>
        <?php
        endforeach;
        ?>
        </tr>
    <?php
    endforeach;
    ?>
    </table><br><br>

    <h3>Maincourse</h3>
    <table border="1" width="50%">
    <?php
    require_once 'fn-php/fn_users.php';
    $Menu = menu("files/menu.txt", 'maincourse');
    foreach ( $Menu as $plate ):
        ?>
        <tr>
        <?php
        foreach ( $plate as $element ):
        ?>
                <td align="center"><?php echo $element;?></td>
        <?php
        endforeach;
        ?>
        </tr>
    <?php
    endforeach;
    ?>
    </table><br><br>

    <h3>Dessert</h3>
<table border="1" width="50%">
    <?php
    require_once 'fn-php/fn_users.php';
    $Menu = menu("files/menu.txt", 'dessert');
    foreach ( $Menu as $plate ):
        ?>

        <tr>
        <?php
        foreach ( $plate as $element ):
        ?>
                <td align="center"><?php echo $element;?></td>
        <?php
        endforeach;
        ?>
        </tr>
    <?php
    endforeach;
    ?>
    </table><br><br>

    <h3>Drink</h3>
    <table border="1" width="50%">
    <?php
    require_once 'fn-php/fn_users.php';
    $Menu = menu("files/menu.txt", 'drink');
    foreach ( $Menu as $plate ):
        ?>
        <tr>
        <?php
        foreach ( $plate as $element ):
        ?>
                <td align="center"><?php echo $element;?></td>
        <?php
        endforeach;
        ?>
        </tr>
    <?php
    endforeach;
    ?>
    </table>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>