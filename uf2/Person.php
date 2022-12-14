<?php

declare(strict_types=1);

class Person {

	private string $name; // se pueden poner tipos (int,str)
	private int $age; // se pueden poner tipos (int,str)

	public function __construct(string $name, int $age) {
		$this->name = $name; // this es la referencia al propi objecte i la flecha (->) es com accedeix
		$this->age = $age;
	}

    /**
     * Gets the value of name.
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Sets the value of name.
     * @param string $name the name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * Gets the value of age.
     * @return int
     */
    public function getAge(): int {
        return $this->age;
    }

    /**
     * Sets the value of age.
     * @param int $age the age
     */
    public function setAge(int $age) {
        $this->age = $age;
    }

     /**
     * Converts object to string format.
     * @return string
     */  
    public function __toString() {
        return sprintf("%s{[name:%s][age:%d]}", get_class($this), $this->name, $this->age);
    }

}

