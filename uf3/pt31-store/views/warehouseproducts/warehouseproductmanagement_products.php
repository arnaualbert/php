<h2>WarehouseProducts management page</h2>
<?php if (isset($params['message'])): ?>
<div class='alert alert-warning'>
<strong><?php echo $params['message']; ?></strong>
</div>
<?php endif ?>
<?php
$list = $params['list'] ?? null;
$codes = $params['codes'] ?? null;
$product = $params['product']?? null;
$warehouses = $params['warehouses']?? null;
$wares = [];
$sotks = [];
$c = [];
$idcode = [];
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
      $wi = $kv->getWarehouseid();
      array_push($wares,$wi);
      $ws = $kv->getStock();  
      array_push($sotks,$ws);
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
          $wi = $kv->getWarehouseid();
          array_push($wares,$wi);
          $ws = $kv->getStock();  
          array_push($sotks,$ws);
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
        echo count($list), " products found.";
        echo "</div>";  
}

?>
