<?php

$session = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;

if(!$session){
    session_start();
};

$session_started = isset($_SESSION['username']);

?>


<nav>
    <ul>
    <?php
    if(!$session_started){
        echo '<li><a style="color: burlywood">Store application</a></li>';
        echo '<li><a href="index.php?action=home">Home</a></li>';
        echo '<li><a href="index.php?action=user/listAll">List all users</a></li>';
        echo '<li><a href="index.php?action=login/form">Login</a></li>';
    }
    ?>
    <?php
    if($session_started){
        echo '<li><a style="color: burlywood">Store application</a></li>';
        echo '<li><a href="index.php?action=home">Home</a></li>';
        echo '<li><a href="index.php?action=user/listAll">List all users</a></li>';
        echo '<li><a href="index.php?action=user/add">Add form</a></li>';
        echo '<li><a href="index.php?action=user/search">Search form</a></li>';
        echo '<li><a href="index.php?action=logout">Logout</a></li>';
    }
    ?>

    </ul>
</nav>