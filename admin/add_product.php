<?php 
ob_start();
?>
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tạo sản phẩm mới</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php
            if (isset($_POST["addPro"])) {
                $pro_name = $_POST["pro_name"];
                $pro_price = $_POST["pro_price"];
                $size_id = $_POST["size_id"];
                $quantity = $_POST["quantity"];
                // $image = $_POST["image"];
                $cat_id = $_POST["cat_id"];
                $pro_status = $_POST['pro_status'];
                $description = $_POST["description"];
                $pro_date_create = date("Y-m-d H:i:s");

                $path = "uploads/";
                $fileName = "";
                if (isset($_FILES["image"])) {
                    if (isset($_FILES["image"]["name"])) {
                        if ($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png") {
                            if ($_FILES["image"]["size"] < 24000000) {
                                if ($_FILES['image']["error"] == 0) {
                                    if (move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $path . $_FILES["image"]["name"])) {
                                        $fileName = $_FILES["image"]["name"];
                                    } else echo "upload that bai";
                                } else echo "file co loi";
                            } else echo "Loi kich thuoc lon";
                        } else echo "Loi dinh dang";
                    }
                }
                $image = $fileName;
                // INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_price`, `size_id`, `quantity`, `image`, `cat_id`, `description`, `pro_status`, `pro_date_create`) 
                // VALUES (NULL, 'tee12', '12', '4', '12', '1212', '11', 'gdfgfg', '1', '2022-05-12 19:36:13.000000');
                $sql_insert_pro = "insert into tbl_product values('','$pro_name','$pro_price','$size_id','$quantity','$image','$cat_id','$description','$pro_status','$pro_date_create')";
                mysqli_query($conn, $sql_insert_pro) or die("Loi lenh update");
                header('localtion: ./index.php?page=product');
            }elseif(isset($_POST['updatePro'])){
                    $pro_id = $_POST['pro_id'];
                    $sql_select_pro_edit = "select * from tbl_product where pro_id = '$pro_id'";
                    $result_select_pro_edit = mysqli_query($conn,$sql_select_pro_edit);
                    $row_select_pro_edit = mysqli_fetch_assoc($result_select_pro_edit);
                    
                    $pro_name = isset($_POST["pro_name"])?$_POST["pro_name"]:$row_select_pro_edit['pro_name'];
                    $pro_price = isset($_POST["pro_price"])?$_POST["pro_price"]:$row_select_pro_edit['pro_price'];
                    $size_id = isset($_POST["size_id"])?$_POST["size_id"]:$row_select_pro_edit['size_id'];
                    $quantity = isset($_POST["quantity"])?$_POST["quantity"]:$row_select_pro_edit['quantity'];
                    // $image = $_POST["image"];
                    $cat_id = isset($_POST["cat_id"])?$_POST["cat_id"]:$row_select_pro_edit['cat_id'];
                    $pro_status = $_POST['pro_status']?1:0;
                    $description = isset($_POST["description"])?$_POST["description"]:$row_select_pro_edit['description'];
                    $path = "uploads/";
                    $fileName = "";
                    
                    if (isset($_FILES['image'])  && $_FILES["image"]["name"]!="") {
                        if (isset($_FILES["image"]["name"])) {
                            if ($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png") {
                                if ($_FILES["image"]["size"] < 24000000) {
                                    if ($_FILES['image']["error"] == 0) {
                                        if (move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $path . $_FILES["image"]["name"])) {
                                            $fileName = $_FILES["image"]["name"];
                                            $image_edit = $fileName;
                                           
                                        } else echo "upload that bai";
                                    } else echo "file co loi";
                                } else echo "Loi kich thuoc lon";
                            } else echo "Loi dinh dang 123";
                        }
                    }
                    $image = isset($image_edit)?$image_edit:$row_select_pro_edit['image'];
                    
                    $sql_update_pro = "update tbl_product set pro_name ='$pro_name', pro_price = '$pro_price', size_id = '$size_id', quantity = '$quantity', cat_id = '$cat_id', pro_status = '$pro_status',description='$description', image = '$image' where pro_id = '$pro_id'";
                    // echo $sql_update_pro;
                    // die();
                    mysqli_query($conn, $sql_update_pro) or die("Loi lenh update");
                    header('location: ./index.php?page=product');
                }
            ?>
            <br>
            <?php 
                if(isset($_GET['edit']) && isset($_GET['id'])){
                    $id_pro = $_GET['id'];
                    $sql_select_pro_edit = "select * from tbl_product where pro_id = '$id_pro'";
                    $result_select_pro_edit = mysqli_query($conn,$sql_select_pro_edit);
                    $row_select_pro_edit = mysqli_fetch_assoc($result_select_pro_edit);
                    
                }
            ?>
            <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Nhập tên sản phẩm</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control" value="<?php echo isset($row_select_pro_edit)?$row_select_pro_edit['pro_name']:'' ?>" placeholder="" name="pro_name" id="pro_name">
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Nhập giá</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="number" class="form-control" value="<?php echo isset($row_select_pro_edit)?$row_select_pro_edit['pro_price']:'' ?>" placeholder="" name="pro_price" id="pro_price">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 " style="font-size: 16px;">Thương hiệu</label>
                    <div class="col-md-9 col-sm-9 ">
                        <select class="form-control" name="size_id" id="size_id">
                            <option>-- Chọn thương hiệu --</option>
                            <?php
                            $sql_select_size = "select * from tbl_size";
                            $i = 0;
                            $result_select_size = mysqli_query($conn, $sql_select_size);
                            if (mysqli_num_rows($result_select_size) > 0) {
                                while ($row = mysqli_fetch_assoc($result_select_size)) {
                                    $i++ ?>
                                    <option <?php echo (isset($row_select_pro_edit) && $row_select_pro_edit['size_id'] == $row['size_id'])?'selected':'' ?> value="<?php echo $row["size_id"] ?>"><?php echo $row["size_name"] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Nhập số lượng</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="number" class="form-control" value="<?php echo isset($row_select_pro_edit)?$row_select_pro_edit['quantity']:'' ?>" placeholder="" name="quantity" id="quantity">
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Ảnh</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="file" class="" name="image" id="image" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 " style="font-size: 16px;">Danh mục</label>
                    <div class="col-md-9 col-sm-9 ">
                        <select class="form-control" name="cat_id" id="cat_id">
                            <option>-- Chọn danh mục --</option>

                            <?php
                            $sql_select_cat = "select * from tbl_category";
                            $i = 0;
                            $result_select_pro = mysqli_query($conn, $sql_select_cat);
                            if (mysqli_num_rows($result_select_pro) > 0) {
                                while ($row = mysqli_fetch_assoc($result_select_pro)) {
                                    $i++ ?>
                                    <option  <?php echo isset($row_select_pro_edit) && ($row_select_pro_edit['cat_id']==$row['cat_id'])?'selected':'' ?> value="<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Trạng thái sản phẩm</label>
                    <div class="col-md-9 col-sm-9">
                        
                        <select class="form-control" name="pro_status">
                            <option value="1">-- Ẩn/Hiện sản phẩm --</option>
                            <option <?php if(isset($row_select_pro_edit) && $row_select_pro_edit['pro_status']==1){ ?>
                            selected
                            <?php } ?> value="1">Hiển thị sản phẩm</option>
                            <option value="0">Ẩn sản phẩm</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Mô tả sản phẩm</label>
                    <div class="col-md-9">
                        <textarea id="message" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"><?php echo isset($row_select_pro_edit) && isset($row_select_pro_edit['description'])?$row_select_pro_edit['description']:'' ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <button type="button" class="btn btn-primary">Cancel</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <?php 
                            if(isset($row_select_pro_edit)){
                                ?>
                                <input type="hidden" name='pro_id' value="<?php echo $row_select_pro_edit['pro_id'] ?>"> 
                            <button type="submit" class="btn btn-success" name="updatePro">Submit</button>
                        <?php }else{ ?>
                            <button type="submit" class="btn btn-success" onclick="return alert('Thêm mới thành công')" name="addPro">Submit</button>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>