<?php
/**
* @param $name es el nom
* @param $last_name es el cognom
* @param $value es el bucle que mostra cada esport que rep del checkbox
*/
if(isset($_POST['submit'])){
    $name = \filter_input(\INPUT_POST, 'name');
    $name = \filter_var($name);
    $last_name = \filter_input(\INPUT_POST, 'last_name');
    $last_name = \filter_var($last_name);
    if(!empty($_POST['sport'])) {

        foreach($_POST['sport'] as $value){
            {
                echo "-".$value.'<br/>';
            }
       }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nom esports</title>
</head>
<body>
    <form action="<?php echo \htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
    <!-- es el checbox dels esports -->
    <div class="labelinput">
    <input type="checkbox" name='sport[]' value="Judo"> Judo <br/>
    <input type="checkbox" name='sport[]' value="Basket"> Basket <br/>
    <input type="checkbox" name='sport[]' value="Futbol"> Futbol <br/>
    <input type="checkbox" name='sport[]' value="Natacion"> Natacion <br/>
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
                </div>
            </fieldset>
    </form>
</body>
</html>