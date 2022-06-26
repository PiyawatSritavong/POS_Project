<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barcode php</title>
</head>
<body>
    <form action="barcode.php" method="POST">
        <input type="text" name="barcode" required>
        <input type="submit" name="submit">
    </form>

    <?php 
        /* error_reporting(E_ALL ^ E_DEPRECATED); */
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'barcode';

        // connect
        $conn = mysqli_connect($servername, $username, $password, $dbname);

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
            
            echo  $barcode ;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>


    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">details</th>
                <th scope="col">price</th>
                <th scope="col">image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $objResult["barcode_no"]; ?></td>
                <td><?php echo $objResult["products_name"]; ?></td>
                <td><?php echo $objResult["details"]; ?></td>
                <td><?php echo $objResult["price"]; ?></td>
                <td><?php echo $objResult["image"]; ?></td>
            </tr>  
        </tbody>
    </table> 
</body>
</html>