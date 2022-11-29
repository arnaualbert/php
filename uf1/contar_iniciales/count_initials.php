<?php
include 'lib/fn_ci.php';
use proven\files;

if(isset($_POST['submit'])){
$filepath = filter_input(INPUT_POST, 'sports', FILTER_SANITIZE_STRING); 

$dataRead = fopen($filepath,"r");
$dataRead = fgets($dataRead);
$dataRead = strtolower($dataRead);
// $cadena = "Contarcaracteres contar caracteres y palabras en Php";
$ejemplo = explode(" ", $dataRead);
// $letra = $ejemplo[0];
// var_dump($letra[0])
$lista = [];

for($i = 0;$i < count($ejemplo);$i ++){
  $letra = $ejemplo[$i];
  array_push($lista,$letra[0]);
}
$resultados = array_count_values($lista);
// var_dump($resultados);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<select name="sports">
  <option value="f1.txt">F1</option>
  <option value="nba.txt">NBA</option>
  <option value="motogp.txt">Moto GP</option>
</select>
<button type="submit" name="submit" value="sent">Submit</button>
<br>Resultado: <?php echo print_r($resultados); ?><br>
</form>
</body>
</html>