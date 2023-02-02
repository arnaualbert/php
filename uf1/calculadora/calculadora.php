<?php
if(isset($_POST['submit'])){
/**
 * @param $num1 es el primer numero
 * @param $num2 es el segon numero
 * @param $operacion es el parametre que rep per l'operacio que vol fer
 * el if agafa l'operacio que vol fer i la fa
 */
    $num1 = \filter_input(\INPUT_POST, 'n1', \FILTER_SANITIZE_NUMBER_FLOAT, \FILTER_FLAG_ALLOW_FRACTION);
    $num1 = \filter_var($num1, \FILTER_VALIDATE_FLOAT);

	$num2 = \filter_input(\INPUT_POST, 'n2', \FILTER_SANITIZE_NUMBER_FLOAT, \FILTER_FLAG_ALLOW_FRACTION);
    $num2 = \filter_var($num2, \FILTER_VALIDATE_FLOAT);

	
	$operacion=$_POST['op'];
	if($operacion=="+")
		$ans=$num1+$num2;
	else if($operacion=="-")
		$ans=$num1-$num2;
	else if($operacion=="x")
		$ans=$num1*$num2;
	else if($operacion=="/")
		$ans=$num1/$num2;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
<form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Numero 1:<input name="n1" value="<?php echo $num1 ?? ""; ?>"><br>
Numero 2:<input name="n2" value="<?php echo $num2 ?? ""; ?>"><br>
<input type="radio" name="op" value="+">
 <label for="+">+</label><br>
<input type="radio" name="op" value="-">
<label for="-">-</label><br>
<input type="radio" name="op" value="x">
<label for="x">x</label><br>
<input type="radio" name="op" value="/">
<label for="/">/</label><br>
<button type="submit" name="submit" value="sent">Submit</button>
<br>Resultado: <input readonly="readonly"  type='text' value="<?php echo $ans; ?>"><br>
</form>
</body>
</html>