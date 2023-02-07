<h2>Warehouse management page</h2>
<?php if (isset($params['message'])): ?>
<div class='alert alert-warning'>
<strong><?php echo $params['message']; ?></strong>
</div>
<?php endif ?>
<?php

//display list in a table.
$list = $params['list'] ?? null;
if (isset($list)) {
    echo <<<EOT
    <form id="user-form" method="post" action="index.php">
        <table class="table table-sm table-bordered table-striped table-hover caption-top table-responsive-sm">
        <caption>List of warehouse</caption>
        <thead class='table-dark'>
        <tr>
            <th>Code</th>
            <th>Address</th>
            <th>Stocks</th>
        </tr>
        </thead>
        <tbody>
EOT;
    foreach ($list as $elem) {
        echo <<<EOT
        <style>
        input {
          display: none;
        }
        a {
          color: Black;
       }
      </style>
      <input name="id" id="id" value={$elem->getId()}>
      <input name="code" id="code" value={$elem->getCode()}>
      <input name="address" id="address" value={$elem->getAddress()}>
      <input  name="search" value="{$elem->getId()}">
            <tr>
                <td><a href="index.php?action=warehouse/edit&id={$elem->getId()}">{$elem->getCode()}</a></td>               
                <td><a href="index.php?action=warehouse/edit&id={$elem->getId()}">{$elem->getAddress()}</a></td>
                <td><button class="btn btn-secondary"><a href="index.php?action=stock/warehouseid&id={$elem->getId()}">Stocks</a></button></td>
            </tr>  
            </form>             
EOT;
    }
    echo "</tbody>";
    echo "</table>";
    echo "<div class='alert alert-info' role='alert'>";
    echo count($list), " warehouse found.";
    echo "</div>";   
} else {
    echo "No data found";
}

?>
