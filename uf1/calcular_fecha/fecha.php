<?php

$fecha1 = new DateTime("2003-12-12"); 
$fecha2 = new DateTime("now"); 
/**
 * say the difference betwen dates
 * @param $fecha2 is today  day
 * @return string 
 */
$diferencia = $fecha1->diff($fecha2); 
echo "<p>Age = " . $diferencia->format('%y years, %m months, %d days') . "</p>";