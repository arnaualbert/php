<?php
session_start();
require_once 'fn-php/fn_users.php';


if(filter_has_var(INPUT_POST, 'submit'))
{
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


  $login = login(trim($username), trim($password));
  $userInfo = searchUser(trim($username));
  

  if($login){
    $_SESSION["user_valid"] = true;
    $_SESSION["username"] = $username;
    $_SESSION['rol'] = $userInfo['rol'];
    header("Location: index.php");  //redirect to application page
    exit;
  }else{
    $message ='You must write properly, or maybe register';
  }

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
<div class="container-fluid">
  <h2>Login form</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
      <label for="username">Email:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username"  value="<?php echo $username ?? ''; ?>">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"  value="<?php echo $password ?? ''; ?>">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
    <br><p readonly="readonly"  type='text' value="<?php echo $message ?? ''; ?>"><br></p>
    <input type="text" readonly="readonly" value="<?php echo $message ?? ''; ?>"></input>
  </form>
</div>
</body>
</html>