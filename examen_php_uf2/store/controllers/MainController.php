<?php
require_once 'lib/ViewLoader.php';
require_once 'model/Model.php';
require_once 'lib/LoginFormValidation.php';
require_once 'lib/UserFormValidation.php';
/**
 * Main controller for store application.
 *
 * @author ProvenSoft
 */
class MainController {
    /**
     * @var Model $model. The model to provide data services. 
     */
    private Model $model;
    /**
     * @var ViewLoader $view. The loader to forward views. 
     */
    private ViewLoader $view;
    /**
     * @var string $action. The action requested by client. 
     */
    private string $action;
    
    public function __construct() {
        //instantiate the view loader.
        $this->view = new ViewLoader();
        //instantiate the model.
        $this->model = new Model();
    }
    
    /**
     * processes requests made by client.
     */
    public function processRequest() {
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');          
        switch ($requestMethod) {
            case 'GET':
            case 'get':
                $this->processGet();
                break;
            case 'POST':
            case 'post':
                $this->processPost();
                break;
            default:
                $this->processError();
                break;
        }
    } 
    
    /**
     * processes get request made by client.
     */
    private function processGet() {
        $this->action = "";
        if (filter_has_var(INPUT_GET, 'action')) {
            $this->action = filter_input(INPUT_GET, 'action'); 
        }
        switch ($this->action) {
            case 'home':  //home page.
                $this->doHomePage();
                break;
            case 'login/form':
                $this->doLoginForm();
                break;
            case 'logout':
                $this->doLogout();
                break;
            case 'user/listAll':
                $this->doListUsers();
                break;
            case 'user/add':
                $this->doAddUserForm();
                break;
            case 'user/search':
                $this->doSearchUserForm();
                break;
            //TODO
            default:  //processing default action.
                // $this->doHomePage(); esto lo he borrao yo
                break;
        }
    }
    
    /**
     * processes post request made by client.
     */
    private function processPost() {
       $this->action = "";
       if (filter_has_var(INPUT_POST, 'action')) {
            $this->action = filter_input(INPUT_POST, 'action'); 
        }
        switch ($this->action) {
            case 'user/login':
                $this->doLogin();
                break;
            case 'user/addUser':
                $this->addUser();
                break;
            case 'findUser':
                $this->findUser();
                break;
            //TODO
            default:  //processing default action.
                //$this->doHomePage();
                break;
        }        
    }    
 
    /**
     * processes error.
     */
    private function processError() {
        trigger_error("Bad method", E_USER_NOTICE);
    } 

    /**
     * this function shows you the home page
     */
    private function doHomePage(){
        $this->view->show('home.php');
    }

    /**
     * this function shows you the add user page
     */
    private function doAddUserForm(){
        $this->view->show('user/user-form.php');
    }

        /**
     * this function shows you the add user page
     */
    private function doSearchUserForm(){
        $this->view->show('user/search-user.php');
    }




    /**
     * this function shows you de login form
     */
    private function doLoginform(){
        // $login = LoginFormValidation::getData();
        // $data['login'] = $login;
        $this->view->show('login-form.php');
    }




        /**
     * this function validates the login and creathe the session name and rol
     */
    public function doLogin(){
        $login = LoginFormValidation::getData();
        $data['login'] = $login;
        $username = $login[0];
        $valido = $this->model->validate($data['login']);
        $data['correcto'] = $valido;
        if(!empty($valido)){
            $age = $valido[1];
            $_SESSION["age"] = $age;
            $_SESSION['username'] = $username;
            header('Location: index.php');
            // $this->view->show('home.php',$data);
        }else{
            var_dump("no");
            $this->view->show('login-form.php',$data);
        }
    }



    //to do logout
    private function doLogout(){
        if (isset($_SESSION["username"])) {  //user valid
            session_destroy();
            header('Location: index.php');
        }
    }

   /**
     * this function get the data from the form and add the user (funciona)
     */
    // public function addUser(){
    //     /**get data from the form */
    //     $user = UserFormValidation::getData();
    //     if (is_null($user)) {
    //         $result = "Error reading user";
    //         $data['result'] = $result;
    //     } else {
    //         $numAffected = $this->model->addUser($user);
    //         if($numAffected>0){
    //             $result = "user successfully added";
    //             $data['result'] = $result;
    //         }
    //     }
    //     //show the template with the given data.
    //     $this->view->show("user/user-form.php", $data);
    // }



    /////


    public function addUser(){
        /**get data from the form */
        $user = UserFormValidation::getData();
        $name = $user->getUsername();
        $pass = $user->getPassword();
        $existe = $this->model->searchUserByUsernameAndPassword($name,$pass);
        if (is_null($user) || !is_null($existe)) {
            $result = "Error reading user";
            $data['result'] = $result;
        }else {
            $numAffected = $this->model->addUser($user);
            if($numAffected>0){
                $result = "user successfully added";
                $data['result'] = $result;
            }
        }
        //show the template with the given data.
        $this->view->show("user/user-form.php", $data);
    }

    /**
     * this function shows you de list page and pass the data from the model
     */
    private function doListUsers(){
        $userList = $this->model->searchAllUsers();
        if(!is_null($userList)){
            $data['userList'] = $userList;
            $this->view->show('user/list-users.php',$data);
        }else{
            $data['message'] = 'null data ';
            $this->view->show('user/list-users.php',$data);
        }
    }



    /**
     * this function finds the user by the id
     */
    public function findUser() {
        $user = UserFormValidation::getData();
        $result = null;
        if (is_null($user)) {
            $result = "Error reading user";
        } else {
            $userFound = $this->model->searchUserByUsername($user->getUsername());
            if (!is_null($userFound)) {
                //pass data to template.
                $data['user'] = $userFound;
                $data['action'] = "change";
            } else {
                $result = "user not found";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("user/search-user.php", $data);         
    }
}