<?php
require_once "./speaker.php";
abstract class Animal implements Speaker{
    
    public function __construct(public string $name){
        $this->name=$name;
    }

    public function getname(){
        return $this->name;
    }

    public function setname(){
        $this->name=$name;
    }

    public abstract function talk();

    public function __tostring(){
        return sprintf("%s(name:%s)",get_class($this),$this->name);
    }
}