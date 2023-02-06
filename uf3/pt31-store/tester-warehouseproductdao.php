<?php
require_once "lib/Debug.php";
use proven\lib\debug;
debug\Debug::iniset();

require_once "model/persist/WarehouseProductDao.php";
require_once "model/WarehouseProduct.php";
use proven\store\model\persist\WarehouseProductDao;

$dao = new WarehouseProductDao();


echo 'select all warehouseproducts';
echo '<br>';
debug\Debug::display($dao->selectAll());
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo '<br>';
echo 'select where product_id = 2';
echo '<br>';
debug\Debug::display($dao->selectWhere('product_id', '2'));
echo 'seect where warehouse_id = 2';
echo '<br>';
debug\Debug::display($dao->selectWhere('warehouse_id', '2'));


