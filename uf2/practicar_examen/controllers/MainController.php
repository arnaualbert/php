<?php


require_once "lib/ViewLoader.php";
require_once "model/Model.php";
require_once 'lib/LoginFormValidation.php';
class MainController{

    private ViewLoader $view;
    private Model $model;   
    private string $action;

    public function __construct(){
        $this->view = new ViewLoader();
        $this->model = new Model();
    }

    public function processRequest(){
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
        switch($requestMethod){
            case 'GET':
            case 'get':
                $this->processGet();
                break;
            case 'POST':
            case 'post':
                $this->processPost();
                break;
            default:
                break;
        }
    }

    private function processGet(){
        $this->action = '';
        if (filter_has_var(INPUT_GET,'action')){
            $this->action = filter_input(INPUT_GET,'action');
        }
        switch ($this->action){
            case 'home':
                $this->doHomePage();
                break;
            case 'login/form':
                $this->doLoginform();
                break;
            case 'logout':
                $this->doLogout();
                break;
            case 'product/listAll':
                $this->doListAllSportsman();
                break;
            default:
                break;
        }
    }  
    
    private function processPost() {
        $this->action = '';
        if (filter_has_var(INPUT_POST,'action')){
            $this->action = filter_input(INPUT_POST,'action');
        }
        switch ($this->action){
            case 'user/login':
                $this->doLogin();
                break;
            case 'logoutyes':
                $this->logoutyes();
                break;
            default:
                break;
        }
    }

    private function doHomePage(){
        $this->view->show("home.php");
    }
    /**
     * this functions get the data from the form and sents to the view
     */
    private function doLoginform(){
        $login = LoginFormValidation::getData();
        $data['login'] = $login;
        $this->view->show('login.php',$data);
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
            $rol = $valido[1];
            $_SESSION["rol"] = $rol;
            $_SESSION['username'] = $username;
            header("Location: index.php");
        }else{
            var_dump("no");
            $this->view->show('login.php',$data);
        }
    }


    /**
     * diplays a page with a logout form
     */
    private function doLogout(){
        $this->view->show('logout.php');
    }

    /**
     * this functios delete the sessions and redirects you to the index
     */
    public function logoutyes(){  //user valid
        session_destroy();
        header("Location: index.php");
    }
    /**
     * this function search all the products and sends the data to the view
     */
    private function doListAllSportsman(){
        $productList = $this->model->searchAllProducts();
        if(!is_null($productList)){
            $data['SportsmanList'] = $productList;
            $this->view->show('sportsmanlist.php',$data);
        }else{
            $data['message'] = 'null data ';
            $this->view->show('sportsmanlist.php',$data);
        }
    }
}