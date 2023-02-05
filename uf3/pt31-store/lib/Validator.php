<?php
namespace proven\lib\views;
require_once 'model/User.php';
use proven\store\model\User;
//category
require_once 'model/Category.php';
use proven\store\model\Category;
//product
require_once 'model/Product.php';
use proven\store\model\Product;
//Warehouse
require_once 'model/Warehouse.php';
use proven\store\model\Warehouse;

class Validator {

    public static function validateUser(int $method) {
        $obj = null;
        $id = static::cleanAndValidate($method, 'id', FILTER_VALIDATE_INT); 
        $username = static::cleanAndValidate($method, 'username'); 
        $password = static::cleanAndValidate($method, 'password'); 
        $firstname = static::cleanAndValidate($method, 'firstname'); 
        $lastname = static::cleanAndValidate($method, 'lastname'); 
        $role = static::cleanAndValidate($method, 'role'); 
        $obj = new User($id, $username, $password, $firstname, $lastname, $role);
        return $obj;        
    }
    //echo por arnau
    /**
     * validate the category
     * @param int $method
     */
    public static function validateCategory(int $method) {
        $obj = null;
        $id = static::cleanAndValidate($method, 'id', FILTER_VALIDATE_INT); 
        $code = static::cleanAndValidate($method, 'code'); 
        $description = static::cleanAndValidate($method, 'description');  
        $obj = new Category($id, $code, $description);
        return $obj;        
    }
    /**
     * validate the product
     * @param int $method
     */
    public static function validateProduct(int $method) {
        $obj = null;
        $id = static::cleanAndValidate($method, 'id', FILTER_VALIDATE_INT); 
        $code = static::cleanAndValidate($method, 'code'); 
        $description = static::cleanAndValidate($method, 'description');  
        $price = static::cleanAndValidate($method, 'price');  
        $category_id = static::cleanAndValidate($method, 'category_id',FILTER_VALIDATE_INT);  
        $obj = new Product($id, $code, $description,$price,$category_id);
        return $obj;        
    }
    /**
     * validate warehouse
     * @param int $method
     */
    public static function validateWarehouse(int $method) {
        $obj = null;
        $id = static::cleanAndValidate($method, 'id', FILTER_VALIDATE_INT); 
        $code = static::cleanAndValidate($method, 'code'); 
        $address = static::cleanAndValidate($method, 'address');  
        $obj = new Warehouse($id, $code, $address);
        return $obj;        
    }


    public static function cleanAndValidate(int $method, string $variable, int $filter=\FILTER_SANITIZE_FULL_SPECIAL_CHARS) {
        $clean = null;
        if (\filter_has_var($method, $variable)) {
            $clean = \filter_input($method, $variable, $filter); 
        }
        return $clean;
    }
    
}