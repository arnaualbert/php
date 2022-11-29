<?php
require_once 'lib/ViewLoader.php';
require_once 'model/Model.php';
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
            case 'product/form':
                $this->doProductForm();
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
            case 'product/add':
                $this->doAddProduct();
                break;
            default:
                break;
        }
    }

    private function doHomePage(){
        $this->view->show('home.php');
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

    private function doAddProduct(){
        //to do
        $data['message'] = 'add product not implemented yet';
        $this->view->show('todo.php',$data);
    }
}