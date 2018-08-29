window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });

}, 3000);

function load_ajax(){
    $.ajax({
        url : "source/checkmail.php",
        type : "post",
        dataType:"text",
        data : {
            email : $('#email').val()
        },
        success : function (result){
            $('#result').html(result);
        }
    });
}
function load_ajax1(){
    $.ajax({
        url : "source/checkuser.php",
        type : "post",
        dataType:"text",
        data : {
            user1 : $('#username').val()
        },
        success : function (result){
            $('#result1').html(result);
        }
    });
}
function ajax_container(theloai,id){
    $.ajax({
        url : "source/load-container.php",
        type : "post",
        dataType:"text",
        data : {
            sended : theloai,
            id : id
        },
        success : function (result){
            $('#container').html(result);
        }
    });
}

function ajax_cart(id,minus,removep,tt){
    $.ajax({
        url : "source/update_cart.php",
        type : "post",
        dataType:"text",
        data : {
            id : id,
            minus : minus,
            removep : removep,
            tt : tt
        },
        success : function (result){
            $('#reload_cart').html(result);
        }
    });
}

function ajax_payment(theform){

    if (document.all || document.getElementById) {
        for (i = 0; i < theform.length; i++) {
            var formElement = theform.elements[i];
            if (true) {
                formElement.disabled = true;
            }
        }
    }

    $.ajax({
        url : "source/payment_1.php",
        type : "post",
        dataType:"text",
        data : {
            pm_ten : $('#pm_ten').val(),
            pm_add : $('#pm_add').val(),
            pm_tel : $('#pm_tel').val()
        },
        success : function (result){
            $('#pm_2').html(result);
        }
    });

    return false;
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

