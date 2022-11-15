<?php
require_once "./interface.php";
class Clock implements Speaker{


    public function talk(){
        echo "tictac";
    }
}