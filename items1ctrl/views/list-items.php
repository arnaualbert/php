<table>
    <h2>List all items</h2>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Content</th>
    </tr>
    <?php
    //display list of items in a table.
    $itemList = $params['itemList'];
    // $params contains variables passed in from the controller.  /// <<<EOT  es para un string multilinea se acaba asi:  EOT;
    foreach ($itemList as $item) {
        echo <<<EOT
        <tr>
            <td>{$item->getId()}</td>
            <td><a href="index.php?id={$item->getId()}&action=findItem">{$item->getTitle()}</a></td>
            <td>{$item->getContent()}</td>
        </tr>               
EOT;
    }
    ?>
</table>
