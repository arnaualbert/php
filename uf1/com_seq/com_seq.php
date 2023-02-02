<?php
use proven\seq;
include "lib/com_seq_fn.php";


$arr = array("A" => "T", "T" => "A", "C" => "G", "G" => "C");
$sequencia = "ATCGGCTGTCACTACTCATCAGGCTACTGGACA";
// la funcion strtr da la sequencia complementaria
/**
 * give the complementary sequence
 * @param $sequencia is the sequence
 * @param $arr is the array with the letters
 * @return string 
 */
$resultado = strtr($sequencia,$arr); 
printf("seq : $sequencia");
printf("<br>");
printf("com: $resultado");