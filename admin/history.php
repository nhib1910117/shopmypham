<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">

            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Thời gian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_select_order = "select * from tbl_order";
                    $i = 0;
                    $result_select_order = mysqli_query($conn, $sql_select_order);
                    $row_select_order = mysqli_fetch_assoc($result_select_order);
                    while ($row_select_order = mysqli_fetch_assoc($result_select_order)) {
                        $i = $i + 1;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $row_select_order["user_name"] ?></td>
                            <td><?php echo $row_select_order["user_adress"] ?></td>
                            <td><?php echo $row_select_order["user_phone"] ?></td>
                            <td><?php echo $row_select_order["order_date_create"] ?></td>
                            <td>
                                <button class="btn btn--primary" style="background-color: #dadadd;"><a href="index.php?page=detail_order&order_id=<?php echo $row_select_order["order_id"] ?>">Xem chi tiết</a></button>
                            </td>
                        </tr>
                    <?php  }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</div>