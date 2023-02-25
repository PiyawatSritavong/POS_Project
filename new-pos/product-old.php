<!-- get header.php -->
<?php
require 'header.php';
include 'barcode128.php';
$sql = "SELECT * FROM products";
$DB_recipt = $db_handle->runQuery($sql);
?>

<div class="d-none">
    <?php
    $name = $_POST["name"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $comment = $_POST["comment"];
    $e_name = $_POST["e_name"];
    $e_price = $_POST["e_price"];
    $e_qty = $_POST["e_qty"];
    $e_comment = $_POST["e_comment"];
    $value_pd_id = $_POST["value_id"];
    ?>
</div>

<?php
$sql_insert_pd = "INSERT INTO products (products.name, products.price, products.qty, products.comment) VALUES ('" . $name . "', $price, $qty, '" . $comment . "');";
$conn->query($sql_insert_pd);
/* 
$sql_last_id = "SELECT products.pd_id FROM products ORDER BY products.pd_id DESC LIMIT 1;";
$DB_pd_id = $db_handle->runQuery($sql_last_id);
$f_pd_id = ($DB_pd_id[0]['pd_id']);

$barcode = "<p class='show-barcode'>"
    . bar128(stripcslashes($f_pd_id))
    . "</p>";
$sql_insert_pd = "UPDATE products SET products.barcode = '" . $barcode . "' WHERE products.pd_id = '" . $f_pd_id . "';";
$conn->query($sql_insert_pd); */

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "edit":
            if (!empty($_POST["edit"])) {
                echo 'edit error';
            } else {
                $sql_update_pd = "UPDATE products SET products.name = '" . $e_name . "' ,products.price = $e_price ,products.qty = $e_qty, products.comment = '" . $e_comment . "' WHERE products.pd_id = '" . $value_pd_id . "';";
                $conn->query($sql_update_pd);
            }
            break;
        case "delete":
            if (!empty($_POST["delete"])) {
                echo 'delete error';
            } else {
                $sql_delete_pd = "DELETE FROM products WHERE products.pd_id = $value_pd_id;";
                $conn->query($sql_delete_pd);
            }
            break;
    }
}

function set_url($url)
{
    echo ("<script>history.replaceState({},'','$url');</script>");
}
set_url("http://localhost/pos/new-pos/product.php");

?>


<style>
    .show-barcode {
        display: inline-block;
        margin-right: 2%;
    }

    .bg-second {
        background-color: #252A3C !important;
    }
</style>

