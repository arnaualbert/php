<?php
require_once "./interface.php";
require_once "./animal.php";
require_once "./cat.php";
require_once "./dog.php";

function main(){
    $speaker_list = array();
    // array_push($speaker_list,new Clock());
    array_push($speaker_list,new Dog('pep','blue'));
    array_push($speaker_list,new Cat('erling',true));

}