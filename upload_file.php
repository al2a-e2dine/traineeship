<?php
$target_dir = "uploads/";
$target_file = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType){
    $file_name = $target_dir . time() . "." . $imageFileType;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_name);
}



?>