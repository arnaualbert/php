<?php
namespace proven\age;

const year_classifications = [    
['from' => 0, "to" => 17, "type" => "ESTUDIANTE"],
['from' => 18, "to" => 62, "type" => "TRABAJADOR"],
['from' => 63, "to" => 1000, "type" => "JUBILADO"],
];


/**
 * say if is a studend , worker or retiree depend of the year
 * @param $anois the year of the human
 * @return string 
 */

function classification(int $ano): string{
    $resultado = "";
    foreach(year_classifications as $element){
        if (($ano > $element['from']) && ($ano < $element['to'])){
            $resultado = $element['type'];
        }
    }
    return $resultado;
};
