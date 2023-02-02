<?php
require_once 'clock.php';
require_once 'dog.php';
require_once 'cat.php';
require_once 'animal.php';
require_once 'speaker.php';
function displayspeakerlist($list){
    foreach ($list as $k){
        echo " ".$k.PHP_EOL;
    }
}

function makethemtalk($lista){
    foreach ($lista as $e){
        echo " ".$e->talk();
    }
}

function main(){
    $speaker_list = array();
    array_push($speaker_list,new Clock());
    array_push($speaker_list,new Dog('pep','blue'));
    array_push($speaker_list,new Cat('erling',true));
    displayspeakerlist($speaker_list);
    makethemtalk($speaker_list);
}

main();