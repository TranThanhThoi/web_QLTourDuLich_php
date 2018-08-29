<?php

if(isset($_POST['submit']))
{
    if(isset($_FILES['anhhoas'])) {
        $file_name = 'culac.jpg';
        $file_tmp = $_FILES['anhhoas']['tmp_name'];
        move_uploaded_file($file_tmp,"../../img/hoas/".$file_name);
        echo "Thành công!";
    }
    else {
        echo "Không thành công!";
    }
}

?>

<form action="thongke.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="anhhoas" id="anhhoas">
    <input type="submit" value="Upload Image" name="submit">
    <label><input type="submit" value="Upload Image" name="submit"></label>
</form>
