<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update user</title>
        <link rel="stylesheet" href="css/users.css"/>
    </head>
    <body>
        <h2>Update user</h2>
        <?php
        require_once "lib/Renderer.php";
        require_once "lib/Validator.php";
        require_once 'model/User.php';
        require_once "model/persist/UserPdoDbDao.php";
        $user = new user\model\User();
        $id = filter_input(INPUT_POST,'id');
        $username = filter_input(INPUT_POST,'username');
        $password = filter_input(INPUT_POST,'password');
        $role = filter_input(INPUT_POST,'role');
        if (filter_has_var(INPUT_POST, 'search')) {
            $dao = new user\model\persist\UserPdoDbDao();
            $user = new user\model\User($id);
            $found = $dao->select($user);
            if (!is_null($found)) {
                echo "<form method='post' action=\"$_SERVER[PHP_SELF]\">";
                echo lib\views\Renderer::renderUserFields($found);
                // echo "<button type='submit' name='submit' value='submit'>Submit</button>";
                echo "<button type='submit' name='submit' value='submit'>Update</button>";
                echo "</form>";
            }
        }elseif(filter_has_var(INPUT_POST,'submit')){
            // $dao = new user\model\persist\UserPdoDbDao();
            // $user = new user\model\User($id);
            // $found = $dao->select($user);
            // $result = $dao->update($found);
            // var_dump($result);
            // if ($result > 0) {
            //     echo "<p>User successfully updated</p>";
            // } else {
            //     echo "<p>User not updated</p>";
            // }
            $user = \lib\views\Validator::validateUser(INPUT_POST);
            if ($user !== null) {
                $dao = new user\model\persist\UserPdoDbDao();
                $result = $dao->update($user);
                if ($result > 0) {
                    echo "<p>User successfully updated</p>";
                } else {
                    echo "<p>User not updated</p>";
                }
            } else {
                echo "<p>Valid data shoud be provided</p>";
            }  
        }else{
            echo "<form method='post' action=\"$_SERVER[PHP_SELF]\">";
            echo lib\views\Renderer::renderUserFieldsId($user);
            echo "<button type='submit' name='search' value='search'>search</button>";
            echo "</form>";
        }
        ?>
    </body>
</html>