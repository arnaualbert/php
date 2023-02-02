<?php

$directorio = dirname(__DIR__); // da el directorio

$is_writable = is_writable("Person.php");

$date = new DateTime();

$result = $date->format('Y-m-d H:i:s');



echo($directorio);
echo("\n");
echo($is_writable);
echo("\n");
echo(gettype($result));
echo("\n");
echo($result);