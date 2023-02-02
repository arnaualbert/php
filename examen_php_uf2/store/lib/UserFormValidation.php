<?php
require_once 'model/User.php';

/**
 * Description of ItemFormValidation
 * Provides validation to get data from item form.
 * @author ProvenSoft
 */
class UserFormValidation {
    
    /**
     * validates and gets data from item form.
     * @return User the item with the given data or null if data is not present and valid.
     */
    public static function getData() {
        $userObj = null;
        $username = "";
        //retrieve item sent by client.
        if (filter_has_var(INPUT_POST, 'username')) {
            $username = filter_input(INPUT_POST, 'username'); 
        }
        $password = "";
        //retrieve item sent by client.
        if (filter_has_var(INPUT_POST, 'password')) {
            $password = filter_input(INPUT_POST, 'password'); 
        }
        $age = "";
        //retrieve id sent by client.
        if (filter_has_var(INPUT_POST, 'age')) {
            $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT); 
        }
        //if (!empty($id) && !empty($title) && !empty($content)) { 
            //they exists and they are not empty
            $userObj = new User($username,$password,$age);
        //}
        return $userObj;
    }
    
}
