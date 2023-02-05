<?php

namespace proven\store\controllers;

require_once 'lib/ViewLoader.php';
require_once 'lib/Validator.php';

require_once 'model/StoreModel.php';
require_once 'model/User.php';

use proven\store\model\StoreModel as Model;
use proven\lib\ViewLoader as View;

use proven\lib\views\Validator as Validator;

/**
 * Main controller
 * @author ProvenSoft
 */
class MainController {
    /**
     * @var ViewLoader
     */
    private $view;
    /**
     * @var Model 
     */
    private $model;
    /**
     * @var string  
     */
    private $action;
    /**
     * @var string  
     */
    private $requestMethod;

    public function __construct() {
        //instantiate the view loader.
        $this->view = new View();
        //instantiate the model.
        $this->model = new Model();
    }

    /* ============== HTTP REQUEST FUNCTIONS ============== */

    /**
     * processes requests from client, regarding action command.
     */
    public function processRequest() {
        $this->action = "";
        //retrieve action command requested by client.
        if (\filter_has_var(\INPUT_POST, 'action')) {
            $this->action = \filter_input(\INPUT_POST, 'action');
        } else {
            if (\filter_has_var(\INPUT_GET, 'action')) {
                $this->action = \filter_input(\INPUT_GET, 'action');
            } else {
                $this->action = "home";
            }
        }
        //retrieve request method.
        if (\filter_has_var(\INPUT_SERVER, 'REQUEST_METHOD')) {
            $this->requestMethod = \strtolower(\filter_input(\INPUT_SERVER, 'REQUEST_METHOD'));
        }
        //process action according to request method.
        switch ($this->requestMethod) {
            case 'get':
                $this->doGet();
                break;
            case 'post':
                $this->doPost();
                break;
            default:
                $this->handleError();
                break;
        }
    }

    /**
     * processes get requests from client.
     */
    private function doGet() {
        //process action.
        switch ($this->action) {
            case 'home':
                $this->doHomePage();
                break;
            case 'user':
                $this->doUserMng();
                break;
            case 'user/edit':
                $this->doUserEditForm("edit");
                break;
            case 'category':
                $this->doCategoryMng();
                break;
            //echo por arnau
            case 'category/edit':
                $this->doCategoryEditForm("edit");
                break;
            //
            case 'product':
                $this->doProductMng();
                break;
            case 'product/edit':
                $this->doProductEditForm("edit");
                break;
            case 'warehouse':
                $this->doWareHouseMng();
                break;
            case 'warehouse/edit':
                $this->doWarehouseEditForm("edit");
                break;
            case 'loginform':
                $this->doLoginForm();
                break;
            case 'stock':
                $this->doWarehouseProductsMng();
                break;
            case 'stock/warehouseid':
                $this->doListWarehouseProductsByIdWarehouse_id();
                break;
            case 'stock/productid':
                $this->doListWarehouseProductsByProduct_id();
                break;
            case 'logout':
                $this->doLogout();
                break;
            default:  //processing default action.
                $this->handleError();
                break;
        }
    }

    /**
     * processes post requests from client.
     */
    private function doPost() {
        //process action.
        switch ($this->action) {
            case 'user/role':
                $this->doListUsersByRole();
                break;
            case 'user/form':
                $this->doUserEditForm("add");
                break;
            case 'user/add': 
                $this->doUserAdd();
                break;
            case 'user/modify': 
                $this->doUserModify();
                break;
            case 'user/remove': 
                $this->doUserRemove();
                break;
            // category
            case 'category/form':
                $this->doCategoryEditForm("add");
                break;
            case 'category/add':
                $this->doCategoryAdd();
                break;
            case 'category/modify':
                $this->doCategoryModify();
                break;
            case 'category/remove':
                $this->doCategoryRemove();
            // product
            case 'product/categoryid':
                $this->doListProductsByCategoryId();
                break;
            case 'product/form':
                $this->doProductEditForm("add");
                break;
            case 'product/add':
                $this->doProductAdd();
                break;
            case 'product/modify':
                $this->doProductModify();
                break;
            case 'product/remove': 
                $this->doProductRemove();
                break;
            case 'warehouse/modify':
                $this->doWarehouseModify();
                break;
            case 'login':
                $this->doLogin();
                break;
            // case 'stock/warehouseid':
            //     $this->doListWarehouseProductsByIdWarehouse_id();
            //     break;
            default:  //processing default action.
                $this->doHomePage();
                break;
        }
    }

