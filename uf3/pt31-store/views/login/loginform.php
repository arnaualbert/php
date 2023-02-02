
<!-- // echo "<h2>Login page</h2>";
// echo "<p>Sorry! Page under construction</p>"; -->
<h2>Login</h2>
<?php if (isset($params['message'])): ?>
<div class='alert alert-warning'>
<strong><?php echo $params['message']; ?></strong>
</div>
<?php endif ?>
<form  method="post" action="index.php">
    <fieldset>
        <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username"/>
        <label for="password">Password: </label><input type="text" name="password" id="password" placeholder="enter password" />
   </fieldset>
    <fieldset>
        <button type="submit" name="action" value="login">Login</button>
    </fieldset>
</form>
<?php
