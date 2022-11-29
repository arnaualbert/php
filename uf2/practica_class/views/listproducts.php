<h2>List of all products</h2>
<!-- hacer una tabla aqui -->
<?php
//to do
$prodList = $params['prodList']??array();
$message = $params['message']??'';
if(count($prodList)==0){
    echo "no hi han productes ";
}
echo $message;
var_dump($prodList);
