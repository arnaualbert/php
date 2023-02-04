<?php
require_once "lib/Debug.php";
use proven\lib\debug;
debug\Debug::iniset();

require_once "model/persist/CategoryDao.php";
require_once "model/Category.php";

use proven\store\model\persist\CategoryDao;
use proven\store\model\Category;

$dao = new CategoryDao();
echo 'select all categories';
echo "<br>";
debug\Debug::display($dao->selectAll());
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
echo 'select by id';
echo "<br>";
debug\Debug::objectprint($dao->select(new Category(1,'catcode01','catdesc01')));
echo "<br>";
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
echo 'select where';
echo "<br>";
debug\Debug::display($dao->selectWhere("code","catcode01"));
debug\Debug::display($dao->selectWhere("code","catcode09"));
debug\Debug::display($dao->selectWhere("code","catcode02"));
echo "<br>";
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
echo 'Insert';
echo "<br>";
debug\Debug::display($dao->selectAll());
echo "<br>";
var_dump($dao->insert(new Category(20,"catcode09", "desc09")));
echo "<br>";
debug\Debug::display($dao->selectAll());
echo "<br>";
var_dump($dao->delete(new Category(21)));
echo "<br>";
debug\Debug::display($dao->selectAll());