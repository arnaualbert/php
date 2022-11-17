<?php
require_once "./interface.php";
class Clock implements Speaker{


    public function talk(){
        echo "tictac";
    }

    public function __tostring(){
        return sprintf("%s{}",get_class($this));
    }
}