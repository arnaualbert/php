<!DOCTYPE html>
<html lang="es">
<head></head>
<body> 
  <?php 
    $currentDay = date("d"); 
    if ($currentDay <= 20) { echo "Active"; } 
    else { echo "Out of service"; } 
  ?>
</body>
</html>