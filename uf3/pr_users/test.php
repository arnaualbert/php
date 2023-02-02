<?php
require_once "lib/Renderer.php";
require_once "lib/Validator.php";
require_once 'model/User.php';
require_once "model/persist/UserPdoDbDao.php";
$dao = new user\model\persist\UserPdoDbDao();
$id = 5;
$user = new user\model\User($id);
$found = $dao->select($user);
$fount = $found->setUsername('pep');
// $si = $dao->update($fount);
// var_dump($si);
var_dump($found);
var_dump($fount);