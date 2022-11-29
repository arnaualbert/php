<?php session_start(); 
include 'lib/fn_practica.php';
use proven\files;
$archivo = "./files/daymenu.txt";
$separador = ";";
$appetiser = "appetiser";
//$lista = files\readmenu($archivo,$separador);
$listacomida = files\readfood($archivo,$separador);
$drinks = files\getcategory($listacomida,"drink");
$desserts = files\getcategory($listacomida,"dessert");
$maincourse = files\getcategory($listacomida,"maincourse");
$firstcourse = files\getcategory($listacomida,"firstcourse");
$appetiser = files\getcategory($listacomida,"appetiser");
//$lista = files\leer_fichero_completo($archivo,$appetiser);
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
<?php 
// foreach ($lista as $element){
//         echo "<li>".$element."</li>";
// }


// $hola = files\readAllUserss($archivo,$separador);


echo "<ul>";
echo "<li> appetiser </li>";
foreach ($appetiser as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";


echo "<ul>";
echo "<li> firstcourse </li>";
foreach ($firstcourse as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";


echo "<ul>";
echo "<li> Desserts </li>";
foreach ($maincourse as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";


echo "<ul>";
echo "<li> maincourse </li>";
foreach ($desserts as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";


echo "<ul>";
echo "<li> Drinks </li>";
foreach ($drinks as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";


?>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>