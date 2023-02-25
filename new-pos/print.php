<?php
include 'barcode128.php';
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT products.barcode FROM products;";
$DB_recipt = $db_handle->runQuery($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .show-barcode {
            display: inline-block;
            margin-right: 2%;
        }

        .bg-second {
            background-color: #252A3C !important;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */

        }
    </style>
</head>

<body onload='window.print();'>
    <?php
    if (!empty($DB_recipt)) {
        foreach ($DB_recipt as $key => $value) {
            for ($i = 1; $i <= $_POST['qty_barcode']; $i++) {
                echo "<p class='show-barcode'>"
                    . bar128(stripcslashes($_POST['pd_id']))
                    . "</p></body>";
            }
        }
    }
    ?>
</body>

</html>