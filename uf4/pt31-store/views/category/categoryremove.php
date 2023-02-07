<?php
require_once 'lib/Renderer.php';
require_once 'model/Category.php';
use proven\store\model\Category;
echo "<p>Category detail page</p>";
$addDisable = "";
$editDisable = "disabled";
if ($params['mode']!='add') {
    $addDisable = "disabled";
    $editDisable = "";
}
$mode = "category/{$params['mode']}";
$message = $params['message'] ?? "";
printf("<p>%s</p>", $message);
if (isset($params['mode'])) {
    printf("<p>mode: %s</p>", $mode);
}
$category = $params['category'] ?? new Category();
echo "<form method='post' action=\"index.php\">";
echo "Do you want to remove this category?";
echo "<p class='text-danger'>IMPORTANT: deleting this category will eliminate all the products that have this category and all the stock of the product and cannot be recovered</p>";
echo proven\lib\views\Renderer::renderCategoryFieldsDelete($category);
echo "<button type='submit' class='mt-3 btn btn-secondary' name='action' value='category/remove' $editDisable>Remove</button>";
echo "</form>";