<div class="py-3">
    <div class="d-flex">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-green text-white border border-light w-100" type="submit">เพิ่มสินค้า</button>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-second text-white r-2">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">เพิ่มช้อมูลสินค้า</h1>
                <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="product.php" class="row" method="post">
                <div class="modal-body d-block mx-auto">
                    <div class="d-flex py-2">
                        <label class="px-5 d-block mx-auto" for="name">ชื่อ</label>
                        <input type="text" name="name" placeholder="กรุณาใส่ชื่อ" class="w-50 text-center form-control mx-3">
                    </div>
                    <div class="d-flex py-2">
                        <label class="px-5 d-block mx-auto" for="price">ราคา</label>
                        <input type="text" name="price" placeholder="กรุณาใส่ราคา" class="w-50 text-center form-control mx-3">
                    </div>
                    <div class="d-flex py-2">
                        <label class="px-5 d-block mx-auto" for="qty">จำนวน</label>
                        <input type="text" name="qty" placeholder="กรุณาใส่จำนวน" class="w-50 text-center form-control mx-3">
                    </div>
                    <div class="d-flex py-2">
                        <label class="px-5 d-block mx-auto" for="comment">comment</label>
                        <input type="text" name="comment" placeholder="เพิ่มรายละเอียด" class="w-50 text-center form-control mx-3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary me-5">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="r-2 ">
    <table class="table table-dark table-borderless table-hover bg-second r-2">
        <thead>
            <tr>
                <th scope="col" class="py-3 px-5">No</th>
                <th scope="col" class="py-3 px-5">ชื่อ</th>
                <th scope="col" class="py-3 px-5">ราคา</th>
                <th scope="col" class="py-3 px-5">จำนวนคงเหลือ</th>
                <th scope="col" class="py-3 px-5">รายละเอียด</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($DB_recipt)) {
                foreach ($DB_recipt as $key => $value) {
            ?>
                    <tr class="tablinks" onclick="openCity(event, '<?php echo $DB_recipt[$key]['pd_id']; ?>')">
                        <td class="py-3 px-5"><?php echo $DB_recipt[$key]["pd_id"]; ?></td>
                        <td class="py-3 px-5"><?php echo $DB_recipt[$key]["name"]; ?></td>
                        <td class="py-3 px-5"><?php echo $DB_recipt[$key]["price"]; ?></td>
                        <td class="py-3 px-5"><?php echo $DB_recipt[$key]["qty"]; ?></td>
                        <td class="py-3 px-5"><?php echo $DB_recipt[$key]["comment"]; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
</div>

<div class="col-6 col-md-4 bg-second min-vh-100 r-2 card text-white tab">
    <div class="card-header d-flex">
        <h4>
            รายการ
        </h4>
    </div>
    <div class="card-body mx-auto text-center">
        <?php
        if (!empty($DB_recipt)) {
            foreach ($DB_recipt as $key => $value) {
        ?>
                <table class="tabcontent table text-white table-borderless" id="<?php echo $DB_recipt[$key]["pd_id"]; ?>">
                    <tbody>
                        <tr>
                            <td><?php echo $DB_recipt[$key]["name"]; ?></td>
                        </tr>
                        <tr>
                            <td>บาร์โค๊ด
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <button data-bs-toggle="modal" data-bs-target="#edit" onclick="openCity(event, '<?php echo $DB_recipt[$key]['pd_id'] . 'edit'; ?>')" type="submit" name="edit" class="btn btn-primary tablinks">แก้ไข</button>
                                <form action="product.php" method="post">
                                    <input type="text" class="d-none" name="value_id" value="<?php echo $DB_recipt[$key]["pd_id"]; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger">ลบ</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
        <?php
            }
        }
        ?>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-second text-white r-2">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="editLabel">แก้ไขข้อมูลสินค้า</h1>
                <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            if (!empty($DB_recipt)) {
                foreach ($DB_recipt as $key => $value) {
            ?>
                    <form action="product.php" class="row tabcontent" method="post" id="<?php echo $DB_recipt[$key]["pd_id"] . 'edit'; ?>">
                        <div class="modal-body d-block mx-auto">
                            <div class="d-flex py-2">
                                <label class="px-5 d-block mx-auto" for="e_name">ชื่อ</label>
                                <input type="text" name="e_name" value="<?php echo $DB_recipt[$key]["name"]; ?>" placeholder="กรุณาใส่ชื่อ" class="w-50 text-center form-control mx-3">
                            </div>
                            <div class="d-flex py-2">
                                <label class="px-5 d-block mx-auto" for="e_price">ราคา</label>
                                <input type="text" name="e_price" value="<?php echo $DB_recipt[$key]["price"]; ?>" placeholder="กรุณาใส่ราคา" class="w-50 text-center form-control mx-3">
                            </div>
                            <div class="d-flex py-2">
                                <label class="px-5 d-block mx-auto" for="e_qty">จำนวน</label>
                                <input type="text" name="e_qty" value="<?php echo $DB_recipt[$key]["qty"]; ?>" placeholder="กรุณาใส่จำนวน" class="w-50 text-center form-control mx-3">
                            </div>
                            <div class="d-flex py-2">
                                <label class="px-5 d-block mx-auto" for="e_comment">comment</label>
                                <input type="text" name="e_comment" value="<?php echo $DB_recipt[$key]["comment"]; ?>" placeholder="เพิ่มรายละเอียด" class="w-50 text-center form-control mx-3">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="text" class="d-none" name="value_id" value="<?php echo $DB_recipt[$key]["pd_id"]; ?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" name="edit" class="btn btn-primary me-5">ยืนยัน</button>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<?php require 'footer.php'; ?>
<!-- get footer.php -->