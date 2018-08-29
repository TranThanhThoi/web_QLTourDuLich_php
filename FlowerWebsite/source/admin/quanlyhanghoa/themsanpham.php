<style>
    .tb-su {
        width: 100%;
    }
    .form-control {
        margin-bottom: 5px;
    }
    .first-tb {
        margin-top: 10px;
    }
</style>

<?php

function xoa_dau ($str){
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}

if(isset($_POST['letadd']))
{
    $ten_hoas = $_POST['tenhoas'];
    $gia_hoas = $_POST['giahoas'];
    if(isset($_FILES['anhhoas'])) {
        $file_name = str_replace(" ","",xoa_dau($ten_hoas).'.jpg');
        $file_tmp = $_FILES['anhhoas']['tmp_name'];
        if(move_uploaded_file($file_tmp,"../../img/hoas/".$file_name))
            $anh_hoas = "img/hoas/".$file_name."";
    }
    else {
        return;
    }
    $thong_tin = $_POST['thongtin'];
    $loai_hoa = $_POST['loaihoa'];
    $mau_hoa = $_POST['mauhoa'];
    $so_luong = $_POST['soluong'];
    $qr = "INSERT INTO hoas (ten_hoas, gia_hoas, anh_hoas, thongtin_hoas, id_loaihoa, idmauhoa, soluong) VALUES ('$ten_hoas', '$gia_hoas', '$anh_hoas', '$thong_tin', '$loai_hoa', '$mau_hoa', $so_luong)";
    if(mysqli_query($con,$qr)) {
        $qr1 = "UPDATE hoas SET id_ct_hoas = id_hoas WHERE anh_hoas = '$anh_hoas'";
        mysqli_query($con,$qr1);
        echo '<script> alert("Thêm hoa thành công!"); </script>';
        echo "<script>location.href='?p=hang-hoa'</script>";
    }
    else echo "FALSE";
}
?>

<ul class="dropdown-menu" role="menu" style="width: 50%">
    <li>
        <form action="index.php?p=hang-hoa" method="post" enctype="multipart/form-data">
            <div class="container" style="width: 100%">
                <table class="tb-su">
                    <tr>
                        <td style="width: 20%"><label for="">Tên hoa</label></td>
                        <td style="width: 80%"><input type="text" class="form-control first-tb" name="tenhoas" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Giá</label></td>
                        <td><input type="text" class="form-control" name="giahoas" pattern="\d*" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Ảnh</label></td>
                        <td><input type="file" accept="image/png, image/jpeg, image/gif" class="form-control" name="anhhoas" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Thông tin</label></td>
                        <td><textarea required name="thongtin" class="form-control" style="min-height: 100px; resize: none;"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="">Loại hoa</label></td>
                        <td>
                            <select name="loaihoa" class="form-control" style="text-transform: capitalize;">
                                <?php $qr = "select * from loaihoa";
                                        $kq = mysqli_query($con,$qr);
                                        foreach ($kq as $sel ) {
                                            echo "<option value='".$sel['id_loaihoa']."'>".$sel['ten_loaihoa']."</option>";
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
                                                echo "<option value='".$sel['idmauhoa']."'>".$sel['mamau']."</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Số lượng</label></td>
                        <td><input type="number" class="form-control" name="soluong" min="1" required></td>
                    </tr>
                </table>
                <button type="submit" name="letadd" class="btn btn-success pull-right">Hoàn tất</button>
            </div>
        </form>
    </li>
</ul>