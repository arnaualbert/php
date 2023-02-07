
<h2>Category management page</h2>
<?php if (isset($params['message'])): ?>
<div class='alert alert-warning'>
<strong><?php echo $params['message']; ?></strong>
</div>
<?php endif ?>

<?php
$session = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
if(!$session){
  session_start();
};
$session_started = isset($_SESSION['username']);
if($session_started){
$list = $params['list'] ?? null;
if (isset($list)) {
    echo <<<EOT
    <form id="user-form" method="post" action="index.php">
        <table class="table table-sm table-bordered table-striped table-hover caption-top table-responsive-sm">
        <caption>List of categories</caption>
        <thead class='table-dark'>
        <tr>
            <th>Code</th>
            <th>Description</th>
            <th>Remove</th>
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
      <input name="description" id="description" value={$elem->getDescription()}>
      <input name="code" id="code" value={$elem->getCode()}>
            <tr>
                <td><a href="index.php?action=category/edit&id={$elem->getId()}">{$elem->getCode()}</a></td>               
                <td><a href="index.php?action=category/edit&id={$elem->getId()}">{$elem->getDescription()}</a></td>
                <td><button class="btn btn-secondary"><a href="index.php?action=category/delete&id={$elem->getId()}">Remove</button></td>
            </tr>  
            </form>             
EOT;
    }
    echo "</tbody>";
    echo "</table>";
    echo "<div class='alert alert-info' role='alert'>";
    echo count($list), " categories found.";
    echo "</div>";   
} else {
    echo "No data found";
}
}else{
  $list = $params['list'] ?? null;
if (isset($list)) {
    echo <<<EOT
    <form id="user-form" method="post" action="index.php">
        <table class="table table-sm table-bordered table-striped table-hover caption-top table-responsive-sm">
        <caption>List of categories</caption>
        <thead class='table-dark'>
        <tr>
            <th>Code</th>
            <th>Description</th>
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
      </style>
      <input name="id" id="id" value={$elem->getId()}>
      <input name="description" id="description" value={$elem->getDescription()}>
      <input name="code" id="code" value={$elem->getCode()}>
            <tr>
                <td>{$elem->getCode()}</td>               
                <td>{$elem->getDescription()}</td>
            </tr>  
            </form>             
EOT;
    }
    echo "</tbody>";
    echo "</table>";
    echo "<div class='alert alert-info' role='alert'>";
    echo count($list), " categories found.";
    echo "</div>";   
} else {
    echo "No data found";
}
}
?>
