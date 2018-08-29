<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $qr1 = "select * from hoas where id_hoas = '$id'";
    $kq1 = mysqli_query($con, $qr1);
    $rowfix = mysqli_fetch_array($kq1);
}
    if (isset($_POST['letfixsp'])) {
        $id = $_POST['id_hidden'];
        $ten_hoas = $_POST['tenhoas'];
        $gia_hoas = $_POST['giahoas'];
        if ($_FILES['anhhoas']['error'] < 1) {
            $file_name = str_replace(" ", "", xoa_dau($ten_hoas) . '.jpg');
            $file_tmp = $_FILES['anhhoas']['tmp_name'];
            if (move_uploaded_file($file_tmp, "../../img/hoas/" . $file_name))
                $anh_hoas = "img/hoas/" . $file_name . "";
        } else {
            $anh_hoas = $_POST['anh_hidden'];
        }
        $thong_tin = $_POST['thongtin'];
        $loai_hoa = $_POST['loaihoa'];
        $mau_hoa = $_POST['mauhoa'];
        $so_luong = $_POST['soluong'];
        $updat = "UPDATE hoas SET ten_hoas = '$ten_hoas', gia_hoas = $gia_hoas, anh_hoas = '$anh_hoas', thongtin_hoas = '$thong_tin', id_loaihoa = $loai_hoa, idmauhoa = $mau_hoa, soluong = $so_luong WHERE id_hoas = $id";
        if (mysqli_query($con, $updat)) {
            echo '<script> alert("Sửa thành công!"); </script>';
            echo "<script>location.href='?p=hang-hoa'</script>";
            echo "cc";
        } else echo "fuck";
    }
?>

<div class="modal fade" id="fixModalsp" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:rgba(255,255,255,.8);">
            <div class="modal-header" style="padding: 15px 15px 0 15px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <legend><span class="glyphicon glyphicon-user"></span> Thông tin hoa</legend>
            </div>
            <form action="index.php?p=hang-hoa" method="post" enctype="multipart/form-data">
                <input type='text' value='<?php echo $rowfix['anh_hoas'] ?>' name='anh_hidden' hidden>
                <input type='text' value='<?php echo $rowfix['id_hoas'] ?>' name='id_hidden' hidden>
                <div class="container" style="width: 100%">
                    <table class="tb-su">
                        <tr>
                            <td style="width: 20%"><label for="">Tên hoa</label></td>
                            <td style="width: 80%"><input type="text" class="form-control first-tb" name="tenhoas" value="<?php echo $rowfix['ten_hoas'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Giá</label></td>
                            <td><input type="text" class="form-control" name="giahoas" pattern="\d*" value="<?php echo $rowfix['gia_hoas'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Ảnh</label></td>
                            <td><input type="file" accept="image/png, image/jpeg, image/gif" class="form-control" name="anhhoas"></td>
                        </tr>
                        <tr>
                            <td><label for="">Thông tin</label></td>
                            <td><textarea required name="thongtin" class="form-control" style="min-height: 100px; resize: none;"><?php echo $rowfix['thongtin_hoas'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="">Loại hoa</label></td>
                            <td>
                                <select name="loaihoa" class="form-control" style="text-transform: capitalize;">
                                    <?php $qr = "select * from loaihoa";
                                    $kq = mysqli_query($con,$qr);
                                    foreach ($kq as $sel ) {
                                        if($sel['id_loaihoa'] == $rowfix['id_loaihoa'])
                                            echo "<option value='".$sel['id_loaihoa']."' selected>".$sel['ten_loaihoa']."</option>";
                                        else echo "<option value='".$sel['id_loaihoa']."'>".$sel['ten_loaihoa']."</option>";
                                    }
                                    ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Màu chủ đạo</label></td>
                            <td>
                                <select name="mauhoa" class="form-control" style="text-transform: capitalize;">
                                    <?php $qr1 = "select * from mauhoa";
                                    $kq = mysqli_query($con,$qr1);
                                    foreach ($kq as $sel ) {
                                        if($sel['idmauhoa'] == $rowfix['idmauhoa'])
                                            echo "<option value='".$sel['idmauhoa']."' selected>".$sel['mamau']."</option>";
                                        else echo "<option value='".$sel['idmauhoa']."'>".$sel['mamau']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Số lượng</label></td>
                            <td><input type="number" class="form-control" name="soluong" min="1" value="<?php echo $rowfix['soluong'] ?>" required></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                    <button type="submit" name="letfixsp" class="btn btn-success pull-right">Hoàn tất</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>