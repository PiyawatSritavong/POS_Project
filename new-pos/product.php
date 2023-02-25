<?php
include 'barcode128.php';
require 'db_con.php';
require_once("dbcontroller.php");
$db_handle = new DBController();

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
        case "qty_barcode":
            if (!empty($DB_recipt)) {
                foreach ($DB_recipt as $key => $value) {
                    for ($i = 1; $i <= $_POST['qty_barcode']; $i++) {
                        echo "<body onload='window.print();'><p class='show-barcode'>"
                            . bar128(stripcslashes($DB_recipt[$key]['pd_id']))
                            . "</p></body>";
                    }
                }
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

<link rel="stylesheet" href="bootstrap-5.2.3/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap-5.2.3/css/bootstrap-grid.css">
<script src="bootstrap-5.2.3/js/bootstrap.js"></script>

<style>
    body {
        background-color: #11131b !important;
    }

    .container {
        --bs-gutter-x: 0;
        --bs-gutter-y: 0;
        width: 100%;
        padding-right: calc(var(--bs-gutter-x) * 0.5);
        padding-left: calc(var(--bs-gutter-x) * 0.5);
        margin-right: auto;
        margin-left: auto;
        max-width: 1500px !important;
    }

    .show-barcode {
        display: inline-block;
        margin-right: 2%;
    }

    .bg-second {
        background-color: #252A3C !important;
    }

    *,
    *::before,
    *::after {
        box-sizing: unset !important;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        margin-top: -55px;
    }

    .darkNav {
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.6);
        height: auto;
        width: 100%;
        z-index: 1;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 50px;
        left: 140px;
        font-size: 36px;
        margin-left: 50px;
        color: #fff;
    }
</style>

