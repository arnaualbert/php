<?php
require_once "lib/Debug.php";
use proven\lib\debug;
debug\Debug::iniset();

require_once "model/persist/UserDao.php";
require_once "model/User.php";

use proven\store\model\persist\UserDao;
use proven\store\model\User;

$dao = new UserDao();


echo 'select all Product';
echo "<br>";
debug\Debug::display($dao->selectAll());
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
echo "select where username = user05";
echo "<br>";
debug\Debug::display($dao->selectWhere("username", "user05"));
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
var_dump($dao->insert(new User(0, "peter01", "ppass01", "peter", "frampton", "staff")));
echo "<br>";
var_dump($dao->update(new User(7, "peter11", "ppass11", "peter1", "frampton1", "admin")));
echo "<br>";
var_dump($dao->delete(new User(7)));
echo "<br>";
echo '----------------------------------------------------------------------------------------------------------------------------------';
echo "<br>";
debug\Debug::objectprint($dao->selectUsernamePassword("user01","pass01"));
echo "<br>";
$user = $dao->selectUsernamePassword("user01","pass01");
debug\Debug::objectprint($user);