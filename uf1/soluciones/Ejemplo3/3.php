<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            $filedir = 'files/';

	    if(file_exists($filedir) && is_dir($filedir)){
		if($handle=opendir($filedir)){
			echo "<ol>";
			while(($entry=readdir($handle))!== false ){
				echo "<li>" . $entry . "</li>";
			}
			echo "</ol>";
			closedir($filedir);
		}
	    }
       ?>
    </body>
</html>
