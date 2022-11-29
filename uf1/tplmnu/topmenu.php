<nav class="navbar navbar-default">
<div class="container col-md-10">
<div class="navbar-header">
<a class="navbar-brand" href="https://www.proven.cat">ProvenSoft</a>
</div>

    <ul class="nav navbar-nav">
    <?php 
$pep = isset($_SESSION["USER_NAME"]);
if(!$pep){
    echo "<li><a href='index.php'>Home</a></li>";
    echo "<li><a href='daymenu.php'>Day Menu</a></li>";
    echo "<li><a href='login.php'>Login</a></li>";
    echo "<li><a href='registro.php'>Register</a></li>";
}   
?>
<?php if($pep){
    if($_SESSION["ROL"]=="admin"){
        echo "<li><a href='index.php'>Home</a></li>";
        echo "<li><a href='daymenu.php'>Day Menu</a></li>";
        echo "<li><a href='view_menu.php'>View Menu</a></li>";
        echo "<li><a href='adminmenus.php'>Admin Menus</a></li>";
        echo "<li><a href='adminusers.php'>Admin users</a></li>";
        echo "<li><a href='logout.php'>Logout</a></li>";

    }elseif($_SESSION["ROL"]=="staff"){
        echo "<li><a href='index.php'>Home</a></li>";
        echo "<li><a href='daymenu.php'>Day Menu</a></li>";
        echo "<li><a href='view_menu.php'>View Menu</a></li>";
        echo "<li><a href='adminmenus.php'>Admin Menus</a></li>";
        echo "<li><a href='logout.php'>Logout</a></li>";
    }elseif($_SESSION["ROL"]=="registered"){
        echo "<li><a href='index.php'>Home</a></li>";
        echo "<li><a href='daymenu.php'>Day Menu</a></li>";
        echo "<li><a href='view_menu.php'>View Menu</a></li>";
        echo "<li><a href='logout.php'>Logout</a></li>";
    }
} ?>
        <li><a href=""><?php echo $_SESSION["USER_NAME"] ?? ""?></a></li> 
    </ul>
    </div>
</nav>
