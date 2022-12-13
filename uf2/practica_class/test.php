<?php
require_once './model/Model.php';
$model = new Model();

$allusers = $model->searchAllUsers();
echo '<pre>';
echo var_dump($allusers);
echo '</pre>';