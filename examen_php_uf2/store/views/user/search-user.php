<!-- aqui hay iniciado php -->
<!-- echo("Not implemented yet");
echo("user form"); -->
<!-- is the form for the users -->
<?php

$session = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;

if(!$session){
    session_start();
};

$session_started = isset($_SESSION['username']);




?>

<?php
   $user = $params['user']??null;  //?? is the 'null coalescing operator'.
   $action = $params['action']??"findItem";
   $result = $params['result']??null;
   if (is_null($user)) {
       $user = new User(0, "");
   }
   $disable = (($action == "findItem")||($action == "itemForm"))?"disabled":"";
   if (!is_null($result)) {
       echo <<<EOT
       <div><p class="alert">$result</p></div>
EOT;
   } 

?>
    <?php 
    if($session_started){
        if(isset($_SESSION['username'])){
            echo <<<EOT
            <form id="item-form" method="post" action="index.php">
             <fieldset>
                 <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username" value="{$user->getUsername()}" />
                 <label for="password">Password: </label><input type="text" name="password" id="password" placeholder="enter password" value="{$user->getPassword()}"  />
                 <label for="age">Age: </label><input type="text" name="age" id="age" placeholder="enter age" value="{$user->getAge()} "  />
            </fieldset>
             <fieldset>
                 <button type="submit" id="findUser" name="action" value="findUser">Search</button>
             </fieldset>
         </form>
         EOT;   
        };
    }else{
        echo <<<EOT
        <p>Needs to login to use this page</p>
        <form id="item-form" method="post" action="index.php">
        <fieldset>
            <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username" />
            <label for="password">Password: </label><input type="text" name="password" id="password" placeholder="enter password" />
            <label for="age">Age: </label><input type="text" name="age" id="age" placeholder="enter age" />
        </fieldset>
        <fieldset>
            <button type="submit" id="findUser" name="action" value="findUser" disabled>Add</button>
        </fieldset>
    </form>
    EOT; 
    };
    ?>
