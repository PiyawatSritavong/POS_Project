<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('../connect.php');

$role  		  = $_REQUEST['role'];
$gender		  = $_REQUEST['gender'];
$usersname	  = $_REQUEST['usersname'];
$phone		  = $_REQUEST['phone'];
$email		  = $_REQUEST['email'];
$password	  = $_REQUEST['password'];
$address      = $_REQUEST['address'];
$subdistrict  = $_REQUEST['subdistrict'];
$district 	  = $_REQUEST['district'];
$province     = $_REQUEST['province'];
$file     	  = $_REQUEST['file'];


$sql = "
INSERT INTO users
VALUES ('', 
		'$usersname',
		'',
		'$phone',
		'$email',
		'$password',
		'$role',
		'$gender',
		'$address', 
		'$subdistrict',
		'$district',
		'$province',
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
