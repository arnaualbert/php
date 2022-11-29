<?php
require_once 'fn-php/fn_users.php';
session_start();


if(filter_has_var(INPUT_POST, 'registersubmit'))
{
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING); 
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);

  if(isset($username) && isset($password) && isset($name) && isset($surname) ){
  
  $insert = insertUser(trim($username), trim($password), trim($name), trim($surname));

  if($insert){
    header("Location: login.php");  //redirect to application page
  }else{
    $message ='You must write properly, or maybe fill all the camps';
  }}

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
  <h2>Registration form</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $username ?? ''; ?>">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $password ?? ''; ?>">
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name ?? ''; ?>">
    </div>
    <div class="form-group">
      <label for="surname">Surname:</label>
      <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" value="<?php echo $surname ?? ''; ?>">
    </div>
    <button type="submit" name="registersubmit" class="btn btn-default">Submit</button>
  </form>
  <input type="text" readonly="readonly" value="<?php echo $message ?? ''; ?>"></input>
</div>
</body>
</html>