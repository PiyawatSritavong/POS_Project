<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('../connect.php');

$products_name	  = $_REQUEST['products_name'];
$qty	  		  = $_REQUEST['qty'];
$type  		  	  = $_REQUEST['type'];
$retail_price	  = $_REQUEST['retail_price'];
$whoesale_price	  = $_REQUEST['whoesale_price'];
$barcode	 	  = $_REQUEST['barcode'];
$comments	 	  = $_REQUEST['comments'];
$file	 	  	  = $_REQUEST['file'];

	$sql = "
	INSERT INTO products
	VALUES ('', 
			'$products_name',
			'$qty',
			'$type',
			'$retail_price',
			'$whoesale_price',
			'$barcode',
			'$comments',
			'$file');
	";

	$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	header( "location: ../admin.php" );
    exit(0);
} else {
	echo "Error : Input";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";

?>