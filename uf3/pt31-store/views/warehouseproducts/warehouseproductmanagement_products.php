<!-- <h2>Warehouse management page</h2>
<p>Sorry! Page under construction</p> -->
<h2>WarehouseProducts management page</h2>
<?php if (isset($params['message'])): ?>
<div class='alert alert-warning'>
<strong><?php echo $params['message']; ?></strong>
</div>
<?php endif ?>
<!-- <form method="post">
<div class="row g-3 align-items-center">
  <span class="col-auto">
    <label for="search" class="col-form-label">Category to search</label>
  </span>
  <span class="col-auto">
    <input type="text" id="search" name="search" class="form-control" aria-describedby="searchHelpInline">
  </span>
  <span class="col-auto">
    <button class="btn btn-primary" type="submit" name="action" value="user/role">Search</button>
  </span>
  <span class="col-auto">
    <button class="btn btn-primary" type="submit" name="action" value="user/form">Add</button>
  </span>
</div>
</form> -->
<?php

//display list in a table.
//            <th>Id</th>
// var_dump($params);
$list = $params['list'] ?? null;
$codes = $params['codes'] ?? null;
if (isset($list)) {
    echo <<<EOT
    <form id="user-form" method="post" action="index.php">
        <table class="table table-sm table-bordered table-striped table-hover caption-top table-responsive-sm">
        <caption>List of Warehouse Products</caption>
        <thead class='table-dark'>
        <tr>
            <th>Warehouse ID</th>
            <th>Product Id</th>
            <th>Stocks</th>
        </tr>
        </thead>
        <tbody>
EOT;
    // $params contains variables passed in from the controller.
    //                <td><a href="index.php?action=user/edit&id={$elem->getId()}">{$elem->getId()}</a></td>
    //<a href="index.php?action=category/edit&id={$elem->getId()}"></a>
    //<td><form method='post' action=\"index.php\"><button type='submit' name='action' value='category/remove'>Remove</button></form></td>
    // var_dump($list[0]->getWarehouseid());
    // var_dump($list);
    var_dump($codes);
    foreach ($list as $index => $elem ) {
        echo <<<EOT
        <style>
        input {
          display: none;
        }
      </style>
      <input name="id" id="id" value={$elem->getWarehouseid()}>
      <input name="code" id="code" value={$elem->getProductid()}>
      <input name="address" id="address" value={$elem->getStock()}>
            <tr>
                <td>{$elem->getWarehouseid()}</td>               
                <td>{$elem->getProductid()}</td>
                <td>{$elem->getStock()}</td>
            </tr>  
            </form>             
EOT;
    }
    echo "</tbody>";
    echo "</table>";
    echo "<div class='alert alert-info' role='alert'>";
    echo count($list), " elements found.";
    echo "</div>";   
} else {
    echo "No data found";
}

?>
