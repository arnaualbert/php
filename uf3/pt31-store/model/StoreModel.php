<?php
namespace proven\store\model;

require_once 'model/persist/UserDao.php';
require_once 'model/User.php';
//categories
require_once 'model/persist/CategoryDao.php';
require_once 'model/Category.php';
//products
require_once 'model/persist/ProductDao.php';
require_once 'model/Product.php';
//warehouses
require_once 'model/persist/WarehouseDao.php';
require_once 'model/Warehouse.php';
//warehouseproducts
require_once 'model/persist/WarehouseProductDao.php';
require_once 'model/WarehouseProduct.php';

use proven\store\model\persist\UserDao;
use proven\store\model\persist\CategoryDao;
use proven\store\model\persist\ProductDao;
use proven\store\model\persist\WarehouseDao;
use proven\store\model\persist\WarehouseProductDao;
//use proven\store\model\User;

/**
 * Service class to provide data.
 * @author ProvenSoft
 */
class StoreModel {


    public function __construct() {
    }
   /**
    * find all users and return an array of users
    * @return array of users
    */
    public function findAllUsers(): array {
        $dbHelper = new UserDao();
        return $dbHelper->selectAll();
    }
    /**
     * fund all the users by role and return an array of users
     * @param $role is the role of the users
     * @return array of users
     */
    public function findUsersByRole(string $role): array {
        $dbHelper = new UserDao();
        return $dbHelper->selectWhere("role", $role);
    }
    /**
     * add a new user to the database
     * @param User $user to be added
     * @return int number of affected rows
     */
    public function addUser(User $user): int {
        $dbHelper = new UserDao();
        return $dbHelper->insert($user);
    }
    /**
     * modify a user in the database
     * @param User $user is the user to be modified
     * @return int the number of affected rows
     */
    public function modifyUser(User $user): int {
        $dbHelper = new UserDao();
        return $dbHelper->update($user);
    }
    /**
     * remove a user from the database
     * @param User $user is the user to be removed
     * @return int number of affected rows
     */
    public function removeUser(User $user): int {
        $dbHelper = new UserDao();
        return $dbHelper->delete($user);
    }
    /**
     * find a user by the id
     * @param int $id is the user id
     * @returns User the user with the given id or null if not found
     */
    public function findUserById(int $id): ?User {
        $dbHelper = new UserDao();
        $u = new User($id);
        return $dbHelper->select($u);
    }

    // categories functions
    /**
     * find all the categories and return an array of them
     * @return array of categories
     */
    public function findAllCategories(): array {
        $dbHelper = new CategoryDao();
        return $dbHelper->selectAll();
    }
    /**
     * add a category to the database
     * @param Category $category is the category to be added
     * @return int number of affected rows
     */
    public function addCategory(Category $category): int {
        $dbHelper = new CategoryDao();
        return $dbHelper->insert($category);
    }
    /**
     * modify the category in the database
     * @param Category $category is the category to be modified
     * @return int number of affected rows
     */
    public function modifyCategory(Category $category): int {
        $dbHelper = new CategoryDao();
        return $dbHelper->update($category);
    }
    /**
     * remove the category from the database
     * @param Category $category is the category to be removed
     * @return int number of removed rows
     */
    public function removeCategory(Category $category): int {
        $dbHelper = new CategoryDao();
        return $dbHelper->delete($category);
    }
    /**
     * find the category by id
     * @param int $id is the id of the category to be retrieved
     * @returns Category the category with the given id or null if not found
     */
    public function findCategoryById(int $id): ?Category {
        $dbHelper = new CategoryDao();
        $c = new Category($id);
        return $dbHelper->select($c);
    }
    /**
     * find the category by code
     * @param string $code is the code of the category to be retrieved
     * @returns array of the category with the given code or null if not found
     */
    public function findCategoryByCode(string $code): ?array{
        $dbHelper = new CategoryDao();
        return $dbHelper->selectWhere("code", $code);
    }
    // products functions
    /**
     * find all products in the database
     * @return array of products objects
     */
    public function findAllProducts(): array {
        $dbHelper = new ProductDao();
        return $dbHelper->selectAll();
    }
    /**
     * find a product by the category id
     * @param int $id is the id of the category
     * @return array of the product with the given id of category
     */
    public function findProductByCategoryId(string $id): array {
        $dbHelper = new ProductDao();
        return $dbHelper->selectWhere("category_id", $id);
    }
    /**
     * find a product by the product id
     * @param int $id is the id of the product
     * @returns Product the product with the given id or null if not found
     */
    public function findProductById(int $id): ?Product {
        $dbHelper = new ProductDao();
        $p = new Product($id);
        return $dbHelper->select($p);
    }
    /**
     * find product by categorycode 
     * @param string $code is the code of the category
     * @reurns array of products or null array if not found
     */
    public function findProductByCategoryCode(string $code): ?array {
        $dbHelper = new CategoryDao();
        $category = $this->findCategoryByCode($code);
        if(!empty($category)) {
        $categoryselected = $category[0];
        $id = $categoryselected->getId();
        return $this->findProductByCategoryId($id);}else{return $arr = [];}
    }
    /**
     * add a new product to the database
     * @param Product $product is the product to add
     * @returns int the number of rows affected
     */
    public function addProduct(Product $product): int {
        $dbHelper = new ProductDao();
        return $dbHelper->insert($product);
    }
    /**
     * modify an existing product in the database
     * @param Product $product is the product to modify
     * @returns int the number of rows affected
     */
    public function modifyProducts(Product $product): int {
        $dbHelper = new ProductDao();
        return $dbHelper->update($product);
    }
    /**
     * remove a product from the database
     * @param Product $product is the product to remove
     * @returns int the number of rows affected
     */
    public function removeProduct(Product $product): int {
        $dbHelper = new ProductDao();
        return $dbHelper->delete($product);
    }
    //// warehouse
    /**
     * find all thw warehouses
     * @return array of the warehouses found
     */
    public function findAllWarehouse(): array {
        $dbHelper = new WarehouseDao();
        return $dbHelper->selectAll();
    }
    /**
     * find the warehouse by id
     * @param int $id is the id of the warehouse to find
     * @returns Warehouse the warehouse found or null if not found
     */
    public function findWarehouseById(int $id): ?Warehouse {
        $dbHelper = new WarehouseDao();
        $c = new Warehouse($id);
        return $dbHelper->select($c);
    }
    /**
     * modify a warehouse
     * @param Warehouse $warehouse is the warehouse to modify
     * @returns int the number of rows affected
     */
    public function modifyWarehouse(Warehouse $warehouse): int {
        $dbHelper = new WarehouseDao();
        return $dbHelper->update($warehouse);
    }
    /**
     * find all the warehouses products
     * @return array of the products found
     */
    public function findAllWarehouseProduct(): array {
        $dbHelper = new WarehouseProductDao();
        return $dbHelper->selectAll();
    }
    /**
     * find the warehouse product by warehouse id
     * @param int $id is the id of the warehouse
     * @return array of the warehouse product found
     */
    public function findWarehouseProductByWarehouse_id(string $id): array{
        $dbHelper = new WarehouseProductDao();
        return $dbHelper->selectWhere("warehouse_id", $id);
    }
    //haciendo
    /**
     * find the code and product by the warehouse id
     * @param int $id is the id of the warehouse
     * @returns array or null
     */
    public function findcodeandproduct($id): ?array{
        $warehouse = new WarehouseDao();
        $product = new ProductDao();
        $warepro = new WarehouseProductDao();
        return $warepro->selectWhere("warehouse_id",$id);
    }

