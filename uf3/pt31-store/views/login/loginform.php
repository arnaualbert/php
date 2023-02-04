
<!-- // echo "<h2>Login page</h2>";
// echo "<p>Sorry! Page under construction</p>"; -->
<h2>Login</h2>
<?php if (isset($params['message'])): ?>
<div class='alert alert-warning'>
<strong><?php echo $params['message']; ?></strong>
</div>
<?php endif ?>
<div class="container d-flex align-items-center justify-content-center">
<form  method="post" action="index.php">
    <fieldset>
        <label  for="username">Username: </label><input type="text" name="username" id="username" class="form-control" placeholder="enter username"/>
        <label for="password">Password: </label><input type="text" name="password" id="password" class="form-control" placeholder="enter password" />
   </fieldset>
    <fieldset>
        <button type="submit" class="mt-2 btn btn-secondary" name="action" value="login">Login</button>
    </fieldset>
</form>
</div>
<?php
