<?php

$session = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;

if(!$session){
    session_start();
};

$session_started = isset($_SESSION['username']);




?>
<nav class="navbar navbar-default">
<div class="container col-md-10">
<div class="navbar-header">
<a class="navbar-brand" href="https://www.proven.cat">ProvenSoft</a>
</div>
<ul class="nav navbar-nav">
<li><a href='daymenu.php'>Day Menu</a></li>
<li><a href='index.php'>Home</a></li>


<?php
    if(!$session_started){
        echo "<li><a href='register.php'>Register</a></li>"; 
        echo "<li><a href='login.php'>Login</a></li>";   
            
    }
?>

<?php
    if($session_started){
        if(in_array($_SESSION['rol'], ['registered','staff','admin'])){
            echo "<li><a href='register.php'>Register</a></li>"; 
            echo "<li><a href='logout.php'>Logout</a></li>";
            echo "<li><a href='viewMenus.php'>View Menus</a></li>";                  
        };
    }
?>

<?php
    if($session_started){
        if(in_array($_SESSION['rol'], ['staff','admin'])){
            echo "<li><a href='adminMenus.php'>Admin Menus</a></li>";                   
        };
    }
?>

<?php
    if($session_started){
        if(in_array($_SESSION['rol'], ['admin'])){
            echo "<li><a href='adminUsers.php'>Admin Users</a></li>";                   
        };
    }
?>
</ul>
</div>
</nav>