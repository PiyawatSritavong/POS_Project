<?php

    require('../admin/connect.php');
    // Check connect
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

                $current_time=time();
                $DateTime=strftime("%d-%m-%y  %H:%M:%S",$current_time);
                $DateTime;
                $barcode = $_POST['barcode'];

            $sql = '
                SELECT barcode.barcode_no, products.products_name , products.details,products.price,products.image 
                FROM barcode 
                LEFT JOIN products ON barcode.id = products.barcode_id 
                WHERE barcode.barcode_no = ' . $barcode . ';
                ';
            $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
            $objResult = mysqli_fetch_array($objQuery);

            if (mysqli_query($conn, $sql)) {

                echo  $barcode;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);



?>
