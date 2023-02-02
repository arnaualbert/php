<?php
/**
 * @param $num1 es el numero de kg de patatas que voles
 * @param $precio es el precio original que se tiene por menos de 10kg de patatas
 * @param $total es la suma del precio por los kg de patatas
 * el if va reduciendo el precio de las patatas cada vez que aumentan los kg 
 */

const year_classifications = [    
    ['from' => 0, "to" => 10, "type" => 1.30],
    ['from' => 10, "to" => 20, "type" => 1.25],
    ['from' => 20, "to" => 30, "type" => 1.20],
    ];
    
if(isset($_POST['submit'])){

    $num1 = \filter_input(\INPUT_POST, 'n1', \FILTER_SANITIZE_NUMBER_FLOAT, \FILTER_FLAG_ALLOW_FRACTION);
    $num1 = \filter_var($num1, \FILTER_VALIDATE_FLOAT);

    function classification(int $num1): string{
        $resultado = "";
        foreach(year_classifications as $element){
            if (($ano > $element['from']) && ($ano < $element['to'])){
                $resultado = $element['type'];
            }
        }
        return $resultado;
    };

    
	// $precio = 1.30;
    // $total = $num1 * $precio;
    // if($num1 > 10) 
    // $precio = 1.25;
    // else if($num1 >20)
    // $precio = 1.20;
    // else if($num1 >30)
    // $precio = 1.15;
    // $total = $num1 * $precio;
}?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PIDE PATATAS</title>
    </head>
    <body>
        <h2>Tienda de patatas proven</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <fieldset>
                <legend>Pide tus kg de patatas</legend> 
                <div>
                    <label for="drink">KG DE PATATAS: </label>
                    <input name="n1" value="<?php echo $num1 ?? ""; ?>"><br>
                    <button type="submit" name="submit" value="sent">Submit</button>
                </div>
            </fieldset>
            <fieldset>
                <br>Resultado: <input readonly="readonly"  type='text' value="<?php echo $resultado; ?>"><br>
            </fieldset>
        </form>
    </body>
</html>