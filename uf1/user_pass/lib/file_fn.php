<?php
namespace proven\files {
    
    /**
     * 
     * @param type $filename the name of the file to be read.
     * @param type $delimiter the separator between keys and values.
     * @return associative array with the data read from the file.
     */
    function readPropertiesFile($filename, $delimiter) {
        $data = array();
        if (\file_exists($filename) && \is_readable($filename)) {
            $handle = \fopen($filename, 'r');  //returns false on error.
            if ($handle) {
                while (!\feof($handle)) {
                    $line = trim(\fgets($handle)); // trim elimina los saltos y espacios
                    if ($line) {
                        list($key, $value) = \explode($delimiter, $line);
                        $data["$key"] = (int) $value;
                    }
                }
                \fclose($handle);            
            }
        }
        return $data;
    }
    /**
     * 
     * @param type $array is the list of the users with their passwords
     * @param type $username is the username that the form recieves
     * @param type $pass is the password that the form recieves
     * @return type $name say if the user and the password are correcr
     */

    function validate($array, $username, $pass){
        foreach($array as $name => $password){
            if ($username == $name AND (int)$password == $pass){
                $name = "Correcto";
                break;
            }else {
                $name = "no existes";
            }
        }
        return $name;
    }
}