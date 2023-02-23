<?php
include("./connection.php");
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        .footer__item-icon:nth-child(1){
    background-color: #fff !important;
}
.footer__item-icon:nth-child(3) a{
    color: #fff !important;
}
    </style>

<?php
include "./header.php";
?>

<body>
    <!-- header_nabbar -->
    <?php include "./header_navbar.php"; ?>
    <!-- end header_navbar -->

    <!-- slider  -->
    <?php
    if (isset($_GET["page"])) { ?>
        <div class="mt-94"></div>
    <?php } else { ?>
        <div class="mt-94"></div>

    <?php  }

    ?>
    <!-- end slider  -->


    <!-- list product  -->
    <div class="container-fluid" id="sanpham">
        <div class="container pt-5">
            <?php

            if (isset($_GET["page"])) {
                $page = $_GET["page"];
                $file = "" . $page . ".php";
                if (file_exists($file)) {
                    include $file;
                }
            } else {
                include("./homePage.php");
            }
            ?>




        </div>


    </div>




    <!-- footer  -->
    <?php include "./footer.php"; ?>
    <!-- end footer -->

    <!-- start modal -->
    <!-- <div class="modal111" id="modal111" onclick="none_modal('modal111')">
        <div class="display_add-item">
            <i class="icon_modal fa-solid fa-xmark" onclick="none_modal('modal111')"></i>
            Thêm vào giỏ hàng thành công
            <div class="img_info-modal">
                <img src="./assets/img/banchay/sub/img41.webp" alt="">
                <div class="info-model">
                    <p>ESSENTIAL TEE 1.O</p>
                    <p style="color: red;">99.000đ</p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end modal -->




    <!-- <script src="./jquery.js"></script> -->
    <script src="./web.js"></script>
    <script src="./javascript.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // $('.update_quantity').blur(function(){
        //     const pro_id = $(this).attr('id');
        //     const quantity = $(this).val();
        //     $.get({
        //         url:"update_cart.php",
        //         data: {pro_id:pro_id,quantity:quantity},
        //         success: function(data){
        //             location.reload();
        //         }
        //     })
        // });

        $(document).ready(function(){
            $('.update_cart').blur(function(){
                const quantity = $(this).val();
                const id_cart = $(this).attr('id');
                $.get({
                url:"./update_cart.php",
                data: {id_cart:id_cart,quantity:quantity},
                success: function(data){
                    location.reload();
                }
            });
            });
        });
    </script>
</body>

</html>