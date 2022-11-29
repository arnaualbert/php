<?php
include 'lib/file_fn.php';
use proven\files;
if(isset($_POST['submit'])){
    
    // es la ruta del archiu
    $filepath = 'files/pass.txt';

    // es el delimitador que separa l'usuari i la contrasenya
    $delimiter = ':';

    // reb la variable user del formulari
    $user = \filter_input(\INPUT_POST, 'user');
    $user = \filter_var($user);

    // reb la variable pass del formulare
    $pass = \filter_input(\INPUT_POST, 'pass');
    $pass = \filter_var($pass);

    // llegeix l'archiu amb l'usuari i contasenya
    $dataRead = files\readPropertiesFile($filepath, $delimiter);
    
    // valida el usuari i contraseña
    $name = files\validate($dataRead,$user, $pass);

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Username:<input name="user" value="<?php echo $user ?? ""; ?>"><br>
Password:<input type="password" name="pass" value="<?php echo $pass ?? ""; ?>"><br>
<button type="submit" name="submit" value="sent">Submit</button>
<br>Resultado: <input readonly="readonly"  type='text' value="<?php echo $name; ?>"><br>
</form>
</body>
</html>