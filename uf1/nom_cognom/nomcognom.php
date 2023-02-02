<?php

/**
* @param $name es la vatiable que agafa el nom del formulari
* @param $lastname es la variable que agafa el cognom del formulari
*/
if (isset($_GET['submit'])){
    $name = \filter_input(\INPUT_GET, 'name');
    $name = \filter_var($name);
    $last_name = \filter_input(\INPUT_GET, 'last_name');
    $last_name = \filter_var($last_name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <fieldset>    
    <div class="labelinput">
        <label for="name">name </label> 
        <input type="text" name="name" placeholder="name" required autofocus />
        <span class="<?php echo ($name === false) ? 'error' : 'hidden'; ?>"></span>
    </div> 
    <div class="labelinput">
        <label for="last_name">lastname </label>
        <input type="text" name="last_name" placeholder="last_name" required />
        <span class="<?php echo ($last_name === false) ? 'error' : 'hidden'; ?>"></span>
    </div> 
    <div class="labelinput">
                    <button type="submit" name="submit" value="sent">Submit</button>
                    <button type="reset" name="reset">Reset</button>
                </div>
    </fieldset>
    <fieldset>
                <legend>Results</legend>
                <div class="labelinput">
                    <label for="timeLapseToCloseTap">name </label>
                    <input readonly="readonly"  value="<?php echo ucfirst($name)." ".ucfirst($last_name)?>" />
                     <!-- mostra el nom y el cognom amb la primera lletra en mayuscula -->
                </div>

            </fieldset>
    </form>
</body>
</html>