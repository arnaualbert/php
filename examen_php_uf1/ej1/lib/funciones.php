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