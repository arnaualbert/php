<?php
namespace proven\files {
    
    /**
     * 
     * @param type $filename the name of the file to be read.
     * @param type $delimiter the separator between keys and values.
     * @return associative array with the data read from the file.
     */

    function leer_fichero_completo($nombre_fichero){
        //abrimos el archivo de texto y obtenemos el identificador
        $fichero_texto = fopen ($nombre_fichero, "r");
        //obtenemos de una sola vez todo el contenido del fichero
        //OJO! Debido a filesize(), sólo funcionará con archivos de texto
        $contenido_fichero = fread($fichero_texto, filesize($nombre_fichero));
        return $contenido_fichero;
     } 
}