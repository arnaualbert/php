<?php
require_once "lib/Debug.php";
use proven\lib\debug;
debug\Debug::iniset();

require_once "model/persist/WarehouseDao.php";
require_once "model/Warehouse.php";

use proven\store\model\persist\WarehouseDao;
use proven\store\model\Warehouse;

$dao = new WarehouseDao();
echo 'select all Warehouse';
echo "<br>";
debug\Debug::display($dao->selectAll());
echo "<br>";
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
echo 'select by id';
echo "<br>";
debug\Debug::objectprint($dao->select(new Warehouse(1)));
echo "<br>";
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
echo 'select where address = address2';
echo "<br>";
debug\Debug::display($dao->selectWhere("address","address2" ));
echo "<br>";
echo 'select where Code = warhcode01';
echo "<br>";
debug\Debug::display($dao->selectWhere("code","warhcode01" ));
echo "<br>";
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
echo "insert";
var_dump($dao->insert(new Warehouse(0,"warhcode09", "address9")));
debug\Debug::display($dao->selectAll());
echo "<br>";
echo "update";
var_dump($dao->update(new Warehouse(6,"warhcode09", "address9")));
debug\Debug::display($dao->selectAll());
echo "<br>";
echo "delete";
var_dump($dao->delete(new Warehouse(6,"warhcode09", "address9")));
debug\Debug::display($dao->selectAll());
echo "<br>";
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";