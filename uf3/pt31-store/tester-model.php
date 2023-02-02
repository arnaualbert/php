<?php
require_once "lib/Debug.php";
use proven\lib\debug;
debug\Debug::iniset();

require_once "model/Product.php";
require_once "model/Warehouse.php";
require_once "model/StoreModel.php";

use proven\store\model\StoreModel;
use proven\store\model\Product;
use proven\store\model\Warehouse;

$model = new StoreModel();

// $s = $model->findcodeandproduct(1);
// $idwarehouse = [];
// $idproducts = [];
// $codes = [];
// $idw = $s[0]->getWarehouseid();
// array_push($idwarehouse,$idw);
// foreach($s as $p){
//     $idp = $p->getProductid();
//     array_push($idproducts,$idp);
// }
// // var_dump($idproducts);
// // var_dump($idwarehouse);
// foreach($idproducts as $idproduct){
//     $s = $model->findProductById($idproduct);
//     $code = $s->getCode();
//     array_push($codes,$code);
// }
// var_dump($codes);


var_dump($model->doeverything(1));

// debug\Debug::display($model->findcodeandproduct(1));



// debug\Debug::display($model->findWarehouseProductByProduct_id(1));
// debug\Debug::display($model->findWarehouseProductByWarehouse_id(1));




// debug\Debug::printr($model->findStocksByProduct(new Product(1)));
// debug\Debug::printr($model->findStocksByWarehouse(new Warehouse(1)));
