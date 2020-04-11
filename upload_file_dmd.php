<?php
$target_dir = "uploads/";

$target_file = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    //$msg="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header('location:add_off.php?err_img_type');
}
    $file_name = $target_dir . time() . "." . $imageFileType;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_name);

    $target_file1 = basename($_FILES["fileToUpload1"]["name"]);
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

    if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") {
    //$msg="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header('location:add_off.php?err_img_type');
}
    $file_name1 = $target_dir . time() . "." . $imageFileType1;
    move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $file_name1);
?>