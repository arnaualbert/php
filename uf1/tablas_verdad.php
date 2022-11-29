<?php

// --------------------
// foo() nunca será llamado ya que los operadores están en cortocircuito

$a = (false && foo());
$b = (true  || foo());
$c = (false and foo());
$d = (true  or  foo());

// --------------------
// "||" tiene una precedencia mayor que "or"

// El resultado de la expresión (false || true) es asignado a $e
// Actúa como: ($e = (false || true))
$e = false || true;

// La constante false es asignada a $f antes de que suceda la operación "or"
// Actúa como: (($f = false) or true)
$f = false or true;

var_dump($e, $f);

// --------------------
// "&&" tiene una precedencia mayor que "and"

// El resultado de la expresión (true && false) es asignado a $g
// Actúa como: ($g = (true && false))
$g = true && false;

// La constante true es asignada a $h antes de que suceda la operación "and"
// Actúa como: (($h = true) and false)
$h = true and false;

var_dump($g, $h);
?>