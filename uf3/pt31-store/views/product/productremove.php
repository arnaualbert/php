<?php
require_once 'lib/Renderer.php';
require_once 'model/Product.php';
use proven\store\model\Product;
echo "<p>Product detail page</p>";
$addDisable = "";
$editDisable = "disabled";
if ($params['mode']!='add') {
    $addDisable = "disabled";
    $editDisable = "";
}
$mode = "product/{$params['mode']}";
$message = $params['message'] ?? "";
printf("<p>%s</p>", $message);
if (isset($params['mode'])) {
    printf("<p>mode: %s</p>", $mode);
}
$product = $params['product'] ?? new Product();
echo "<form method='post' action=\"index.php\">";
echo "Do you want to remove the product with this carecteristics?<br>";
echo "<p class='text-danger'>IMPORTANT: deleting this product will eliminate all the stock of the product and cannot be recovered</p>";
echo proven\lib\views\Renderer::renderProductDeleteFields($product);
echo "<button type='submit' class='btn btn-secondary' name='action' value='product/remove' $editDisable>Remove</button>";
echo "</form>";