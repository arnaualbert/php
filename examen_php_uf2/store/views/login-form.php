<!-- aqui hay inicio php -->
<!-- // echo("Not implemented yet"); -->
<form  method="post" action="index.php">
<fieldset>
    <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username"/>
    <label for="password">Password: </label><input type="text" name="password" id="password" placeholder="enter password" />
</fieldset>
<fieldset>
    <?php        
     if (isset($_SESSION['username'])) {
          echo   <<<EOT
          <button type="submit" name="action" value="user/login" disabled>Login</button>
          EOT;
      }else{
        echo   <<<EOT
        <button type="submit" name="action" value="user/login">Login</button>
        EOT;
      }?>
    <!-- <button type="submit" name="action" value="user/login">Login</button> -->
</fieldset>
</form>
