<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_pos';

// connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connect
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

$current_time=time();
$DateTime=strftime("%d-%m-%y  %H:%M:%S",$current_time);
$DateTime;
$barcode = $_POST['barcode'];


$sql = "INSERT INTO barcode (id, barcode_no, date)
VALUES ('', '$barcode', '$DateTime')";

if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

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
</body>
</html>