<div class="row">
    <?php
    $sql_select_pro = "select * from tbl_product";

    $result_select_pro = mysqli_query($conn, $sql_select_pro);
    if (mysqli_num_rows($result_select_cat) > 0) {
        while ($rowPro = mysqli_fetch_assoc($result_select_pro)) {
    ?>
            <div class="col-lg-3 display-block" style="margin-bottom: 50px;  margin-top: 100px;">
                <div class="card card-product">
                    <a href="./index.php?page=detailtPro&id=<?php echo $rowPro["pro_id"] ?>" class="relative item__sale cover_img">
                        <div class="cover_img">
                            <img class="img_pro" height='300' src="./uploads/<?php echo $rowPro["image"] ?>" class="" alt="...">
                        </div>
                    </a>
                    <div class="card-body" >
                        <a href="./index.php?page=detailtPro&id=<?php echo $rowPro["pro_id"] ?>" class="card-name">
                            <h5 class="card-title text-uppercase"><?php echo $rowPro["pro_name"] ?></h5>
                        </a>
                        <p style="color: #000; text-align: center; font-weight: 500;"><?php echo number_format($rowPro["pro_price"])  ?>đ </p>
                        <a href="./index.php?page=detailtPro&id=<?php echo $rowPro["pro_id"] ?>" class="btn" style="border: none; color: #fff;outline: none;background-color: #4aa2bb;margin-left: 50px;">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</div>