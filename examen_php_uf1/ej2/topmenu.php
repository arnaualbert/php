<nav class="navbar navbar-default">
<div class="container col-md-10">
<div class="navbar-header">
</div>

    <ul class="nav navbar-nav">
    <?php 
$pep = isset($_SESSION["USER_NAME"]);
if(!$pep){
    echo "<li><a href='index.php'>Home</a></li>";
    echo "<li><a href='login.php'>Login</a></li>";

}else{
    echo "<li><a href='index.php'>Home</a></li>";
    echo "<li><a href='login.php'>Login</a></li>";
    echo "<li><a href='productos.php'>Productos</a></li>";
    echo "<li><a href='carrito.php'>Carrito</a></li>";
}   
?>

    </ul>
    </div>
</nav>
