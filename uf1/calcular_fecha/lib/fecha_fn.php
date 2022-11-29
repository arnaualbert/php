<?php
namespace proven\fecha;

$fecha_nacimiento = new DateTime("1998-01-25");
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);

