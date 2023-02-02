<?php
use proven\nucleotids;
include "lib/count_nucleotids_fn.php";

$sequencia="ataacccgggtt";
/**
 * count every nucleotid
 * @param $sequencia is the sequence
 * @param "" is the nucleotid
 * @return integer
 */
$a=substr_count($sequencia,"a");
$t=substr_count($sequencia,"t");
$c=substr_count($sequencia,"c");
$g=substr_count($sequencia,"g");

printf("Adeninas : $a");
printf("<br>");
printf("Citosina: $c");
printf("<br>");
printf("Timina: $t");
printf("<br>");
printf("Guanina: $g");
