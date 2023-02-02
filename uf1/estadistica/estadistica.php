<?php
use proven\estadistica;
include "lib/estadistica_fn.php";

$array = array(1,2,3,10);

$mitjana = estadistica\media($array);
$minimo = min($array);
$maximo = max($array);
$mediana =  estadistica\mediana($array);

printf("la media es $mitjana ");
printf("el minimo es $minimo ");
printf("el maximo es $maximo ");
printf("la mediana es $mediana ");