<?php
require_once 'persist/UserPersistFileDao.php';
require_once 'persist/ProductsPersistFileDao.php';
class Model{


    private string $user_file;

    private string $products_file;

    private string $delimiter;

    private UserPersistFileDao $userDao;

    private ProductsPersistFileDao $productDao;    

    function __construct(){
        $this->user_file = "files/users.txt";
        $this->products_file = "files/products.txt";
        $this->delimiter = ";";
        $this->userDao = new UserPersistFileDao($this->user_file,$this->delimiter);
        $this->productDao = new ProductsPersistFileDao($this->products_file,$this->delimiter);
    }

    public function addUser(User $user){
        $numAffected = 0;
        if ($user !== null) {
            $numAffected = $this->userDao->insert($user);           
        }
        return $numAffected;
    }

    public function addProduct(Product $product){
        $numAffected = 0;
        if ($product !== null) {
            $numAffected = $this->productDao->insert($product);           
        }
        return $numAffected;
    }
    /**
     * checks if the username and password are correct
     * @param $array_login is the key (username) value (password)
     * @return array if the key and value are correct is true
     */
        public function validate(array $array_login): ?array{
            $alltheusers =  $this->userDao->selectAll();
            foreach($alltheusers as $elem){
                $check = array();
                $username = $elem->getUsername();
                $password = $elem->getPassword();
                $rol = $elem->getRole();
                array_push($check,$username);
                array_push($check,$password);
                if($check == $array_login){
                    $existe = array($username,$rol);
                    break;
                }else{
                    $existe = array();
                }
                $check = array();
            }
            return $existe;
        }
    
    /**
     * search all the products in the porducts list or an empty array if not found or an error
     */
    public function searchAllProducts(): ?array{
        $data = null;
        $data = $this->productDao->selectAll();
        return $data;
    }

    /**
     * search all users from data source  or an empty array if not found or an error
     */
    public function searchAllUsers(): ?array{
        $data = null;
        $data = $this->userDao->selectAll();
        return $data;
    }


    /**search the product by id returns and object of product
    * @param $id is int id of the product
    */
    public function searchProductById(int $id): ?Product {  //nullable return.
        $item = $this->productDao->select(new Product($id, null, null, null));
        return $item;
    }

    /**search the product by id returns and object of user*/
    public function searchUsertById(int $id): ?User {  //nullable return.
        $item = $this->userDao->select(new User($id, null, null,null, null, null));
        return $item;
    }
    


    ///pruebas

    /**search the product by id returns and object of product
    * @param $id is int id of the product
    */

    /**search the product by id returns and object of user*/
    public function searchUserByname(string $username): ?User {  //nullable return.
        $item = $this->userDao->selectWhereUsername($username);
        return $item;
    }
    


    ////fin pruebas

    /**delete the product returns the int of objects deleted*/
    public function removeProduct(Product $product): int {
        $numAffected = 0;
        if ($product != null) {
            $numAffected = $this->productDao->delete($product);
        }
        return $numAffected;
    }  

    /**modify the product returns the int of objects modified*/
    public function modifyProduct(Product $product): int {
        $numAffected = 0;
        if ($product != null) {
            $numAffected = $this->productDao->update($product);
        }
        return $numAffected;
    }
    

    /**delete the user returns the int of objects deleted*/
    public function removeUser(User $user): int {
        $numAffected = 0;
        if ($user != null) {
            $numAffected = $this->userDao->delete($user);
        }
        return $numAffected;
    }  

    /**modify the user returns the int of objects modified*/
    public function modifyUser(User $user): int {
        $numAffected = 0;
        if ($user != null) {
            $numAffected = $this->userDao->update($user);
        }
        return $numAffected;
    }




}