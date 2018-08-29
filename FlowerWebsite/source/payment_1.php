<?php

if(isset($_POST['pm_ten'])) {
    ?>
    <script>

        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });

        function ajax_payment1(theform){

            if (document.all || document.getElementById) {
                for (i = 0; i < theform.length; i++) {
                    var formElement = theform.elements[i];
                    if (true) {
                        formElement.disabled = true;
                    }
                }
            }

            $.ajax({
                url : "source/payment_2.php",
                type : "post",
                dataType:"text",
                data : {
                    pm_radio : $('#pm_radio:checked').val(),
                    pm_add2 : $('#pm_add2').val(),
                    pm_ten : $('#pm_ten').val(),
                    pm_add : $('#pm_add').val(),
                    pm_tel : $('#pm_tel').val()
                },
                success : function (result){
                    $('#pm_3').html(result);
                }
            });
            return false;
        }

        $(".pm_radio3").click(function() {
                $("#pm_add2").prop("required", true);
                $("#pm_add2").prop("disabled", false);
                $("#pm_add2").focus();
        });
        $(".pm_radio").click(function() {
            $("#pm_add2").prop("required", false);
            $("#pm_add2").prop("disabled", true);
        });


    </script>
    <h3><span class="label label-primary" style="margin-bottom: 10px">2. Phương thức thanh toán</span></h3> <br/>
    <form action="" method="post" onsubmit="return ajax_payment1(this)">
        <div class="radio">
            <label><input class="pm_radio" type="radio" name="optradio" id="pm_radio" value="1" required>Thanh toán trực tiếp tại shop</label>
        </div>

        <div class="1 box">Địa chỉ: 140 Lê Trọng Tấn,Tây Thạnh, Tân Phú, Tp.Hồ Chí Minh (24/7).</div>

        <div class="radio">
            <label>
                <input class="pm_radio" type="radio" name="optradio" id="pm_radio" value="2" required>Thanh toán khi nhận hoa</label>
        </div>

        <div class="2 box">Chúng tôi hỗ trợ phương thức thanh toán COD (Cash on Delivery) - thanh toán tiền mặt khi giao hoa trong trường hợp bạn là người đặt và người nhận hoa, nhằm hỗ trợ tối đa việc đặt và nhận hàng.</div>

        <div class="radio">
            <label><input class="pm_radio3" type="radio" name="optradio" id="pm_radio" value="3" onclick="enable_add2(this)" required>Thu tiền ở địa điểm khác</label>
        </div>

        <div class="3 box"><label>Địa chỉ thanh toán:</label>
            <textarea name="diachithanhtoan" class="form-control" id="pm_add2"></textarea>
            Trong trường hợp bạn không phải người nhận hoa để thanh toán tiền mặt khi nhận hoa, bạn cũng không thể chuyển khoản hoặc đến shop để thanh toán, chúng tôi hỗ trợ giao hoa và thu tiền ở 2 địa điểm khác nhau.</div>

        <div class="radio">
            <label> <input class="pm_radio" type="radio" name="optradio" id="pm_radio" value="4" required>Chuyển khoản ngân hàng</label>
        </div>

        <div class="4 box">
            <p><b>Ngân hàng TMCP Ngoại Thương Việt Nam</b></p>
            <p>Chủ tài khoản: TRAN MINH TIEN<br />
                Số Tài Khoản: 0512 020 458 822</p>
            <p><b>Ngân hàng thương mại cổ phần Á Châu</b></p>
            <p>Chủ tài khoản: NGUYEN QUOC DAT<br />
                Số Tài Khoản: 512 020 635</p>
        </div>
        <hr/>
        <button class="btn btn-primary pull-right next-but" type="submit">Tiếp theo <span class="glyphicon glyphicon-chevron-right"></span></button>
    </form>
<?php

}

?>