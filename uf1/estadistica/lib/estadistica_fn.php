<?php
namespace proven\estadistica;

/**
 * calculates the media.
 * @param $array is the list of numbers
 * @return float 
 */


function media($array){
    $result = array_sum($array) / count($array);
    return $result;
}


/**
 * calculates the mediana.
 * @param $arrInput is the list of numbers
 * @return float 
 */
function mediana($arrInput){ 
    if(is_array($arrInput)){ 

        rsort($arrInput); 

        $size = count($arrInput);
        $middle = count($arrInput) / 2; 

        if ($size  % 2 != 0){
            $median = $arrInput[$middle]; 
        }
        else{
            $median1 = $arrInput[$middle]; 
            $median2 = $arrInput[$middle-1]; 
            $median = ($median1 + $median2) / 2;
        }
        return $median; 
    }     
} 