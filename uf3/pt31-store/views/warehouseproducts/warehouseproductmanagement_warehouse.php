<h2>WarehouseProducts management page</h2>
<?php if (isset($params['message'])): ?>
<div class='alert alert-warning'>
<strong><?php echo $params['message']; ?></strong>
</div>
<?php endif ?>
<?php
$list = $params['list'] ?? null;
$codes = $params['codes'] ?? null;
$warehouse = $params['warehouse']?? null;
if (isset($list)) {
    echo <<<EOT
    <form id="user-form" method="post" action="index.php">
        <table class="table table-sm table-bordered table-striped table-hover caption-top table-responsive-sm">
        <caption>List of Warehouse Products</caption>
        <div class="container d-flex align-items-center justify-content-center">
        <h3>{$warehouse->getCode()}</h3>
        </div>
        <div class="container d-flex align-items-center justify-content-center">
        <ul>
        <li>Id: {$warehouse->getId()}</li>
        <li>Address: {$warehouse->getAddress()}</li>
        </ul>
        </div>
        <thead class='table-dark'>
        <tr>
            <th>Product Id</th>
            <th>Stocks</th>
        </tr>
        </thead>
        <tbody>
EOT;
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
                <td>{$codes[$index]}</td>
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
