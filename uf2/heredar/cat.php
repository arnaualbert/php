<?php
require_once "./speaker.php";
require_once "./animal.php";
class Cat extends Animal{
    
    private bool $handsome;
    
    public function __construct(string $name,bool $handsome){
        parent::__construct($name);
        $this->handsome=$handsome;
    }

    public function talk(){
        echo "miau";
    }

    public function ishandsome(){
        return $this->handsome;
    }

    public function sethandsome($handsome){
        $this->handsome=$handsome;
    }

    public function __tostring(){
        return sprintf("%s(name:%s,handsome:%s)",get_class($this),$this->getname(),$this->handsome);
    }
}