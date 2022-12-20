<?php

$session = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;

if(!$session){
    session_start();
};

$session_started = isset($_SESSION['username']);




?>
<?php
    if($session_started){
echo <<<EOT
    <form id="item-form" method="post" action="index.php">

     <label for="logout">Logout?</label>
    <button type="submit" id="logoutyes" name="action" value="logoutyes">Yes</button>
 </form>
EOT;}
?>