<!-- get header.php -->
<?php
require 'header.php';

$sql_od = "SELECT * FROM order_details ORDER BY order_details.od_id DESC;";
$DB_recipt = $db_handle->runQuery($sql_od);

?>

<h1 class="text-center my-5">
    ใบเสร็จ
</h1>
<!-- all item -->
<div class="mb-5 pb-5 mt-2">
    <table class="table table-dark table-borderless table-hover bg-second r-2">
        <thead>
            <tr>
                <th scope="col" class="py-3 px-5">No</th>
                <th scope="col" class="py-3 px-5">cash</th>
                <th scope="col" class="py-3 px-5">discount</th>
                <th scope="col" class="py-3 px-5">total</th>
                <th scope="col" class="py-3 px-5">change</th>
                <th scope="col" class="py-3 px-5">status</th>
            </tr>
        </thead>
        <tbody class="hv-50">
            <?php
            if (!empty($DB_recipt)) {
                foreach ($DB_recipt as $key => $value) {
            ?>
                    <tr class="tablinks" onclick="openCity(event, '<?php echo $DB_recipt[$key]['od_id']; ?>')">
                        <td class="pt-3 px-5"><?php echo $DB_recipt[$key]["od_id"]; ?></td>
                        <td class="pt-3 px-5"><?php echo $DB_recipt[$key]["cash"]; ?></td>
                        <td class="pt-3 px-5"><?php echo $DB_recipt[$key]["discount"]; ?></td>
                        <td class="pt-3 px-5"><?php echo $DB_recipt[$key]["total"]; ?></td>
                        <td class="pt-3 px-5"><?php echo $DB_recipt[$key]["change"]; ?></td>
                        <td class="pt-2 pb-2 px-5"><?php echo $DB_recipt[$key]["status"]; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
</div>

<div class="col-6 col-md-4 bg-second r-2 card text-white">
    <div class="card-header">
        <h4>
            รายการ
        </h4>
    </div>
    <div class="card-body">
        <?php
        if (!empty($DB_recipt)) {
            foreach ($DB_recipt as $key => $value) {
        ?>
                <table class="table table-borderless text-white tabcontent" id="<?php echo $DB_recipt[$key]["od_id"]; ?>">
                    <thead>
                        <tr>
                            <th scope="col">รายการ</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคาต่อหน่วย</th>
                            <th scope="col">ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($DB_recipt[$key]["od_id"])) {
                            $sql_pd = "SELECT * FROM orders WHERE orders.od_id = '" . $DB_recipt[$key]["od_id"] . "';";
                            $DB_pd = $db_handle->runQuery($sql_pd);
                            foreach ($DB_pd as $item => $value) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $DB_pd[$item]["pd_id"]; ?></th>
                                    <td><?php echo $DB_pd[$item]["qty"]; ?></td>
                                    <td><?php echo $DB_pd[$item]["price"]; ?></td>
                                    <td><?php echo $DB_pd[$item]["total_price"]; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
        <?php
            }
        }
        ?>
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
        console.log(cityName);
    }
</script>

<?php require 'footer.php'; ?>
<!-- get footer.php -->