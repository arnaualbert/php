<?php
require_once 'persist/UserPersistFileDao.php';
/**
 * Model for store application.
 *
 * @author ProvenSoft
 */
class Model {
    
    private string $user_file;

    private string $delimiter;

    private UserPersistFileDao $userDao;

    public function __construct() {
        $this->user_file = "files/users.txt";
        $this->delimiter = ";";
        $this->userDao = new UserPersistFileDao($this->user_file,$this->delimiter);
    }

    /** methods related to user **/
    
    /**
     * searches all users in data source.
     * @return array with all users found or null in case of error.
     */
    public function searchAllUsers(): ?array {
        $data = null;
        //TODO
        //made by arnau
        $data = $this->userDao->selectAll();        
        //
        return $data;
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
            $age = $elem->getAge();
            array_push($check,$username);
            array_push($check,$password);
            if($check == $array_login){
                $existe = array($username,$age);
                break;
            }else{
                $existe = array();
            }
            $check = array();
        }
        return $existe;
    }







    /**
     * adds a new user to data source preventing username duplicated and null
     * objects
     * @param User $user the user to add
     * @return int number of users added
     */
    public function addUser(User $user) : int {
        $result = 0;
        //TODO
        if ($user !== null) {
            $numAffected = $this->userDao->insert($user);           
        }
        return $result;
    }
    
    /** methods related to product **/
    
   /**
    * Search a User by username and password
    * @param string $username
    * @param string $password
    * @return User found or null if not exists
    */
    public function searchUserByUsernameAndPassword(
        string $username, string $password
    ): ?User  {
    $found = $this->userDao->selectWhereUsername($username);
    if (!is_null($found)) {
        if ($password !== $found->getPassword()) {
            $found = null;
        }
    }
    return $found;
    }
    
    /**
     * searches a user with the given username
     * @param string $username the username to search
     * @return User the user searched or null if not found
     */
    public function searchUserByUsername(string $username): ?User {
       //TODO
       $item = $this->userDao->selectWhereUsername($username);
       return $item;
    }
}