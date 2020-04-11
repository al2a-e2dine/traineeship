<?php
$target_dir = "uploads/";

$target_file = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($imageFileType != "pdf") {
    $msg="Sorry, only PFDFs files are allowed.";
    //header('location:add_off.php?err_img_type');
}
    $file_name = $target_dir ."cv_". time() . "." . $imageFileType;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_name);

    $target_file1 = basename($_FILES["fileToUpload1"]["name"]);
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

    if($imageFileType1 != "pdf") {
    $msg="Sorry, only PFDFs files are allowed.";
    //header('location:add_off.php?err_img_type');
}
    $file_name1 = $target_dir ."lm_". time() . "." . $imageFileType1;
    move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $file_name1);
?>