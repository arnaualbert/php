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
            <form action="4.php" method="post" enctype="multipart/form-data">
                  <h1>form</h1>

                  <fieldset>
                        <legend>File</legend>
			<p>
				<label> Select file:</label>
				<select name="form_select">
				<option value='-' selected='selected'>Default select </option>
			<?php
				$filedir='files/';
				if (file_exists($filedir) && is_dir($filedir)){
					if($handle=opendir($filedir)){
						while(($entry=readdir($handle))!==false){			
							if($entry!="." && $entry !=".."){			//if the files read are not directories '.' or '..' proceed
								echo "<option value='$entry'>$entry</option>";	
							}
						}
						closedir($handle);
					}
				}	
			?>
				</select>
			</p>
			<?php
				if(isset($_POST["form_submit"])){
					$form_sel=filter_input(INPUT_POST,'form_select');				//get the file selected from the form 
					if(file_exists($filedir . $form_sel) && is_readable($filedir . $form_sel)){      
						$file_handle=fopen($filedir . $form_sel,'r');
						if($file_handle){
							$file_content=fread($file_handle,filesize($filedir . $form_sel)); //read the file
							fclose($file_handle);
						}
					}
				}

			?>
				<textarea name="textarea_file" rows="10" cols="100" disabled><?php echo $file_content ?? "" ?></textarea>
			</fieldset>
                  <p>
                        <input type="submit" name="form_submit" value="Submit" />
                        <input type="reset" name="form_reset" value="RESET form" />
                  </p>
