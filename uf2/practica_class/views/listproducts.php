<!-- makes a table that list al products -->
<h2>List of all products</h2>
<table>
<tr>
        <th>id</th>
        <th>description</th>
        <th>price</th>
    </tr>
<?php
//to do
$prodList = $params['prodList']??array();
$message = $params['message']??'';
if(count($prodList)==0){
    echo "no hi han productes ";
}else{
    foreach($prodList as $prod){
        echo <<<EOT
        <tr>
            <td>{$prod->getId()}</td>
            <td>{$prod->getDescription()}</td>
            <td>{$prod->getPrice()}</td>
        </tr>
        EOT;
    }

}
?>
</table>

