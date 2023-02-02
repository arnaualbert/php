<!-- // aqui hay php iniciado -->
<!-- echo("Not implemented yet");
echo("\n");
echo("lista"); -->


<table>
    <h2>List all users</h2>
    <tr>
        <th>Username</th>
        <th>Age</th>
    </tr>
    <?php
    //display list of items in a table only if the role is staff or admin.
    $userList = $params['userList'];
    $message = $params['message']??'';
    if(count($userList)>0){    foreach ($userList as $elem) {
        // if($elem->getRole()=="staff"||$elem->getRole()=="admin"){
        echo <<<EOT
        <tr>
            <td>{$elem->getUsername()}</td>
            <td>{$elem->getAge()}</td>
        </tr>               
        EOT;
    //}
    }}

    ?>
</table>
<?php echo $message ?>