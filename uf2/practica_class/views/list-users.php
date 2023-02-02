<!-- makes a table that list all users -->
<table>
    <h2>List all users</h2>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>role</th>
    </tr>
    <?php
    //display list of items in a table only if the role is staff or admin.
    $userList = $params['userList'];
    $message = $params['message']??'';
    if(count($userList)>0){    foreach ($userList as $elem) {
        // if($elem->getRole()=="staff"||$elem->getRole()=="admin"){
        echo <<<EOT
        <tr>
            <td>{$elem->getId()}</td>
            <td>{$elem->getUsername()}</td>
            <td>{$elem->getRole()}</td>
        </tr>               
        EOT;
    //}
    }}

    ?>
</table>
<?php echo $message ?>
