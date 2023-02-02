<?php
use proven\age as age;
include "lib/edad_fn.php";

$years = 20;
$clasificar = age\classification($years);
printf("con $years años es un $clasificar");