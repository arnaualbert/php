<?php

$destination = "uploads/" . basename($_FILES["filename"]["name"]);

move_uploaded_file($_FILES['filename']['tmp_name'],$destination);