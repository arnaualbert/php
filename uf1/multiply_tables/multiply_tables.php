<!DOCTYPE html>
<!-- 
Shows multiplication tables from 1 to 10
-->
<html>
  <head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <title>Multiplication tables</title>
  </head>
  <body>
    <?php
      include "php/functions.php";
      // main program
      for ($tab=0; $tab<=10; $tab++) {
        printTable($tab);
      }
    ?>
  </body>
</html>