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
$product = $params['product']?? null;
$warehouses = $params['warehouses']?? null;
$wares = [];
$sotks = [];
$c = [];
$idcode = [];
var_dump(empty($list));
// if (isset($list)) {
if(!empty($list)){
    echo <<<EOT
    <form id="user-form" method="post" action="index.php">
        <table class="table table-sm table-bordered table-striped table-hover caption-top table-responsive-sm">
        <caption>List of Stock</caption>
        <div class="container d-flex align-items-center justify-content-center">
        <ul>
        <li>Id: {$product->getId()}</li>
        <li>Code: {$product->getCode()}</li>
        <li>Description: {$product->getDescription()}</li>
        <li>Price: {$product->getPrice()}€</li>
        </ul>
        </div>
        <thead class='table-dark'>
        <tr>
            <th>Warehouse Code</th>
            <th>Stocks</th>
        </tr>
        </thead>
        <tbody>
EOT;
 foreach($warehouses as $w){
  $idcode[$w->getId()] = $w->getCode();
 }
 
 foreach ($list as $index => $elem ) {
      $kv = $list[$index];
      echo "Id: {$kv->getWarehouseid()}";
      $wi = $kv->getWarehouseid();
      array_push($wares,$wi);
      echo 'Stock: '.$kv->getStock();
      $ws = $kv->getStock();  
      array_push($sotks,$ws);
      echo '<br />';
  }
  $c = array_combine($wares,$sotks);
  foreach($warehouses as $wareshouse){
    if(!array_key_exists($wareshouse->getId(),$c)){
      $c[$wareshouse->getId()] = 0;
    }
  }
    foreach ($idcode as $key1 => $value1) {
      if (array_key_exists($key1, $c)) {
          $c[$value1] = $c[$key1];
          unset($c[$key1]);
      }
    }
  foreach($c as $k=>$v){
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
                <td>{$k}</td>               
                <td>{$v}</td>
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
    echo <<<EOT
    <form id="user-form" method="post" action="index.php">
        <table class="table table-sm table-bordered table-striped table-hover caption-top table-responsive-sm">
        <caption>List of Stock</caption>
        <div class="container d-flex align-items-center justify-content-center">
        <ul>
        <li>Id: {$product->getId()}</li>
        <li>Code: {$product->getCode()}</li>
        <li>Description: {$product->getDescription()}</li>
        <li>Price: {$product->getPrice()}€</li>
        </ul>
        </div>
        <thead class='table-dark'>
        <tr>
            <th>Warehouse Code</th>
            <th>Stocks</th>
        </tr>
        </thead>
        <tbody>
EOT;
    foreach($warehouses as $w){
      $idcode[$w->getId()] = $w->getCode();
     }
     
     foreach ($list as $index => $elem ) {
          $kv = $list[$index];
          echo "Id: {$kv->getWarehouseid()}";
          $wi = $kv->getWarehouseid();
          array_push($wares,$wi);
          echo 'Stock: '.$kv->getStock();
          $ws = $kv->getStock();  
          array_push($sotks,$ws);
          echo '<br />';
      }
      $c = array_combine($wares,$sotks);
      foreach($warehouses as $wareshouse){
        if(!array_key_exists($wareshouse->getId(),$c)){
          $c[$wareshouse->getId()] = 0;
        }
      }
        foreach ($idcode as $key1 => $value1) {
          if (array_key_exists($key1, $c)) {
              $c[$value1] = $c[$key1];
              unset($c[$key1]);
          }
        }
      foreach($c as $k=>$v){
            echo <<<EOT
                <tr>
                    <td>{$k}</td>               
                    <td>{$v}</td>
                </tr>  
                </form>             
          EOT;
    
          }
    
        echo "</tbody>";
        echo "</table>";
        echo "<div class='alert alert-info' role='alert'>";
        echo count($list), " elements found.";
        echo "</div>";  
}

?>
