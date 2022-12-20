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
        if(in_array($_SESSION['rol'], ['staff'])){
            echo <<<EOT
            <form id="item-form" method="post" action="index.php">
             <fieldset>
                 <label for="id">Id: </label><input type="text" name="id" id="id" placeholder="enter id" value="{$user->getId()}"/>
                 <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username" value="{$user->getUsername()}" />
                 <label for="password">Password: </label><input type="text" name="password" id="password" placeholder="enter password" value="{$user->getPassword()}" />
                 <label for="role">Role: </label><input type="text" name="role" id="role" placeholder="enter role" value="{$user->getRole()}" />
                 <label for="name">Name: </label><input type="text" name="name" id="name" placeholder="enter name" value="{$user->getName()}" />
                 <label for="surname">Surname: </label><input type="text" name="surname" id="surname" placeholder="enter surname" value="{$user->getSurname()}" />
            </fieldset>
             <fieldset>
                 <button type="submit" id="findUser" name="action" value="findUser">Find</button>
                 <button type="submit" id="user/addUser" name="action" value="user/addUser">Add</button>
                 <button type="submit" id="modifyUser" name="action" value="modifyUser" disabled>Modify</button>
                 <button type="submit" id="removeUser" name="action" value="removeUser" disabled>Remove</button>
             </fieldset>
         </form>
         EOT;   
        };
    };
    ?>
    <?php
    if($session_started){
        if(in_array($_SESSION['rol'], ['admin'])){
            echo <<<EOT
            <form id="item-form" method="post" action="index.php">
             <fieldset>
                 <label for="id">Id: </label><input type="text" name="id" id="id" placeholder="enter id" value="{$user->getId()}"/>
                 <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username" value="{$user->getUsername()}" />
                 <label for="password">Password: </label><input type="text" name="password" id="password" placeholder="enter password" value="{$user->getPassword()}" />
                 <label for="role">Role: </label><input type="text" name="role" id="role" placeholder="enter role" value="{$user->getRole()}" />
                 <label for="name">Name: </label><input type="text" name="name" id="name" placeholder="enter name" value="{$user->getName()}" />
                 <label for="surname">Surname: </label><input type="text" name="surname" id="surname" placeholder="enter surname" value="{$user->getSurname()}" />
            </fieldset>
             <fieldset>
                 <button type="submit" id="findUser" name="action" value="findUser">Find</button>
                 <button type="submit" id="user/addUser" name="action" value="user/addUser">Add</button>
                 <button type="submit" id="modifyUser" name="action" value="modifyUser" {$disable} >Modify</button>
                 <button type="submit" id="removeUser" name="action" value="removeUser" {$disable}>Remove</button>
             </fieldset>
         </form>
         EOT;           
        };
    }
    ?>