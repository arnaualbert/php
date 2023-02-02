<?php

require_once "persist/SportsmanPersistFileDao.php";
require_once "persist/UserPersistFileDao.php";

class Model{

    private string $sportsman_file;

    private string $user_file;

    private string $delimiter;

    private SportsmanPersistFileDao $sportsmanDao;

    private UserPersistFileDao $userDao;

    function __construct(){
        $this->sportsman_file = "files/sportsman.txt";
        $this->user_file = "files/admin.txt";
        $this->delimiter = ";";
        $this->sportsmanDao = new SportsmanPersistFileDao($this->sportsman_file,$this->delimiter);
        $this->userDao = new UserPersistFileDao($this->user_file,$this->delimiter);
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
        $data = $this->sportsmanDao->selectAll();
        return $data;
    }
}