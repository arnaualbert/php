<?php

 
require 'fn-php/fn_users.php';
use proven\login as login;

//test search user that exists
echo "test: search user that exists";
$result = login\searchUser('arnau');
echo "</pre>";
print_r($result);
echo "</pre>";
/**
//test search user that does not exists
echo "test: search user that does not exists";
$result = searchUser('arnau');
echo "</pre>";
print_r($result);
echo "</pre>";
//test insert user that does not exists
echo "test: insert user that does not exist";
$succes = insertUser('user1', 'pass1', 'registered', 'name1', 'surname1');
echo $succes ? "inserted": "not inserted";
//test insert user that exists
echo "test: insert user that exists";
$succes = insertUser('user2', 'pass2', 'registered', 'name2', 'surname2');
echo $succes ? "inserted": "not inserted";


$succes = login\login('alex', '1234');
var_dump($succes);*/



?>