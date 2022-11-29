<?php
use proven\bmi as bmi;
/**
 * Program to calculate the body mass index (BMI) from weight in kg and height in m.
 * It also writes diagnose according to bmi classification.
 */
//include function library file.
include "lib/bmi_fn.php";
//input data.
$weight = 60.0;  //the weight in kg
$height = 1.8;  //the height in m
//check input data values.
echo "weight: $weight\n";
echo "height: $height\n";
//print all bmi classification.
foreach(bmi\BMI_CLASSIFICATION as $element) {
    echo "from ", $element['from'], " to ", $element['to'], " is type '", $element['type'], "'\n";
}
//calculate body mass index (bmi) using positional parameters.
$bmiValue = bmi\bmiCalc($weight, $height);
//get diagnose.
$diagnose = bmi\bmiDiagnose($bmiValue);
//print result.
printf("BMI with weight=%.2f and height=%.2f is %.2f. Diagnose: %s\n", 
    $weight, $height, $bmiValue, $diagnose);
//change input data.
$weight = 80.0;   //the weight in kg
$height = 1.6;  //the height in m
//check input data values.
echo "weight: $weight\n";
echo "height: $height\n";
//calculate body mass index (bmi) using named parameters.
$bmiValue = bmi\bmiCalc(height: $height, weight: $weight);
//get diagnose.
$diagnose = bmi\bmiDiagnose($bmiValue);
//print result.
printf("BMI with weight=%.2f and height=%.2f is %.2f. Diagnose: %s\n", 
    $weight, $height, $bmiValue, $diagnose);
