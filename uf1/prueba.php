<?php 
$studlist = ["Peter","Paul","Mary"];

// echo "1st element: ". $studlist[0]; // peter es el 0
// echo "2nd element: ". $studlist[7]; // dona error perque no hi ha la posicio 7

$studqualifs = [
    "Peter" => [5,6,4,3],
    "Paul" => [8,2,9,3],
    "Mary" => [7,6,5,8]
];

$studqualif = [
    "Peter" => 5,
    "Paul" => 8,
    "Mary" => 7
];


// echo "nota mary: ". $studqualif["Mary"]; // accedim a la nota de la mary (8)

// print_r($studlist);
// echo "<br>"; // salto linea buscador 
// print_r($studqualif);


// var_dump($studlist);
// echo "<br>"; // salto linea buscador
// var_dump($studqualif);

foreach ($studlist as $elem){
    echo "<br>";
    echo $elem;
}; // bucle que recorre lista estudiantes

foreach ($studqualif as $key => $value) {
    echo "<br>";
    echo "qualification of $key is $value";
}; // bucle con clave y valor

foreach ($studqualifs as $key => $values) {
    echo "<br>";
    echo "qualifications of $key: ";
    foreach ($values as $value){    
        echo "$value ";}
}; // bucle con clave y valores