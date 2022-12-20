<!-- is the login form -->
   <form  method="post" action="index.php">
    <fieldset>
        <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username"/>
        <label for="password">Password: </label><input type="text" name="password" id="password" placeholder="enter password" />
   </fieldset>
    <fieldset>
        <button type="submit" name="action" value="user/login">Login</button>
    </fieldset>
</form>
<?php


