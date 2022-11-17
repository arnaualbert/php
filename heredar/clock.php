<?php
require_once "./speaker.php";
class Clock implements Speaker{


    public function talk(){
        echo "tictac";
    }

    public function __tostring(){
        return sprintf("%s{}",get_class($this));
    }
}