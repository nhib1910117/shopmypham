<div class="col-md-12 col-sm-6  ">
    <div class="x_panel">
        <div class="x_title">
            <h2 style="margin-top: 20px;font-weight: 500;color: rgb(43 48 90);">Danh sách sản phẩm</h2>

            <!-- <div class="clearfix"></div> -->


        </div>
        <div class="x_content">
            <?php
            if (isset($_GET['delete']) && isset($_GET["id"])) {
               
                $pro_id = $_GET["id"];
                $sql = "delete from tbl_product where pro_id = '$pro_id' ";
                mysqli_query($conn, $sql) or die("Loi cau lenh xoa pro");
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th></th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Thương hiệu</th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql_select_pro = "select * from tbl_product";
                    $i = 0;
                    $result_select_pro = mysqli_query($conn, $sql_select_pro);
                    if (mysqli_num_rows($result_select_pro) > 0) {
                        while ($row = mysqli_fetch_assoc($result_select_pro)) {
                            $i++ ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td>
                                    <a href="./index.php?page=product&delete=1&id=<?php echo $row["pro_id"]  ?>" onclick="return confirm('Bạn chắc chắn xóa danh mục này?')">Xóa</a>
                                    <a href="./index.php?page=add_product&edit=1&id=<?php echo $row["pro_id"]  ?>">Sửa</a>
                                </td>
                                <td><?php echo $row["pro_name"] ?></td>
                                <td><?php echo number_format($row["pro_price"]) ?>đ</td>
                                <td>
                                    <?php

                                    $size_id = $row["size_id"];
                                    $sql_select_size = "select * from tbl_size where size_id = '$size_id'";
                                    $result_select_size = mysqli_query($conn, $sql_select_size);
                                    $row_select = mysqli_fetch_assoc($result_select_size);
                                    echo $row_select["size_name"];
                                    ?>
                                </td>
                                <td><img width="50" height="50" style="object-fit:cover;" src="../uploads/<?php echo $row["image"] ?>"></td>
                                <td>
                                    <?php
                                    $cat_id = $row["cat_id"];
                                    $sql_select_cat = "select * from tbl_category where cat_id = '$cat_id'";
                                    $result_select_cat = mysqli_query($conn, $sql_select_cat);
                                    $row_select_cat = mysqli_fetch_assoc($result_select_cat) or die("loi cau lenh select cat");
                                    echo $row_select_cat["cat_name"];
                                    ?>
                                </td>
                                <td><?php echo $row["description"] ?></td>
                                <td>
                                    <?php

                                    if ($row["pro_status"] == 1) {
                                        echo "Hiển thị";
                                    } else echo "Ẩn";
                                    ?>
                                </td>
                                <td><?php echo $row["pro_date_create"] ?></td>
                            </tr>
                    <?php }
                    }  ?>

                </tbody>
            </table>

        </div>
    </div>
</div>