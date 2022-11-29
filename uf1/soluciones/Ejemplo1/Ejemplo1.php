<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $filepath = 'files/data.txt';
	    if(file_exists($filepath)){
		    $handle=fopen($filepath,'r'); //r,w,x,r+,w+...
		    if($handle){
			$content=fread($handle,filesize($filepath));
			echo "<p> Contenido del archivo:$content</p>"; 
			fclose($handle);	
		    }
	    }
	    //else error, archivo no existe
        ?>
    </body>
</html>
