<?php session_start();
include 'lib/fn_practica.php';
use proven\files;
if(isset($_POST['submit'])){
    
    // es la ruta del archiu
    $filepath = 'files/user.txt';

    // es el delimitador que separa l'usuari i la contrasenya
    $delimiter = ';';

    // reb la variable user del formulari
    $user = \filter_input(\INPUT_POST, 'user');
    $user = \filter_var($user);

    // reb la variable pass del formulare
    $pass = \filter_input(\INPUT_POST, 'pass');
    $pass = \filter_var($pass);

    // llegeix l'archiu amb l'usuari i contasenya
    $dataRead = files\readPropertiesFile($filepath, $delimiter);

    $roles = files\getrol($filepath,$delimiter);

    $rol = $roles["$user"];
    if ( (strlen($user)==0) || (strlen($pass)==0) ) {  //values not provided.
        $vacio = "User and password required.";                     
    }
    $name = files\validate($dataRead,$user, $pass);
    if($name == true){$_SESSION["user_valid"] = true;
        $_SESSION['USER_NAME']= $user;
        $_SESSION['ROL']=$rol;
        header("Location: index.php");  //redirect to application page
        exit;}else{$name = "Acces denied";}
}?>
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
  <h2>Login form</h2>
<form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group">
      <label for="username">Email:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="user">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="pass">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>

  


<!-- 

Username:<input name="user" value="<?php echo $user ?? ""; ?>"><br>
Password:<input type="password" name="pass" value="<?php echo $pass ?? ""; ?>"><br>
<button type="submit" name="submit" value="sent">Submit</button> -->
<p><?php echo $name ?? ""; echo  $vacio ?? ""; ?></p>
</form>
</div>
</body>
</html>