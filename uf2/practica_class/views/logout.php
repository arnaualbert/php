<script type="text/javascript">
function submitForm(event) {
    var target = event.target;
    var buttonId = target.id;
    var myForm = document.getElementById('item-form');
    myForm.action.value = buttonId;
    myForm.submit();
    return false;
}
</script> 
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
    <button type="button" id="logoutyes" name="logoutyes"  onclick="submitForm(event);return false;">Yes</button>
    <input name="action" id="action" hidden="hidden" value="add"/>

 </form>
EOT;}
?>