<body>
    <div class="container">
        <div class="row pt-2">
            <div class="col text-white">
                <nav class="navbar navbar-dark justify-content-start">

                    <button class="btn btn-dark bg-second" type="button" onclick="openNav()">
                        <span style="font-size:22px;cursor:pointer">&#9776; </span>
                    </button>

                    <div id="mySidenav" class="sidenav d-flex">
                        <div id="tureNav" class="bg-second">
                            <h3 class="text-center py-4">
                                เมนู
                            </h3>
                            <a class="text-white d-flex" aria-current="page" href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="me-3 bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                </svg>
                                <h5>
                                    หน้าหลัก
                                </h5>
                            </a>
                            <a class="text-white d-flex" href="sale.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="me-3 bi bi-bar-chart-fill" viewBox="0 0 16 16">
                                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                                </svg>
                                <h5>
                                    ยอดขาย
                                </h5>
                            </a>
                            <a class="text-white d-flex" href="product.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="me-3 bi bi-database-fill-lock" viewBox="0 0 16 16">
                                    <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                                    <path d="M3.904 9.223C2.875 8.755 2 8.007 2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-1.364-.125 2.988 2.988 0 0 0-2.197.731 4.525 4.525 0 0 0-1.254 1.237A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777ZM8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.09 0 .178 0 .266-.003A1.99 1.99 0 0 1 8 15v-1Zm0-1.5c0 .1.003.201.01.3A1.9 1.9 0 0 0 8 13c-1.573 0-3.022-.289-4.096-.777C2.875 11.755 2 11.007 2 10v-.839c.457.432 1.004.751 1.49.972C4.722 10.693 6.318 11 8 11c.086 0 .172 0 .257-.002A4.5 4.5 0 0 0 8 12.5Z" />
                                    <path d="M9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                                </svg>
                                <h5>
                                    ข้อมูลสินค้า
                                </h5>
                            </a>
                        </div>

                        <div id="darkNav" class="darkNav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        </div>
                    </div>

                    <h1 class="ps-5 pe-3">
                        ไจ๊เฮง
                    </h1>
                    <h3 class="pt-2">
                        <?php echo "วันที่ " . date("d-m-Y"); ?>
                    </h3>
                </nav>

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
                                        <label class="d-block mx-auto" for="name">ชื่อ</label>
                                        <input type="text" name="name" placeholder="กรุณาใส่ชื่อ" class="w-50 text-center form-control me-5">
                                    </div>
                                    <div class="d-flex py-2">
                                        <label class="d-block mx-auto" for="price">ราคา</label>
                                        <input type="text" name="price" placeholder="กรุณาใส่ราคา" class="w-50 text-center form-control me-5">
                                    </div>
                                    <div class="d-flex py-2">
                                        <label class="d-block mx-auto" for="qty">จำนวน</label>
                                        <input type="text" name="qty" placeholder="กรุณาใส่จำนวน" class="w-50 text-center form-control me-5">
                                    </div>
                                    <div class="d-flex py-2">
                                        <label class="d-block mx-auto" for="comment">comment</label>
                                        <input type="text" name="comment" placeholder="เพิ่มรายละเอียด" class="w-50 text-center form-control me-5">
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

                <div class="r-2">
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

            <div class="col-sm-4 col-md-4 min-vh-100 r-2 card bg-second text-white">
                <div class="card-header d-flex">
                    <h4>
                        รายการ
                    </h4>
                </div>
                <div class="card-body">
                    <div class="w-100">
                        <?php
                        if (!empty($DB_recipt)) {
                            foreach ($DB_recipt as $key => $value) {
                        ?>
                                <div class="tabcontent text-white mx-auto w-100" id="<?php echo $DB_recipt[$key]["pd_id"]; ?>">
                                    <div class="bg-light pt-4 pb-4 r-2 w-100 text-center">
                                        <p class="text-dark"><?php echo $DB_recipt[$key]["name"]; ?></p>
                                        <?php
                                        echo "<p class='show-barcode'>"
                                            . bar128(stripcslashes($DB_recipt[$key]["pd_id"]))
                                            . "</p>";
                                        ?>
                                    </div>
                                    <form action="product.php?action=delete" class="w-100 d-flex me-4 mt-4" method="post">
                                        <input type="text" class="d-none" name="value_id" value="<?php echo $DB_recipt[$key]["pd_id"]; ?>">
                                        <button class="btn btn-yellow text-white tablinks w-100 me-1" data-bs-toggle="modal" data-bs-target="#edit" onclick="openCity(event, '<?php echo $DB_recipt[$key]['pd_id'] . 'edit'; ?>')" type="button">แก้ไข</button>
                                        <button type="submit" name="delete" class="btn btn-danger w-100 ms-1">ลบ</button>
                                    </form>
                                    <form action="print.php" target="_blank" method="post" class="mt-5 me-4">
                                        <label for="qty_barcode" class="mt-5">
                                            <h4>จำนวนที่ต้องการพิมบาร์โค๊ด</h4>
                                        </label>
                                        <input type="number" name="qty_barcode" class="py-3 my-2 text-center form-control bg-white border border-dark text-dark" placeholder="กรุณาใส่จำนวนที่ต้องการพิมบาร์โค๊ด">
                                        <input type="text" name="pd_id" value="<?php echo $DB_recipt[$key]["pd_id"]; ?>" class="d-none">
                                        <button class="btn btn-primary text-white py-2 w-100" type="submit">พิมบาร์โค๊ด</button>
                                    </form>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
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
                                <form action="product.php?action=edit" class="row tabcontent" method="post" id="<?php echo $DB_recipt[$key]["pd_id"] . 'edit'; ?>">
                                    <div class="modal-body d-block mx-auto">
                                        <div class="d-flex py-2">
                                            <label class="px-5 d-block mx-auto" for="e_name">ชื่อ</label>
                                            <input type="text" name="e_name" value="<?php echo $DB_recipt[$key]["name"]; ?>" placeholder="กรุณาใส่ชื่อ" class="w-50 text-center form-control me-5">
                                        </div>
                                        <div class="d-flex py-2">
                                            <label class="px-5 d-block mx-auto" for="e_price">ราคา</label>
                                            <input type="text" name="e_price" value="<?php echo $DB_recipt[$key]["price"]; ?>" placeholder="กรุณาใส่ราคา" class="w-50 text-center form-control me-5">
                                        </div>
                                        <div class="d-flex py-2">
                                            <label class="px-5 d-block mx-auto" for="e_qty">จำนวน</label>
                                            <input type="text" name="e_qty" value="<?php echo $DB_recipt[$key]["qty"]; ?>" placeholder="กรุณาใส่จำนวน" class="w-50 text-center form-control me-5">
                                        </div>
                                        <div class="d-flex py-2">
                                            <label class="px-5 d-block mx-auto" for="e_comment">comment</label>
                                            <input type="text" name="e_comment" value="<?php echo $DB_recipt[$key]["comment"]; ?>" placeholder="เพิ่มรายละเอียด" class="w-50 text-center form-control me-5">
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

        </div>
    </div>

    <nav class="navbar navbar-dark bg-second fixed-bottom">
        <div class="container ms-5 ps-5">
            <ul class="nav ms-5 ps-5">
                <li class="nav-item ms-5 ps-5">
                    <a class="nav-link text-white" href="index.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="barcode.php">สร้างบาร์โค๊ด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="receipt.php">รวมใบเสร็จ</a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        function print_barcode() {
            window.print();
        }

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

        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
            document.getElementById("tureNav").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>