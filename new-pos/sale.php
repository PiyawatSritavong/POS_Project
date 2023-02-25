<!-- get header.php -->
<?php
/* session_start(); */
require 'header.php';

$date = date("Y-m-d");
$month = date("Y-m");

$sql = "SELECT * FROM order_details WHERE order_details.date = '" . $date . "'";
$DB_recipt = $db_handle->runQuery($sql);

$to_day = "SELECT SUM(order_details.total) FROM order_details WHERE order_details.date = '" . $date . "'";
$DB_to_day = $db_handle->runQuery($to_day);

$to_month = "SELECT SUM(order_details.total) FROM order_details WHERE order_details.month = '" . $month . "'";
$DB_to_month = $db_handle->runQuery($to_month);
?>

<h1 class="text-center my-5">
    ยอดขาย
</h1>

<!-- all item -->
<div class="mt-5 pt-4 pb-5 px-4 r-2 bg-light text-dark">
    <!-- <canvas id="myChart"></canvas> -->
    <div class="text-wihte">
        <div id="one" class="tabcontent">
            <h2 class="pb-4">ยอดขายวันนี้ <?php print_r($DB_to_day[0]['SUM(order_details.total)']) ?> บาท</h2>
            <canvas id="myChart"></canvas>
        </div>

        <div id="two" class="tabcontent">
            <h2 class="pb-4">ยอดรายสัปดาห์ 26/12/2022 - 1/12/2023</h2>
            <canvas id="myChartB"></canvas>
        </div>

        <div id="three" class="tabcontent">
            <h2 class="pb-4">ยอดขายเดือน <?php echo date("m-Y") ?> รวม <?php print_r($DB_to_month[0]['SUM(order_details.total)']) ?> บาท</h2>
            <canvas id="myChartC"></canvas>
        </div>
    </div>
</div>
</div>

<div class="col-6 col-md-4 bg-second min-vh-100 r-2 card text-white tab">
    <div class="card-header d-flex">
        <h4>
            รายการ
        </h4>
    </div>
    <div class="py-4">
        <div class="card bg-main btn-zoom">
            <button class="text-start text-white btn p-0 tablinks" onclick="openCity(event, 'one')">
                <div class="card-body">
                    <h4 class="placeholder-glow">
                        <p>ยอดขายวันนี้</p>
                    </h4>
                    <div class="py-3">
                        <h6 class="placeholder-glow">
                            <p class="placeholder col-8"></p>
                        </h6>
                        <h6 class="placeholder-glow">
                            <p class="placeholder col-12"></p>
                        </h6>
                    </div>
                    <h5 class="text-end placeholder-glow">
                        <p class="placeholder col-4"></p>
                    </h5>
                </div>
            </button>
        </div>
    </div>
    <div class="py-4">
        <div class="card bg-main btn-zoom">
            <button class="text-start text-white btn p-0 tablinks" onclick="openCity(event, 'two')">
                <div class="card-body">
                    <h4 class="placeholder-glow">
                        <p>ยอดขายรายสัปดาห์</p>
                    </h4>
                    <div class="py-3">
                        <h6 class="placeholder-glow">
                            <p class="placeholder col-8"></p>
                        </h6>
                        <h6 class="placeholder-glow">
                            <p class="placeholder col-12"></p>
                        </h6>
                    </div>
                    <h5 class="text-end placeholder-glow">
                        <p class="placeholder col-4"></p>
                    </h5>
                </div>
            </button>
        </div>
    </div>
    <div class="py-4">
        <div class="card bg-main btn-zoom">
            <button class="text-start text-white btn p-0 tablinks" onclick="openCity(event, 'three')">
                <div class="card-body">
                    <h4 class="placeholder-glow">
                        <p>ยอดขายรายเดือน</p>
                    </h4>
                    <div class="py-3">
                        <h6 class="placeholder-glow">
                            <p class="placeholder col-8"></p>
                        </h6>
                        <h6 class="placeholder-glow">
                            <p class="placeholder col-12"></p>
                        </h6>
                    </div>
                    <h5 class="text-end placeholder-glow">
                        <p class="placeholder col-4"></p>
                    </h5>
                </div>
            </button>
        </div>
    </div>
</div>

<script>
    var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
    var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#0091EA",
                borderColor: "#0091EA",
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                labels: xValues,
            }
        }
    });

    var xValuesB = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
    var yValuesB = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

    new Chart("myChartB", {
        type: "line",
        data: {
            labels: xValuesB,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#0091EA",
                borderColor: "#0091EA",
                data: yValuesB
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 6,
                        max: 16
                    }
                }],
            }
        }
    });
    var xValuesC = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
    var yValuesC = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

    new Chart("myChartC", {
        type: "line",
        data: {
            labels: xValuesC,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#0091EA",
                borderColor: "#0091EA",
                data: yValuesC
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 6,
                        max: 16
                    }
                }],
            }
        }
    });

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