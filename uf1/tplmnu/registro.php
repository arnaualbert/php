<?php
include 'lib/fn_practica.php';
use proven\files as add;
if(isset($_POST['submit'])){

    $filepath = 'files/user.txt';
    $delimiter = ';';


    $user = \filter_input(\INPUT_POST, 'user');
    $user = \filter_var($user);

    $name = \filter_input(\INPUT_POST, 'name');
    $name = \filter_var($name);

    $surname = \filter_input(\INPUT_POST, 'surname');
    $surname = \filter_var($surname);

    $pass = \filter_input(\INPUT_POST, 'pass');
    $pass = \filter_var($pass);



    $dataRead = add\readPropertiesFile($filepath, $delimiter);

    
    $comprueba = add\check($dataRead,$user);
    if (($comprueba != True)){
    $escribe = add\escribir($user,$pass,$name,$surname,$filepath);}
    if($escribe = True){$resultado = "usuario registrado";}else{ $resultado =  "rellena todos los campos o el usuario ya existe";};

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
        include "topmenu.php";
        ?>
<div class="container-fluid">
  <h2>Registration form</h2>
        <form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>    
        <input class="form-control" name="user" value="<?php echo $user ?? ""; ?>"><br> 
        <label for="name">Name:</label>
        <input class="form-control" name="name" value="<?php echo $name ?? ""; ?>"><br> 
        <label for="surname">Surname:</label>
        <input class="form-control" name="surname" value="<?php echo $surname ?? ""; ?>"><br> 
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="pass" value="<?php echo $pass ?? ""; ?>"><br> 
        <button type="submit" name="submit" value="sent">Submit</button>
        </form>
        <!-- <p></p><?php // echo $resultado ?? "";?></p> -->
        <?php
        include "footer.php";
        ?>
    </body>
</html>