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
    <div class="container-fluid">
        <?php include_once "topmenu.php";?>
        <div class="container">
        <h2>Day menu</h2>

    <h3>Appetiser</h3>
    <?php
    require_once 'fn-php/fn_users.php';
    $dayMenu = daymenu("files/daymenu.txt", 'appetiser');
    foreach ( $dayMenu as $category ):
        ?>
        <?php
        foreach ( $category as $plate ):
        ?>
                <li><?php echo $plate;?></li>
        <?php
        endforeach;
        ?>
    <?php
    endforeach;
    ?>
<br><br>
<h3>Firstcourse</h3>
    <?php
    require_once 'fn-php/fn_users.php';
    $dayMenu = daymenu("files/daymenu.txt", 'firstcourse');
    foreach ( $dayMenu as $category ):
        ?>
        <?php
        foreach ( $category as $plate ):
        ?>
                <li><?php echo $plate;?></li>
        <?php
        endforeach;
        ?>
    <?php
    endforeach;
    ?>

<br><br>
<h3>Maincourse</h3>
    <?php
    require_once 'fn-php/fn_users.php';
    $dayMenu = daymenu("files/daymenu.txt", 'maincourse');
    foreach ( $dayMenu as $category ):
        ?>
        <?php
        foreach ( $category as $plate ):
        ?>
                <li><?php echo $plate;?></li>
        <?php
        endforeach;
        ?>
    <?php
    endforeach;
    ?>

<br><br>
<h3>Dessert</h3>
    <?php
    require_once 'fn-php/fn_users.php';
    $dayMenu = daymenu("files/daymenu.txt", 'dessert');
    foreach ( $dayMenu as $category ):
        ?>
        <?php
        foreach ( $category as $plate ):
        ?>
                <li><?php echo $plate;?></li>
        <?php
        endforeach;
        ?>
    <?php
    endforeach;
    ?>

<br><br>
<h3>Drink</h3>
    <?php
    require_once 'fn-php/fn_users.php';
    $dayMenu = daymenu("files/daymenu.txt", 'drink');
    foreach ( $dayMenu as $category ):
        ?>
        <?php
        foreach ( $category as $plate ):
        ?>
                <li><?php echo $plate;?></li>
        <?php
        endforeach;
        ?>
    <?php
    endforeach;
    ?>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>