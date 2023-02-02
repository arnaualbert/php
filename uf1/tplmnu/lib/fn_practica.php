<?php
namespace proven\files{
    /**
     * lee los parametros del archivo
     * @param type $filename the name of the file to be read.
     * @param type $delimiter the separator between keys and values.
     * @return associative array with the data read from the file.
     */
    function readPropertiesFile($filename, $delimiter) {
        $data = array();
        $roles = array();
        if (\file_exists($filename) && \is_readable($filename)) {
            $handle = \fopen($filename, 'r');  //returns false on error.
            if ($handle) {
                while (!\feof($handle)) {
                    $line = trim(\fgets($handle)); // trim elimina los saltos y espacios
                    if ($line) {
                        list($key, $value,$rol,$name,$surname) = \explode($delimiter, $line);
                        $data["$key"] = $value;
                        $roles["$key"] = $rol;
                    }
                }
                \fclose($handle);            
            }
        }
        return $data;
    }

        /**
     * lee los parametros del archivo
     * @param type $filename the name of the file to be read.
     * @param type $delimiter the separator between keys and values.
     * @return associative array with the data read from the file.
     */
    function getrol($filename, $delimiter) {
        $roles = array();
        if (\file_exists($filename) && \is_readable($filename)) {
            $handle = \fopen($filename, 'r');  //returns false on error.
            if ($handle) {
                while (!\feof($handle)) {
                    $line = trim(\fgets($handle)); // trim elimina los saltos y espacios
                    if ($line) {
                        list($key, $value,$rol,$name,$surname) = \explode($delimiter, $line);
                        $roles["$key"] = $rol;
                    }
                }
                \fclose($handle);            
            }
        }
        return $roles;
    }


/**
 * Funcion para registrar los usuarios
 * Escribe los datos pasades per parametre en el ficher $filepath 
 * si algun dels paramtres que reb te longitud 0 o ja existeix l'usuari no escriu i retorna fals
 * en cas contrari retorna true
 * @param $username is the username
 * @param $pass is the pass
 * @param $name is the name
 * @param $surname is the surname
 * @param $filepath is the filepath
 */
    function escribir($username, $pass, $name, $surname, $filepath): bool{
        if((strlen($username) == 0) or (strlen($pass) == 0) or (strlen($name) == 0) or (strlen($surname) == 0)){return false;} else{
        // abre el archivo y pone el puntero al final 
        $out = \fopen($filepath,"a");
        // escribe la variable recibida del forumlario $user en el fichero $out
        $write_user = \fprintf($out,"%s;%s;%s;%s;%s\n", $username,$pass,"registered",$name,$surname);
        // $write_user = \fwrite($out,$username.":".$pass.":"."registered".":".$name.":".$surname."\n");
        $cerrar = \fclose($out);
        return true;   }     
    }
        /**
     * @param type $array is the list of the users with their passwords
     * @param type $username is the username that the form recieves
     * @param type $pass is the password that the form recieves
     * @return type bool say if the user and the password are correct
     */
        function check($array, $username){
            foreach($array as $nombre => $password){
                 if ($username == $nombre){
                    return true;
                 }
    
            }
    
        }

        /**
         * Login 
         * this function validate that the username and the password exist
         * @param $array get the couple of username and password that is on the txt
         * @param $username is the username that the form sends
         * @param $pass is the password that the form sends
         */

        function validate($array, $username, $pass){
            foreach($array as $name => $password){
                if ($username == $name AND $password == $pass){
                    // $name = "Session iniciada"; esto va bien 
                    $name =  true;
                    break;
                }else {
                    // $name = "no existe este usuario : $username ";esto va bien
                    $name = false;
                }
            }
            return $name;
        }

       // menu del dia funciona
        /**
         * this function read the menu adn the day menu
         * @param $archivo is the file
         * @param $delimiter is the ;
         * @param $pass is the password that the form sends
         */
        function readmenu($archivo, $delimiter) {
            $lista = [];
            $fp = fopen($archivo,'r') or die("No se puede abrir el archivo");
            while($csv_line = fgetcsv($fp,0,";")) {
                for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                  switch ($i) {
                    case 0: 
                      array_push($lista,$csv_line[$i]);
                      break;
                    case 1: 
                      array_push($lista,$csv_line[$i]);
                      break;
                    case 2: 
                      array_push($lista,$csv_line[$i]);
                      break;
                    case 3:
                      array_push($lista,$csv_line[$i]);
                      break;
                    default:
                      break;
                  }
                }
            }
            fclose($fp) or die("Error al cerrar el archivo");
            return $lista;
        }






        function readfood($filename,$delimiter){
            // to do
            // $filename = "/home/dax/public_html/tplmnu/files/daymenu.txt";
            // $delimiter = ";";
                    $result = array();
                    if (\file_exists($filename) && \is_readable($filename)) {
                        $handle = \fopen($filename, 'r');  //returns false on error.
                        if ($handle!==false) {
                            //while (!\feof($handle)) {
                                //$fields = \fgetcsv($handle,1000,$this->delimiter);
                                do{$line = "";
                                    \fscanf($handle,"%s\n", $line);
                                    $fields = \explode($delimiter,$line);
                                    // if(count($fields)==3){
                                    //     $uname = $fields[0];
                                    //     $pwd = $fields[1];
                                    //     $s = $fields[3];
                                        // $user = new User($uname,$pwd);
                                    array_push($result,$fields);
                                    #}
                            }while(!\feof($handle));
                        }}else{
                            $result = array();
                        }
                    
                    return $result;
                }

            // $hola = readfood("/home/dax/public_html/tplmnu/files/menu.txt",";");
            // $drinks = array();
            // foreach($hola as $k){if($k[1] == "dessert"){
            //     array_push($drinks,$k);
            // }};
            // var_dump($drinks);

            // var_dump($hola);
        function getcategory($lista,$param){
            $typefood = array();
            foreach($lista as $k){if($k[1] == $param){
                array_push($typefood,$k[2]);
            }};
            return $typefood;
        }
        function getcategorymenu($lista,$param){
            $typefood = array();
            foreach($lista as $k){if($k[1] == $param){
                $siu = [$k[2],$k[3]];
                array_push($typefood,$siu);
            }};
            return $typefood;
        }
        // $comita = getcategorymenu($hola,"drink");
        // var_dump($comita);
}
?>