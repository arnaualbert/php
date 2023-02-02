<?php
  /**
  * performs multiplication of the two provided parameters
  * @param num1  1st operand. 
  * @param num2  2nd operand. 
  * @return result of calculation
  */
  function multiply(int $num1, int $num2):int {
    return $num1 * $num2;
  }
  /**
  * prints a table of multiplication
  * @param tab  number of multiplication table to print 
  */
  function printTable(int $tab) {
      echo "<div>";
      echo "<table>";
      // 1st row: title
      echo "<tr>";
      echo "<th colspan='3'>Table $tab</th>";
      echo "</tr>";
      // rows 1 to 10
      for ($row = 0; $row <= 10; $row++) {
        echo "<tr>";
        echo "<th>", $tab, "</th>";
        echo "<td>", $row, "</td>";
        echo "<td>", multiply($tab, $row), "</td>";
        echo "</tr>";
      }
      echo "</table>";
      echo "</div>";    
  }