    /* ============== NAVIGATION CONTROL METHODS ============== */

    /**
     * handles errors.
     */
    public function handleError() {
        $this->view->show("message.php", ['message' => 'Something went wrong!']);
    }

    /**
     * displays home page content.
     */
    public function doHomePage() {
        $this->view->show("home.php", []);
    }

    /* ============== SESSION CONTROL METHODS ============== */

    /**
     * displays login form page.
     */
    public function doLoginForm() {
        $this->view->show("login/loginform.php", []);  //initial prototype version;
    }

    /* ============== USER MANAGEMENT CONTROL METHODS ============== */

    /**
     * displays user management page.
     */
    public function doUserMng() {
        //get all users.
        $result = $this->model->findAllUsers();
        //pass list to view and show.
        $this->view->show("user/usermanage.php", ['list' => $result]);        
        //$this->view->show("user/user.php", [])  //initial prototype version;
    }
    /**
     * list the user by ther role
     */
    public function doListUsersByRole() {
        //get role sent from client to search.
        $roletoSearch = \filter_input(INPUT_POST, "search");
        if ($roletoSearch !== false) {
            //get users with that role.
            $result = $this->model->findUsersByRole($roletoSearch);
            //pass list to view and show.
            $this->view->show("user/usermanage.php", ['list' => $result]);   
        }  else {
            //pass information message to view and show.
            $this->view->show("user/usermanage.php", ['message' => "No data found"]);   
        }
    }
    /**
     * display de user edit form with the mode that is passed
     */
    public function doUserEditForm(string $mode) {
        $data = array();
        if ($mode != 'user/add') {
            //fetch data for selected user
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (($id !== false) && (!is_null($id))) {
                $user = $this->model->findUserById($id);
                if (!is_null($user)) {
                    $data['user'] = $user;
                }
             }
             $data['mode'] = $mode;
        }
        $this->view->show("user/userdetail.php", $data);  
    }
    /**
     * add the user to the database
     */
    public function doUserAdd() {
        //get user data from form and validate
        $user = Validator::validateUser(INPUT_POST);
        //add user to database
        if (!is_null($user)) {
            $result = $this->model->addUser($user);
            $message = ($result > 0) ? "Successfully added":"Error adding";
            $this->view->show("user/userdetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("user/userdetail.php", ['mode' => 'add', 'message' => $message]);
        }
    }
    /**
     * modify the user to the 
     */
    public function doUserModify() {
        //get user data from form and validate
        $user = Validator::validateUser(INPUT_POST);
        //add user to database
        if (!is_null($user)) {
            $result = $this->model->modifyUser($user);
            $message = ($result > 0) ? "Successfully modified":"Error modifying";
            $this->view->show("user/userdetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("user/userdetail.php", ['mode' => 'add', 'message' => $message]);
        }
    }    

    public function doUserRemove() {
        //get user data from form and validate
        $user = Validator::validateUser(INPUT_POST);
        //add user to database
        if (!is_null($user)) {
            $result = $this->model->removeUser($user);
            $message = ($result > 0) ? "Successfully removed":"Error removing";
            $this->view->show("user/userdetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("user/userdetail.php", ['mode' => 'add', 'message' => $message]);
        }
    } 
    
    /* ============== CATEGORY MANAGEMENT CONTROL METHODS ============== */

    /**
     * displays category management page.
     */
    public function doCategoryMng() {
        //get all the categories.
        $result = $this->model->findAllCategories();
        // show the list of categories 
        $this->view->show("category/categorymanage.php",['list' => $result]);
    }
    //echo por arnau
    /**
     * displays category edit page.
     */
    public function doCategoryEditForm(string $mode) {
        $data = array();
        if ($mode != 'category/add') {
            //fetch data for selected category
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (($id !== false) && (!is_null($id))) {
                $category = $this->model->findCategoryById($id);
                if (!is_null($category)) {
                    $data['category'] = $category;
                }
             }
             $data['mode'] = $mode;
        }
        $this->view->show("category/categorydetail.php", $data);  //initial prototype version.
    }
    /**
     * add a new category to the database.
     */
    public function doCategoryAdd() {
        //get category data from form and validate
        $category = Validator::validateCategory(INPUT_POST);
        //add category to database
        if (!is_null($category)) {
            $result = $this->model->addCategory($category);
            $message = ($result > 0) ? "Successfully added":"Error adding";
            $this->view->show("category/categorydetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("category/categorydetail.php", ['mode' => 'add', 'message' => $message]);
        }
    }
    /**
     * modify a category in the database.
     */
    public function doCategoryModify() {
        //get category data from form and validate
        $category = Validator::validateCategory(INPUT_POST);
        //modify the category to database
        if (!is_null($category)) {
            $result = $this->model->modifyCategory($category);
            $message = ($result > 0) ? "Successfully modified":"Error modifying";
            $this->view->show("category/categorydetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("category/categorydetail.php", ['mode' => 'add', 'message' => $message]);
        }
    }    
    /**
     * remove a category from the database.
     */
    public function doCategoryRemove() {
        //get category data from form and validate
        $category = Validator::validateCategory(INPUT_POST);
        //remove the category from the database
        if (!is_null($category)) {
            $result = $this->model->removeCategory($category);
            $message = ($result > 0) ? "Successfully removed":"Error removing";
            $this->view->show("category/categorymanage.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("category/categorymanage.php", ['mode' => 'add', 'message' => $message]);
        }
    } 

    /* ============== PRODUCT MANAGEMENT CONTROL METHODS ============== */

    /**
     * displays product management page.
     */
    public function doProductMng() {
        $result = $this->model->findAllProducts();
        $this->view->show("product/productmanage.php",['list' => $result]);
    }

    /**
     * list all the products by their category id.
     */
    public function doListProductsByCategoryId() {
        //get the id to search for
        $idtoSearch = \filter_input(INPUT_POST, "search");
        if ($idtoSearch !== false) {
            //get the products searched by the category id
            // $result = $this->model->findProductByCategoryId($idtoSearch);
            $result = $this->model->findProductByCategoryCode($idtoSearch);
            //pass list to view and show.
            $this->view->show("product/productmanage.php", ['list' => $result]);   
        }  else {
            //pass information message to view and show.
            $this->view->show("product/productmanage.php", ['message' => "No data found"]);   
        }
    }
    /**
     * show the product edit form
     */
    public function doProductEditForm(string $mode) {
        $data = array();
        if ($mode != 'product/add') {
            //search the product by the id
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (($id !== false) && (!is_null($id))) {
                $product = $this->model->findProductById($id);
                if (!is_null($product)) {
                    $data['product'] = $product;
                }
             }
             $data['mode'] = $mode;
        }
        $this->view->show("product/productdetail.php", $data);  
    }
    /**
     *  add a new product to the database
     */
    public function doProductAdd() {
        //get product data from form and validate
        $product = Validator::validateProduct(INPUT_POST);
        //add product to database
        if (!is_null($product)) {
            $result = $this->model->addProduct($product);
            $message = ($result > 0) ? "Successfully added":"Error adding";
            $this->view->show("product/productdetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("product/productdetail.php", ['mode' => 'add', 'message' => $message]);
        }
    }

    public function doProductModify() {
        //get product data from form and validate
        $product = Validator::validateProduct(INPUT_POST);
        //modify product to database
        if (!is_null($product)) {
            $result = $this->model->modifyProducts($product);
            $message = ($result > 0) ? "Successfully modified":"Error modifying";
            $this->view->show("product/productdetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("product/productdetail.php", ['mode' => 'add', 'message' => $message]);
        }
    }    
    /**
     * remove product from the database
     */
    public function doProductRemove() {
        //get category data from form and validate
        $product = Validator::validateProduct(INPUT_POST);
        //remove product to database
        if (!is_null($product)) {
            $result = $this->model->removeProduct($product);
            $list = $this->model->findAllProducts();
            $message = ($result > 0) ? "Successfully removed":"Error removing";
            $this->view->show("product/productmanage.php", ['mode' => 'add', 'message' => $message,'list' => $list]);
        } else {
            $list = $this->model->findAllProducts();
            $message = "Invalid data";
            $this->view->show("product/productmanage.php", ['mode' => 'add', 'message' => $message,'list' => $list]);
        }
    } 

        /* ============== WAREHOUSE MANAGEMENT CONTROL METHODS ============== */

    /**
     * displays warehouse management page.
     */
    public function doWarehouseMng() {
        $result = $this->model->findAllWarehouse();
        $this->view->show("warehouse/warehousemanage.php",['list' => $result]);
    }
    /**
     * show the warehouse edit form
     */
    public function doWarehouseEditForm(string $mode) {
        $data = array();
        if ($mode != 'warehouse/add') {
            //fetch data for selected category
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (($id !== false) && (!is_null($id))) {
                $warehouse = $this->model->findWarehouseById($id);
                if (!is_null($warehouse)) {
                    $data['warehouse'] = $warehouse;
                }
             }
             $data['mode'] = $mode;
        }
        $this->view->show("warehouse/warehousedetail.php", $data); 
    }
    /**
     * modify the warehouse 
     */
    public function doWarehouseModify() {
        //get warehouse data from form and validate
        $warehouse = Validator::validateWarehouse(INPUT_POST);
        //modify warehouse to database
        if (!is_null($warehouse)) {
            $result = $this->model->modifyWarehouse($warehouse);
            $message = ($result > 0) ? "Successfully modified":"Error modifying";
            $this->view->show("warehouse/warehousedetail.php", ['mode' => 'add', 'message' => $message]);
        } else {
            $message = "Invalid data";
            $this->view->show("warehouse/warehousedetail.php", ['mode' => 'add', 'message' => $message]);
        }
    } 

    /* ============== WAREHOUSEPRODUCTS MANAGEMENT CONTROL METHODS ============== */

    /**
     * displays warehouse products management page.
     */
    public function doWarehouseProductsMng(){
        $result = $this->model->findAllWarehouseProduct();
        $this->view->show("warehouseproducts/warehouseproductmanagement.php",['list'=>$result]);
    }

    /**
     * list all the warehouseproducts
     */
    public function doListWarehouseProductsByIdWarehouse_id(){
        // $idtoSearch = \filter_input(INPUT_POST, "search");
        $idtoSearch = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($idtoSearch !== false) {
            //get users with that role.
            $result = $this->model->findWarehouseProductByWarehouse_id($idtoSearch);
            //new (codes)
            $codes = $this->model->getproductscodes($idtoSearch);
            //warehouse info
            $warehouse = $this->model->findWarehouseById($idtoSearch);
            //pass list to view and show.
            $this->view->show("warehouseproducts/warehouseproductmanagement_warehouse.php", ['list' => $result,'codes' => $codes,'warehouse'=>$warehouse]);   
        }  else {
            //pass information message to view and show.
            $this->view->show("warehouseproducts/warehouseproductmanagement_warehouse.php", ['message' => "No data found"]);   
        }
    }
    /**
     * list all the warehouseproducts that have the
     */
    public function doListWarehouseProductsByProduct_id(){
        // $idtoSearch = \filter_input(INPUT_POST, "search");
        $idtoSearch = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($idtoSearch !== false) {
            //get users with that role.
            // $result = $this->model->findProductByCategoryId($idtoSearch);
            $result = $this->model->findWarehouseProductByProduct_id($idtoSearch);
            //new (codes)
            $codes = $this->model->getwarehousecodes($idtoSearch);
            // product info
            $product = $this->model->findProductById($idtoSearch);

            $warehouses = $this->model->findAllWarehouse();
            //pass list to view and show.
            $this->view->show("warehouseproducts/warehouseproductmanagement_products.php", ['list' => $result,'codes' => $codes,'product' => $product,'warehouses' => $warehouses]);   
        }  else {
            //pass information message to view and show.
            $this->view->show("warehouseproducts/warehouseproductmanagement_products.php", ['message' => "No data found"]);   
        }
    }

        /* ============== Login and logout ============== */

    /**
     * this function do the login
     * get the username and password from the login form
     */
    public function doLogin(){
        // get username and password from the login form
        $username = filter_input(INPUT_POST,'username');
        $password = filter_input(INPUT_POST,'password');
        // search for the user in the database 
        $u = $this->model->findUserByUsernamePassword($username,$password);
        // if the user is found create a session with the username and the role and redirect to the index page
        if(!is_null($u)){
            $_SESSION['userrole'] = $u->getRole();
            $_SESSION['username'] = $u->getFirstname();
            $_SESSION['userlname'] = $u->getLastname();
            header("Location: index.php");
        // if the user is not found display the login form with the error message
        }else{
            $this->view->show("login/loginform.php",['message' => 'Login incorrecre']);
        }
        
    }
    /**
     * this function do the logout
     * delete the session and redirect to the index page
     */
    public function doLogout(){  //user valid
        session_destroy();
        header("Location: index.php");
    }
}
