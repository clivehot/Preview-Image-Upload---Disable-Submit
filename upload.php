<?php

$file = $_FILES["file1"]["name"];
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder

if(move_uploaded_file($fileTmpLoc, "images/$file")){
    echo "$fileName upload is complete";
} else {
    echo "move_uploaded_file function failed";
}

?>