# php

Para empezar un archivo PHP se empieza con <?php

Todos los "comandos" tienen que acabar en ;

### echo

Un print clasico en php es echo se tiene que acabar en punto y coma (;)

```php
 echo "lo que quieres printear";
```

### Concatenar string

Para concatenar un string es con un . entre strings :

```php
 echo "Essere" . "Ferrari";
```

para saltar de linea es \n :

```php
 echo "Essere" . "\nFerrari";
```

### variables

Para hacer una variable se pone un $nombrevariable :

```php
  $f1 = "Ferrari";
```

![PHP_m2l1e5](https://user-images.githubusercontent.com/75489909/153649196-fa772a34-a8fe-45b1-8897-c359f82b5909.svg)

Asi se concatenan una variable y un string :

```php
  $name = "Arnau";

  $language = "PHP";
  
echo "me llamo ".$name;

// el resultado es me llamo Arnau
```

Hay otra manera de concatenar 

```php
  $noun = "helicopter";
  $adjective = "powerful";
  $verb = "scream";

  echo "The world's most beloved $noun was very $adjective and loved to $verb every single day.";

 echo "\nI have always been obsessed with ${noun}s. I'm ${adjective}ish. I'm always ${verb}ing.";

//The world's most beloved helicopter was very powerful and loved to scream every single day.
//I have always been obsessed with helicopters. I'm powerfulish. I'm always screaming.
```

tambien se pueden concatenar asi : si pones la variable otra ver $variable .= "lo que quieras concatenar"

```php
<?php
  echo "I'm going on a picnic!";

  $sentence = "\nI'm going on a picnic, and I'm taking apples";
$sentence .=", burgers";
  echo $sentence;

//el resultado es : I'm going on a picnic!
//I'm going on a picnic, and I'm taking apples, burgers
```

### reasignar variables es $variable = $variablenueva

```php
$coche = "ferrari"

$coche_soñado = $coche

//$coche_soñado ahora tiene el valor de $coche que es ferrari
```

```php

<?php
  $movie = "cars";

  echo "I'm a fickle person, my favorite movie used to be $movie.";
  
$movie = "kill bill";

$old_favorite = $movie ;  
  echo "\nBut now my favorite is $movie.";

echo "\nI love $old_favorite";

//I'm a fickle person, my favorite movie used to be cars.
//But now my favorite is kill bill.
//I love kill bill
```

para reasignar y concatenar: $variable =& $variable_para_copiar

```php
<?php
  $very_bad_unclear_name = "15 chicken wings";
$order =& $very_bad_unclear_name;
$order .= ", 2 apples";
  echo "\nYour order is: $very_bad_unclear_name.";

// print:  Your order is: 15 chicken wings, 2 apples. 
```

### integers

```php
<?php
  
$encendido = 1;

echo $encendido;
echo "\n";

$apagado = 2.1;

echo $apagado;
// print: 1
//2.1
```

## sumas y restas

```php
<?php

echo 6 + 6;

//print 12

```

se pueden restar variables que contengan integers

```php
//se pueden restar variables

$last_month = 1187.23;
$this_month = 1089.98;
  
echo $last_month - $this_month;

//print 97.25
```

### multiplicacion y division

```php
echo 2 * 3; // Prints: 6
echo -21 / 7; // Prints: -3
```

```php
  $num_languages = 4;
  $months = 11;
  $days = $months * 16;
  $days_per_language = $days / $num_languages;
 echo $days_per_language; 
//print : 44
```

### elevar

```php
echo 4 ** 2; // Prints: 16
// 4 a la 2
```

## el residuo de las operaciones de division

```php
echo 7 % 3;
//print 1
```

### funciones

para declarar una funcion es asi:

```php
function nombre_funcion(){
echo "hola";
}

//para llamar la funcion se hace asi:

nombre_funcion();
```

```php
<?php
  function printStringReturnNumber(){
    echo "hola";
    return 1;
  }

  $my_num = printStringReturnNumber();
  echo $my_num;
// print : hola1
```
despues de return no se puede poner codigo porque no se a a ejecutar , return para la funcion

si una funcion no tiene return no devuelve nada , es un null

funciones con parametros :

```php
<?php
function increaseEnthusiasm($str)
{
return $str."!";
}
echo increaseEnthusiasm("Arnau");
// print : Arnau!
```
funcion con varios parametros :

```php
function divide($num_one, $num_two)
{
  return $num_one / $num_two;
};
echo divide(12, 3); // Prints: 4

<?php
// Write your code below:
function calculateArea($hight,$width){
  $area = $hight * $width;
  return $area;
}

echo calculateArea(3,6);
```

Parametros default, se puede definir un parametro dentro de la fucion :

```php
function greetFriend($name = "old chum")
{
  echo "Hello, $name!";
};
 
greetFriend("Marvin"); // Prints: Hello, Marvin!
 
greetFriend(); // Prints: Hello, old chum!
```


### Objetos

Un interface no pot tenir atributs ni metodes per pot tenir constatns

```php
interface Shape {
    /**
     * calculates shape area.
     */
    public function area(): float;
    /**
     * calculates shape perimeter.
     */
    public function perimeter(): float;
}


class Square implements Shape {
    
    private $side;

    /**
     * class constructor
     * @param float $side
     */    
    public function __construct(float $side) {
        $this->side = $side;
    }
    
    /**
     * read accessor for $side
     * @return float
     */    
    public function getSide(): float {
        return $this->side;
    }

    /**
     * write accessor for $side
     * @param float $side
     */
    public function setSide(float $side) {
        $this->side = $side;
    }
    
    /**
     * converts object into a string
     * @return string
     */
    public function __toString() {
        return "Square: {side=$this->side}";
    }

    public function area(): float {
        return $this->side * $this->side;
    }

    public function perimeter(): float {
        return 4.0 * $this->side;
    }

}
```