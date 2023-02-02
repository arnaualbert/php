<?php
namespace proven\palabra;


/**
 * find the position in a array.
 * @param $palabra the word that is finding
 * @param $arry is the list of words
 * @return string 
 */


function buscarposicion($palabra,$arry){
  $a=$palabra;
  $posicion=0;
  $aencontrado[]=array();
  $longitudarray=sizeof($arry);


  for($i=0 ; $i<$longitudarray ; $i++){ 

  if((isset($a)) && ($a==$arry[$i])){ 
    $aencontrado[]=$arry[$i]; 
    $posicion=$i+1;

  } 

}

return $respuesta= "posicion : ".$posicion;


 }