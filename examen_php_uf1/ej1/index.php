<?php
define("PATH_TO_UPLOADED_FILES", "img/");
if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
    echo "File ". $_FILES['filename']['name'] ." uploaded successfully.\n";
    // get MIME type
    $mime_type = mime_content_type($_FILES['filename']['tmp_name']);
    echo "<p>MIME type: $mime_type</p>";
    // If you want to allow certain files
    $allowed_file_types = ['image/png', 'image/jpeg'];
    if (! in_array($mime_type, $allowed_file_types)) {
        // File type is NOT allowed
        echo "<p>File type not allowed</p>";
    } else {
        // Set up destination of the file
        $destination = PATH_TO_UPLOADED_FILES . basename($_FILES["filename"]["name"]);
        echo "destination: $destination";
        // Now you move/upload your file
        if (move_uploaded_file($_FILES['filename']['tmp_name'], $destination)) {
            echo "<p>File successfully uploaded and moved</p>";
        }
    }
} else {
    echo "File ". $_FILES['filename']['name'] ." NOT uploaded.\n";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>DNA form</title>
            <link rel="stylesheet" type="text/css" href="css/styles.css" />
      </head>
      <body>
     <?php
 $scan = scandir("./img/");
 for ($i=0; $i<count($scan); $i++) {
      printf('<a href=""> <img src="'. "./img/" . $scan[$i] . '" alt="" /> </a>'); 
}
 ?>
 <form action="">
 <fieldset>
                        <legend>Image</legend>
                        <p>
                              <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                              <input type="file" name="filename" />
                        </p>
                  </fieldset>
                  <p>
                  <input type="submit" name="form_submit" value="Submit" />
                  </p>
 </form>
      </body>
</html>