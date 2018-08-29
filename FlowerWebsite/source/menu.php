<ul class="list-group" style="margin: 0 5px 5px 0;">
    <li class="list-group-item text-center" style="background-color: #c4e3f3;">DANH MỤC</li>
    <li class="list-group-item">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="index.php"  style="text-decoration: none;">
                            <span class="glyphicon glyphicon-home"></span> Trang chủ
                        </a>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="text-decoration: none;">
                            <span class="glyphicon glyphicon-th-large"></span> Hoa theo chủ đề</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <?php
                            $chude = mysqli_query($con,"select * from loaihoa");
                            foreach ($chude as $row)
                            {
                                ?>
                                <tr>
                                    <td>
                                        <button class="btn btn-link btn-menusec" value="loaihoa" onclick="ajax_container('loaihoa',<?php echo $row['id_loaihoa']; ?>)"><a style="text-transform: capitalize;"><?php echo $row['ten_loaihoa']; ?></a></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="text-decoration: none;">
                            <span class="glyphicon glyphicon-th-large"></span> Hoa tươi</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <?php
                            $hoatuoi = mysqli_query($con,"select * from tenloaihoa");
                            foreach ($hoatuoi as $row)
                            {
                                ?>
                                <tr>
                                    <td>
                                        <button class="btn btn-link btn-menusec" value="tenhoa" onclick="ajax_container('tenhoa',<?php echo $row['id_tenhoa']; ?>)"><a style="text-transform: capitalize;"><?php echo $row['tenhoa']; ?></a></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="text-decoration: none;">
                            <span class="glyphicon glyphicon-th-large"></span> Hoa theo màu</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <?php
                            $hoatuoi = mysqli_query($con,"select * from mauhoa");
                            foreach ($hoatuoi as $row)
                            {
                                ?>
                                <tr>
                                    <td>
                                        <button class="btn btn-link btn-menusec" value="mauhoa" onclick="ajax_container('mauhoa',<?php echo $row['idmauhoa']; ?>)"><a style="text-transform: capitalize;"><?php echo $row['mamau']; ?></a></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <a href="#footerjump" style="text-decoration: none;" ><span class="glyphicon glyphicon glyphicon-phone-alt"></span> Liên Hệ</a>
        <a class="pull-right" href="?gioithieu" style="text-decoration: none;" ><span class="glyphicon glyphicon-exclamation-sign"></span> Giới thiệu</a>
    </li>
</ul>