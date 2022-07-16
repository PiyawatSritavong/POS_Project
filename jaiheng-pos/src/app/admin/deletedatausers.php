<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php

$delete_ID  = $_REQUEST['users_id'];

require('connect.php');

$sql = '
    DELETE FROM users
    WHERE users_id = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    header( "location: admin.php" );
    exit(0);
} else {
    echo "Error : Delete";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>
