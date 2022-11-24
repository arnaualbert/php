<?php 
session_start();
include 'lib/fn_lib.php';
use proven\files;
if(isset($_SESSION['productlist'])){
    $productlist = unserialize($_SESSION['productlist']);
    var_dump($productlist);
}else{
    $productlist=array();
}
if(filter_has_var(INPUT_POST,"submit")){
    // reb la variable user del formulari
    // reb la variable user del formulari
    $productos = \filter_input(\INPUT_POST, 'productos');
    $productos = \filter_var($productos);

    // $productoseleccionado = trim(filter_input(INPUT_POST, 'producto', FILTER_SANITIZE_STRING));
    // $productoseleccionado = \filter_var($productoseleccionado);

    // $productoseleccionado = \filter_input(\INPUT_POST, 'seleccion');
    // $productoseleccionado = \filter_var($productoseleccionado);
    $selectedp = \filter_input(\INPUT_POST, 'seleccion');
    $selectedp = \filter_var($selectedp);

    // reb la variable pass del formulare
    $cantidad = \filter_input(\INPUT_POST, 'unidades');
    $cantidad = \filter_var($cantidad);
    // array_push($productlist,$productos,$cantidad);
    $lista = array();

    // $productlist["$productoseleccionado"] = $cantidad;
    // $productlist["$productos"] = $cantidad;


    $productlist["$selectedp"] = $cantidad;
    array_push($lista,$productlist);



    $_SESSION['productlist'] = serialize($lista);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Porductos</title>
    </head>
    <body>
    <?php
        include "topmenu.php";
        ?>
        <h2>Productos</h2>
        <form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
        <label for="productoss">Productos</label>

        <?php
                    $productoseleccionado = "";
                    $productoss =  files\readPropertiesFile("/home/dax/public_html/examen_php/ej2/files/productos.txt", ":");
                    $allproducts = files\getproducts($productoss);
                    files\renderSelector("seleccion", $allproducts, $productoseleccionado);
                    ?>        
        <label for="unidadess">Unidades</label>
            <select name="unidades">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <button type="submit" name="submit" value="sent">Comprar</button>
</fieldset> 

                <!-- <div>
                    <?php
                    // $producto =  files\readPropertiesFile("/home/dax/public_html/examen_php/ej2/files/productos.txt", ":");
                    // $allproducts = files\getproducts($producto);
                    // files\renderSelector("seleccion", $allproducts, $productoseleccionado);
                    ?>
                    <button type="submit" name="btnSubmit" value="submit">Submit</button>
                </div>

            <div>
                    <label >Producto: </label>
                    <input type="text" name="productselected" disabled="disabled" value="<?php echo $productoseleccionado ?? ""; ?>" />
                </div>
                <div>
                    <label >Unidades: </label>
                    <input type="text" name="unidades" value="<?php echo $cantidad ?? ""; ?>" />
                </div>
                <div>
                    <label for="price">Precio </label>
                    <input type="text" name="price" disabled="disabled" value="<?php echo number_format($price ?? 0.0, 2); ?>" />
                </div> -->

        </form>
    </body>
</html>