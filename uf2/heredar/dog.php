<?php
require_once "./speaker.php";
require_once "./animal.php";
class Dog extends Animal{
    
    private string $color;
    
    public function __construct(string $name,string $color){
        parent::__construct($name);
        $this->color=$color;
    }

    public function talk(){
        echo "wow";
    }

    public function getcolor(){
        return $this->color;
    }

    public function setcolor($color){
        $this->color=$color;
    }

    public function __tostring(){
        return sprintf("%s(name:%s,color:%s)",get_class($this),$this->getname(),$this->color);
    }
}