<?php
include 'lib/fn_add.php';
use proven\files as add;
if(isset($_POST['submit'])){
    
    $filepath = 'files/usuarios.txt';
    $delimiter = ':';


    $user = \filter_input(\INPUT_POST, 'user');
    $user = \filter_var($user);

    $pass = \filter_input(\INPUT_POST, 'pass');
    $pass = \filter_var($pass);

    // $lista = array($user,$pass);
    $dataRead = add\readPropertiesFile($filepath, $delimiter);
    $escribe = add\check_write($dataRead,$user,$pass,$filepath);


}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
</head>
<body>
<form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Username:<input name="user" value="<?php echo $user ?? ""; ?>"><br>
Password:<input type="password" name="pass" value="<?php echo $pass ?? ""; ?>"><br>
<button type="submit" name="submit" value="sent">Submit</button>
<!-- <br>Resultado: <input readonly="readonly"  type='text' value="<?php echo $name; ?>"><br> -->
</form>
</body>
</html>