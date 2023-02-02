<?php
require_once "lib/Debug.php";
use proven\lib\debug;
debug\Debug::iniset();

require_once "model/persist/WarehouseProductDao.php";
// require_once "model/WarehouseProduct.php";
use proven\store\model\persist\WarehouseProductDao;

$dao = new WarehouseProductDao();
//debug\Debug::display($dao->selectAll());
//debug\Debug::display($dao->selectWhere('product_id', '2'));
debug\Debug::display($dao->selectWhere('warehouse_id', '2'));


