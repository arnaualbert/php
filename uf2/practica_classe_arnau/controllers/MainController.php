<?php

require_once 'lib/ViewLoader.php';
require_once 'model/Model.php';
require_once 'lib/UserFormValidation.php';
require_once 'lib/LoginFormValidation.php';
require_once 'lib/ProductFormValidation.php';

class MainController{
    
    private ViewLoader $view;
    private Model $model;   
    private string $action;
    
    public function __construct(){
        $this->view = new ViewLoader();
        $this->model= new Model();
    }

    public function processRequest(){
        // echo "Processing request";
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
            case 'product/listAll':
                $this->doListAllProducts();
                break;
            case 'user/listAll':
                $this->doListAllUsers();
                break;
            case 'product/form':
                $this->doProductForm();
                break;
            case 'user/form':
                $this->doUserForm();
                break;
            case 'logout':
                $this->doLogout();
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
            case 'product/addProduct':
                $this->addProduct();
                break;
            case 'user/addUser':
                $this->addUser();
                break;
            case 'user/login':
                $this->doLogin();
                break;
            case 'findProduct':
                $this->findProduct();
                break;
            case 'findUser':
                $this->findUser();
                break;
            case 'removeProduct':
                $this->removeProduct();
                break;
            case 'modifyProduct':
                $this->modifyProduct();
                break;
            case 'removeUser':
                $this->removeUser();
                break;
            case 'modifyUser':
                $this->modifyUser();
                break;
            case 'logoutyes':
                $this->logoutyes();
                break;
            default:
                break;
        }
    }
    /**
     * this function goes to the home.php
     */
    private function doHomePage(){
        $this->view->show('home.php');
    }
    /**
     * this functios delete the sessions and redirects you to the index
     */
    public function logoutyes(){  //user valid
            session_destroy();
            header("Location: index.php");
    }

    /**
     * this function search all the users and sends the data to the view
     */
    private function doListAllUsers(){
        $userList = $this->model->searchAllUsers();
        if(!is_null($userList)){
            $data['userList'] = $userList;
            $this->view->show('list-users.php',$data);
        }else{
            $data['message'] = 'null data ';
            $this->view->show('list-users.php',$data);
        }
    }

    /**
     * this function search all the products and sends the data to the view
     */
    private function doListAllProducts(){
        $productList = $this->model->searchAllProducts();
        if(!is_null($productList)){
            $data['prodList'] = $productList;
            $this->view->show('listproducts.php',$data);
        }else{
            $data['message'] = 'null data ';
            $this->view->show('listproducts.php',$data);
        }
    }

    /**
     * diplays a page with a product form
     */
    private function doProductForm(){
        $this->view->show('productform.php');
    }
    /**
     * diplays a page with a logout form
     */
    private function doLogout(){
        $this->view->show('logout.php');
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
     * displays the userform
     */
    private function doUserForm(){
        $this->view->show('userform.php');
    }

    /**
     * this function get the data from the form and add the user
     */
    public function addUser(){
        /**get data from the form */
        $user = UserFormValidation::getData();
        $user_id = $user->getId();
        $user_name = $user->getUsername();
        $findname = $this->model->searchUserByname($user_name);
        $encontrado = $this->model->searchUsertById($user_id);
        $result = null;
        if (is_null($user)) {
            $result = "Error reading user";
        } else {
            /**only alow to put staff and admin */
            if ($user->getRole()=="staff"||$user->getRole()=="admin") {
                /**no repetir */
                if((is_null($encontrado)) && (is_null($findname))){
                    /**add the user */
                    $numAffected = $this->model->addUser($user);
                    if($numAffected>0){
                        $result = "user successfully added";
                    }
                }else{
                    $result = "no repetir id ni nombre";
                }
            } else {
                $result = "Error adding user only staff and admin are possible or can't repead id";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("userform.php", $data);
    }

    /**
     * this function get the data from the form and add a product
     */
    private function addProduct(){
                /**get data from the form */
        $product = ProductFormValidation::getData();
        $product_id = $product->getId();
        $encontrado = $this->model->searchProductById($product_id);
        $result = null;
        if (is_null($product)) {
            $result = "Error reading product";
        } else {
            /**get the product */
            if(is_null($encontrado)){
            $numAffected = $this->model->addProduct($product);
            if ($numAffected>0) {
                $result = "product successfully added";
            }
        } 
            else {
                $result = "Error adding product";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        // $this->view->show('todo.php',$data);
        $this->view->show('productform.php',$data);
    }


    /**
     * this function finds the product by the id
     */
    public function findProduct() {
        $product = ProductFormValidation::getData();
        $result = null;
        if (is_null($product)) {
            $result = "Error reading product";
        } else {
            /**search the product by the id */
            $productFound = $this->model->searchProductById($product->getId());
            if (!is_null($productFound)) {
                //pass data to template.
                $data['product'] = $productFound;
                $data['action'] = "change";
            } else {
                $result = "Item not found";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("productform.php", $data);         
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
            $userFound = $this->model->searchUsertById($user->getId());
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
        $this->view->show("userform.php", $data);         
    }


    /**
     * remove the product
     */
    public function removeProduct() {
        /**gets the data from the form */
        $product = ProductFormValidation::getData();
        $result = null;
        if (is_null($product)) {
            $result = "Error reading product";
        } else {
            /**remove the product */
            $numAffected = $this->model->removeProduct($product);
            if ($numAffected>0) {
                $result = "product successfully removed";
            } else {
                $result = "Error removing product";
            }
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("productform.php", $data);          
    }

    /**
     * modify the product
     */
    public function modifyProduct() {
        /**gets the data from the form */
        $product = ProductFormValidation::getData();
        $result = null;
        if (is_null($product)) {
            $result = "Error reading product";
        } else {
            $numAffected = $this->model->modifyProduct($product);
            if ($numAffected>0) {
                $result = "product successfully modified";
            } else {
                $result = "Error modifying product";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("productform.php", $data);        
    }

    /**
     * this function remove the user
     */
    public function removeUser() {
        /**gets the data from the form */
        $user = UserFormValidation::getData();
        $result = null;
        if (is_null($user)) {
            $result = "Error reading user";
        } else {
            $numAffected = $this->model->removeUser($user);
            if ($numAffected>0) {
                $result = "user successfully removed";
            } else {
                $result = "Error removing user";
            }
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("userform.php", $data);          
    }
    /**
     * this function modify the user
     */
    public function modifyUser() {
                /**gets the data from the form */
        $user = UserFormValidation::getData();
        $result = null;
        if (is_null($user)) {
            $result = "Error reading user";
        } else {
            if ($user->getRole()=="staff"||$user->getRole()=="admin") {
                $numAffected = $this->model->modifyUser($user);
                if ($numAffected>0) {
                    $result = "user successfully modified";}
            } else {
                $result = "Error modifying user, only staff or admin allowed";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("userform.php", $data);        
    }
}