    /**
     * find the products code
     * @param int $id is the id of the warehouse
     * @returns array of code of the products
     */
    public function getproductscodes($id): ?array{
        $s = $this->findcodeandproduct($id);
        $idwarehouse = [];
        $idproducts = [];
        $codes = [];
        if(count($s)>0){
        $idw = $s[0]->getWarehouseid();
        array_push($idwarehouse,$idw);
        foreach($s as $p){
            $idp = $p->getProductid();
            array_push($idproducts,$idp);
        }
        foreach($idproducts as $idproduct){
            $s = $this->findProductById($idproduct);
            $code = $s->getCode();
            array_push($codes,$code);
        }}else{$codes = [];}
        return $codes;
    }

    /**
     * find the warehouse product by the product id
     * @param int $id is the id of the product
     * @returns array of warehouse product
     */
    public function findWarehouseProductByProduct_id(string $id): array{
        $dbHelper = new WarehouseProductDao();
        return $dbHelper->selectWhere("product_id", $id);
    }
    /**
     * find the code and warehouse product
     * @param string $id
     * @returs array of warehouse product
     */
    public function findcodeandwarehouse($id): ?array{
        $warehouse = new WarehouseDao();
        $product = new ProductDao();
        $warepro = new WarehouseProductDao();
        return $warepro->selectWhere("product_id",$id);
    }
    /**
     * finde the warehouse codes
     * @param int $id
     * @return array or code and warehouse
     */
    public function getwarehousecodes($id): array{
        $s = $this->findcodeandwarehouse($id);
        $idwarehouse = [];
        $idproducts = [];
        $codes = [];
        if(count($s)>0){
        $idw = $s[0]->getProductid();
        array_push($idwarehouse,$idw);
        foreach($s as $p){
            $idp = $p->getWarehouseid();
            array_push($idproducts,$idp);
        }
        foreach($idproducts as $idproduct){
            $s = $this->findWarehouseById($idproduct);
            $code = $s->getCode();
            array_push($codes,$code);
        }}else{$codes = [];}
        return $codes;
    }
    /**
     * remove the stock of a product
     * @param Product $product the product that we want to remove the stock of
     * @return int the number of rows affected
     */
    public function removestock(Product $product):int{
        $dbHelper = new WarehouseProductDao();
        return $dbHelper->deletestock($product);
    }
    /**
     * remove the stock of a product and then the product
     * @param Product $product the product that we want to remove the database
     * @return int the number of rows affected
     */
    public function finaldelete(Product $product):int{
        $sock_removed = $this->removeStock($product);
        $products_removed = $this->removeProduct($product);
        return $products_removed ;
    }
    /**
     * find the user by the user and password
     * @param $username is the username
     * @param $password is the password
     * @returns a user or null if not found
     */
    public function findUserByUsernamePassword(string $username,string $password): ?User{
        $dbHelper = new UserDao();
        return $dbHelper->selectUsernamePassword($username,$password);
    }
}

