<?php
    /**
     * searches username in file
     * @param type $username the username to search
     * @return array with all data of that user or empty array
     */
    function searchUser(string $username):array {
        $filename = "files/users.txt";
        $delimiter = ";";
        $result = [];
        if (\file_exists($filename) && \is_readable($filename)) {
            $handle = \fopen($filename, 'r');  //returns false on error.
            if ($handle) {
                while (!\feof($handle)) {
                    fscanf($handle, "%s\n", $line);
                    if ($line) {
                        list($usr, $psw, $rol, $name, $surname) = \explode($delimiter, $line);                       
                        if (($usr==$username)) {
                            $result = array(
                                'username' => $usr,
                                'password' => $psw,
                                'rol' => $rol,
                                'name' => $name,
                                'surname' => $surname);
                            break;
                        }
                    }
                }
                \fclose($handle);            
            }
        }  
        return $result;
    }
    /**
     * inserts a new user in file, preventing duplicates
     * (username must be unique)
     * @return bool true if successfully inserted, false otherwise 
     */


function insertUser($username, $password, $name, $surname){

    $filename = "files/users.txt";
    $handle = \fopen($filename, 'a+');

    $user = searchUser($username);
    $rol = 'registered';

    $result = false;

    if(empty($user)){
       fprintf($handle, "\n%s;%s;%s;%s;%s", $username, $password, $rol, $name, $surname);
       fclose($handle);
        $result = true;
    }else if($user['username'] == $username){
        $result = false;
    }
    return $result;
}

 /**
     * search into the user array and compares username and password and returns true if it exists
     * @param type $username the username to search
     * @param type $password the password to compare with the txt
     * @return bool true if successfully search it, false otherwise 
     */
function login(string $username,string $password): bool{
        
    $user = searchUser($username);
    $result = false;
    
    if(count($user)>0){
    if(($user['username'] == $username) && ($user['password'] == $password)){
        $result = true; 
    }}

    return $result;

}


 /**
     * open the input file and make one array of arrays with the information of the menus
     * @param type $category_type the type of the plate I want to save
     * @param type $filename the filename to do the arrays
     * @return array return an array with the menus with the specified category
     */
function menu($filename, $category_type):array{
    $menu_array = array();
    $file = fopen($filename, 'r');

    while ($menuInfo = fscanf($file, "%s\n", $line)){
        list($id, $category, $name, $price) = \explode(';', $line);
        if($category == $category_type){
        $course_array  = [$name, $price . '€'];
        array_push($menu_array,$course_array );
        }
    }
    fclose($file);
    return  $menu_array ;
}


 /**
     * open the input file and make one array of arrays with the information of the menus
     * @param type $category_type the type of the plate I want to save
     * @param type $filename the filename to do the arrays
     * @return array return an array with the menus with the specified category
     */
function dayMenu($filename, $category_type){
    $day_menu_array = array();
    $file = fopen($filename, 'r');

    while ($menuInfo = fscanf($file, "%s\n", $line)){
        list($id, $category, $name) = \explode(';', $line);
        if($category == $category_type){
        $course_array  = [$name];
        array_push($day_menu_array,$course_array );
        }
    }
    fclose($file);
    return  $day_menu_array ;
}
