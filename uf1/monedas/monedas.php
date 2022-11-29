<?php
use proven\monedas as mon;
include "lib/fn_monedas.php";
if(isset($_POST['submit'])){


    $cantidad = \filter_input(\INPUT_POST, 'cantidad');
    $cantidad = \filter_var($cantidad);


    // reb la variable user del formulari
    $moneda = \filter_input(\INPUT_POST, 'moneda1');
    $moneda = \filter_var($moneda);

    // reb la variable pass del formulare
    $monedas = \filter_input(\INPUT_POST, 'moneda2');
    $monedas = \filter_var($monedas);
    // $si = '';
//    if($moneda == 'dolar' && $monedas == 'euro'){
//     return $si = mon\dol_eur($cantidad);
//    }
    if($moneda == 'dolar' && $monedas == 'euro'){
     $si = mon\dol_eur($cantidad);
    }else if($moneda == 'dolar' && $monedas == 'libra'){
        $si = mon\dol_lib($cantidad);
    }else if($moneda == 'euro' && $monedas == 'libra'){
        $si = mon\eur_lib($cantidad);
    }else if($moneda == 'euro' && $monedas == 'dolar'){
        $si = mon\eur_dol($cantidad);
    }else if($moneda == 'libra' && $monedas == 'euro'){
        $si = mon\lib_eur($cantidad);
    }else if($moneda == 'libra' && $monedas == 'dolar'){
        $si = mon\lib_dol($cantidad);
    }else{
        $si = 'no pongas las dos monedas iguales';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conversor monedas</title>
    </head>
    <body>
        <h2>Conversor monedas</h2>
        <!-- <form method="post" action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> -->
        <form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
        <label for="cantidad">Cantidad</label>
        <input type="text" name="cantidad" value="<?php echo $cantidad ?? ""; ?>" />
        <label for="moneda">Moneda 1</label>
            <select name="moneda1">
                <option value="dolar">Dolar</option>
                <option value="libra">libra</option>
                <option value="euro">Euro</option>
            </select>
        <label for="monedas">Moneda 2</label>
            <select name="moneda2">
                <option value="dolar">Dolar</option>
                <option value="libra">libra</option>
                <option value="euro">Euro</option>
            </select>
            <button type="submit" name="submit" value="sent">Submit</button>
</fieldset>
<fieldset>
<input readonly="readonly"  value="<?php echo $si ?>" />
</fieldset>
        </form>
        <!-- <input readonly="readonly"  value="<?php // echo $si?>" /> -->
    </body>
</html>