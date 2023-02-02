<!-- makes a table that list all users -->
<table>
    <h2>List all users</h2>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Wins</th>
        <th>Team</th>
    </tr>
    <?php
    //display list of items in a table only if the role is staff or admin.
    $userList = $params['SportsmanList'];
    $message = $params['message']??'';
    if(count($userList)>0){    foreach ($userList as $elem) {
        echo <<<EOT
        <tr>
            <td>{$elem->getId()}</td>
            <td>{$elem->getName()}</td>
            <td>{$elem->getSurname()}</td>
            <td>{$elem->getWins()}</td>
            <td>{$elem->getTeam()}</td>
        </tr>               
        EOT;
    //}
    }}

    ?>
</table>
<?php echo $message ?>