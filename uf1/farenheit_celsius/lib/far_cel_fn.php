<?php
namespace proven\far_cel;

/**
 * calculates farenheit to celsius.
 * @param $farenheit the farenheit in float
 * @return float 
 */
function celsius(float $farenheit): float {
    return 5/9*($farenheit-32);
}
/**
 * calculates celsius to farenheit.
 * @param $celsius the celsius in float
 * @return float 
 */
function farenheit(float $celsius): float {
    return $celsius*9/5+32;

}