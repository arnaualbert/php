<?php

require_once 'lib/ViewLoader.php';
require_once 'model/Model.php';
require_once 'lib/UserFormValidation.php';

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
                //prueba
            // case 'user/addUser':
            //     $this->addUser();
            //     break;
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
            case 'product/add':
                $this->doAddProduct();
                break;
            case 'user/addUser':
                $this->addUser();
                break;
            default:
                break;
        }
    }

    private function doHomePage(){
        $this->view->show('home.php');
    }

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

    private function doUserForm(){
        $user = UserFormValidation::getData();
        $data['user'] = $user;
        $data['action'] = $this->action;
        $this->view->show('userform.php',$data);
    }

    public function addUser(){
        $user = UserFormValidation::getData();
        $result = null;
        if (is_null($user)) {
            $result = "Error reading user";
        } else {
            $numAffected = $this->model->addUser($user);
            if ($numAffected>0) {
                $result = "user successfully added";
            } else {
                $result = "Error adding user";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("userform.php", $data);


        // if($data['item']==true){
        //     $this->model->doAddUser($data['item']);
        // }
    }


    private function doAddProduct(){
        //to do
        $data['message'] = 'add product not implemented yet';
        $this->view->show('todo.php',$data);
    }

    // private function doAddUser($id,$username,$password,$role,$name,$surname){
    //     $usuario = new User($id,$username,$password,$role,$name,$surname);
    //     $this->userDao->insert($usuario);
    // }
}