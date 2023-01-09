<?php

$session = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;

if(!$session){
    session_start();
};

$session_started = isset($_SESSION['username']);




?>
<?php
    if($session_started){
   $product = $params['product']??null;  //?? is the 'null coalescing operator'.
   $action = $params['action']??"findItem";
   $result = $params['result']??null;
   if (is_null($product)) {
       $product = new Product(0, "");
   }
   $disable = (($action == "findItem")||($action == "itemForm"))?"disabled":"";
echo <<<EOT
   <form id="item-form" method="post" action="index.php">
    <fieldset>
        <label for="id">Id: </label><input type="text" name="id" id="id" placeholder="enter id" value="{$product->getId()}"/>
        <label for="description">description: </label><input type="text" name="description" id="description" placeholder="enter description" value="{$product->getDescription()}"/>
        <label for="price">price: </label><input type="text" name="price" id="price" placeholder="enter price" value="{$product->getPrice()}" />
        <label for="stock">stock: </label><input type="text" name="stock" id="stock" placeholder="enter stock"  value="{$product->getStock()}"/>
   </fieldset>
    <fieldset>
        <button type="submit" id="findProduct" name="action" value="findProduct">Find</button>
        <button type="submit" id="product/addProduct" name="action" value="product/addProduct">Add</button>
        <button type="submit" id="modifyProduct" name="action" value="modifyProduct" {$disable}>Modify</button>
        <button type="submit" id="removeProduct" name="action" value="removeProduct" {$disable}>Remove</button>

    </fieldset>
</form>
EOT;
}
if (!is_null($result)) {
    echo <<<EOT
    <div><p class="alert">$result</p></div>
EOT;
} 
?>

