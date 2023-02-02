<?php
use proven\far_cel as far_cel;
include "lib/far_cel_fn.php";


$temp_cel = 30.0;
$temp_far = 86.0;

$get_celsius = far_cel\celsius($temp_far);
$get_far = far_cel\farenheit($temp_cel);

printf("The temperature in celsius is %.2f \n", 
$get_celsius);

printf("The temperature in farenheit is %.2f \n", 
$get_far);