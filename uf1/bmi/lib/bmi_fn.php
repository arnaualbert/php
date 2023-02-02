<?php
namespace proven\bmi;
/**
 * library of body mass index calculation and classification.
 */
//intervals of bmi and diagnose classification.
const BMI_CLASSIFICATION = [
    ['from' => 0.0, "to" => 16.5, "type" => "severely underweight"],
    ['from' => 16.5, "to" => 18.5, "type" => "underweight"],
    ['from' => 18.5, "to" => 25.0, "type" => "normal weight"],
    ['from' => 25.0, "to" => 30.0, "type" => "overweight"],
    ['from' => 30.0, "to" => 99.0, "type" => "obesity"]
];


/**
 * calculates body mass index corresponding to given weight and height.
 * @param $weight the weight in kg
 * @param $height the height in m
 * @return float body mass index.
 */
function bmiCalc(float $weight, float $height): float {
    return $weight / ($height * $height);
}

/**
 * gets bmi type from bmi value.
 * @param bmi the value of body mass index to classify.
 * @return string with bmi diagnose (class type).
 */
function bmiDiagnose(float $bmi): string {
    $result = "";
    foreach (BMI_CLASSIFICATION as $element) {
        if ( ($bmi > $element['from']) && ($bmi < $element['to']) ) {
            $result = $element['type'];
        }
    }
    return $result;
}