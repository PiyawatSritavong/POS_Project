<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('../connect.php');

$products_name    	= $_REQUEST['products_name'];
$type 		  		= $_REQUEST['type'];
$retail_price 		= $_REQUEST['retail_price'];
$wholesale_price	= $_REQUEST['wholesale_price'];
$barcode		  	= $_REQUEST['barcode'];
$comments		  	= $_REQUEST['comments'];
$products_id    	= $_REQUEST['products_id'];
$file   			= $_REQUEST['file'];
$qty   			    = $_REQUEST['qty'];

	$sql = "
		UPDATE products
		SET 
		products_name 		= '" . $products_name . "',
		type 				= '" . $type . "',
		retail_price 		= '" . $retail_price . "', 
		wholesale_price 	= '" . $wholesale_price . "', 
		barcode 			= '" . $barcode . "', 
		comments 			= '" . $comments . "', 
		file 				= '" . $file . "',
		qty 				= '" . $qty . "'
		WHERE products_id 	= " . $products_id . " ; ";

		
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


