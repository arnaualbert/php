<?php
require_once 'persist/UserPersistFileDao.php';
class Model{


    private string $user_file;

    private string $delimiter;

    private UserPersistFileDao $userDao;

    function __construct(){
        $this->user_file = "files/users.txt";
        $this->delimiter = ";";
        $this->userDao = new UserPersistFileDao($this->user_file,$this->delimiter);
    }



    /**
     * search all the products in the porducts list or an empty array if not found or an error
     */
    public function searchAllProducts(): ?array{
        //return array();
        return Null;
    }

    /**
     * search all users from data source  or an empty array if not found or an error
     */
    public function searchAllUsers(): ?array{
        $data = null;
        $data = $this->userDao->selectAll();
        return $data;
    }
}