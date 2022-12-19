<?php
require_once './model/Model.php';
$model = new Model();


$encontrado = $model->searchProductById("22");
var_dump($encontrado);



// $array_login = array("Arnau2","holas");
// $allusers = $model->validate($array_login);
// var_dump($allusers);



// $allusers = $model->searchAllUsers();
// echo '<pre>';
// echo var_dump($allusers);
// echo '</pre>';