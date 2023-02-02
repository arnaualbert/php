<?php

namespace proven\monedas;


// euro
$euro = [
    'dolar' => 0.98935292,
    'libra' => 0.87548218,
];
function eur_dol($moneda){
    $resultado = 0.98935292 * $moneda;
    return $resultado;
};

function eur_lib($moneda){
    $resultado = 0.87548218 * $moneda;
    return $resultado;
};

// dolar
$dolar = [
    'eur' => 1.0107833,
    'lib' => 0.8850775,
];

function dol_eur($moneda){
    $resultado = 1.0107833 * $moneda;
    return $resultado;
};

function dol_lib($moneda){
    $resultado = 0.8850775 * $moneda;
    return $resultado;
};



//libra
$libra = [
    'dolar' => 1.1305987,
    'euro' => 1.1422189,
];

function lib_dol($moneda){
    $resultado = 1.1305987 * $moneda;
    return $resultado;
};

function lib_eur($moneda){
    $resultado = 1.1422189 * $moneda;
    return $resultado;
};


