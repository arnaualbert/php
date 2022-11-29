<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--<!DOCTYPE html>-->
<!--<html>--> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <!--<meta charset="UTF-8" />-->
            <title>form</title>
            <link rel="stylesheet" type="text/css" href="css/styles.css" />
      </head>
      <body>
            <form action="5.php" method="post" enctype="multipart/form-data" id="fileform">
                  <h1>form</h1>

                  <fieldset>
                        <legend>File</legend>
			<p>
			<?php
				$filedir='files/';

				if(file_exists($filedir) && is_dir($filedir)){
					if(isset($_POST["form_submit"])){
						$filename=filter_var($_POST["file_name"],FILTER_SANITIZE_STRING);
						$filecontent=filter_var($_POST["filecontentarea"],FILTER_SANITIZE_STRING);
						if ($filename!=""){
							$handle_write=fopen($filedir . $filename . ".txt",'w');	
							if($handle_write){
								fwrite($handle_write,$filecontent);
								fclose($handle_write);
							}
						}

					}
					if($handle=opendir($filedir)){
						echo "<ol>";
						while(($entry=readdir($handle))!==false){			
							if($entry!="." && $entry !=".."){			//if the files read are not directories '.' or '..' proceed
								echo "<li>$entry</li>";
							}
						}
						echo "</ol>";
						closedir($handle);
					}
				}
			?>
			
                          <input type="text" name="file_name" placeholder="Name of the file to create" />
			</p>
			<p>	
			  <textarea name="filecontentarea" form="fileform" rows="4" cols="50">Write here content for the file</textarea>
                        </p>
		
			</fieldset>
                  <p>
                        <input type="submit" name="form_submit" value="Submit" />
                        <input type="reset" name="form_reset" value="RESET form" />
                  </p>
