<?php session_start(); 
include 'lib/fn_practica.php';
use proven\files;
$archivo = "./files/daymenu.txt";
$separador = ";";
$appetiser = "appetiser";
//$lista = files\readmenu($archivo,$separador);
$hola = files\readfood($archivo,$separador);

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



$appetiser = array();
foreach($hola as $k){if($k[1] == "appetiser"){
    array_push($appetiser,$k[2]);
}};

echo "<ul>";
echo "<li> appetiser </li>";
foreach ($appetiser as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";


$firstcourse = array();
foreach($hola as $k){if($k[1] == "firstcourse"){
    array_push($firstcourse,$k[2]);
}};

echo "<ul>";
echo "<li> firstcourse </li>";
foreach ($firstcourse as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";










$desserts = array();
foreach($hola as $k){if($k[1] == "dessert"){
    array_push($desserts,$k[2]);
}};

echo "<ul>";
echo "<li> Desserts </li>";
foreach ($desserts as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";


$maincourse = array();
foreach($hola as $k){if($k[1] == "maincourse"){
    array_push($maincourse,$k[2]);
}};

echo "<ul>";
echo "<li> maincourse </li>";
foreach ($maincourse as $element){
        echo "<li>".$element."</li>";
}
echo "</ul>";





$drinks = array();
foreach($hola as $k){if($k[1] == "drink"){
    array_push($drinks,$k[2]);
}};

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