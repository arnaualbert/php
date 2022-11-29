<?php
/**
* Calculation of people's age given their birthday
*/
$birthDay = new DateTime("2000-02-01");
echo "<p>Birthday = " . $birthDay->format('Y-m-d') . "</p>";
$today = new DateTime();
echo "<p>Today = " . $today->format('Y-m-d') . "</p>";
$age = $today->diff($birthDay);  //diff() returns DateInterval
echo "<p>Age = " . $age->format('%y years, %m months, %d days') . "</p>";
