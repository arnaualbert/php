<?php
use proven\palabra;
include "lib/palabra_fn.php";

$arry = array("Hola", 
"Arnau",
"Dinero",
"Huevo");
$resultado = palabra\buscarposicion("Arnau",$arry);
printf($resultado);