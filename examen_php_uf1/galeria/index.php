<?php
$date = new DateTime();
$result = $date->format('Y-m-d H:i:s');
// $destination = "uploads/" . basename($_FILES["filename"]["name"]);
$destination = "uploads/" . $result . ".jpeg";
move_uploaded_file($_FILES['filename']['tmp_name'],$destination);
// $date = new DateTime();
// $result = $date->format('Y-m-d H:i:s');





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

<?php
 $scan = scandir("./uploads/");
 for ($i=0; $i<count($scan); $i++) {
      printf('<a href=""> <img src="'. "./uploads/" . $scan[$i] . '" alt="" /> </a>'); 
}
 ?>
  <form action="index.php" method="post" enctype="multipart/form-data">
  <legend>Image</legend>
                        <p>
                              <input type="file" name="filename"/>
                              <input type="submit" name="submit">
                        </p>
  </form>
</body>
</html>