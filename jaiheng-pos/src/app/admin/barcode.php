<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
	#printable{display:block;}
	@media print
	{
		#non-printable{display:none;}
		#printable{display:block;}
	}
</style>
<link rel="stylesheet" href="../../public/bootstrap-5.0.2-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../public/bootstrap-5.0.2-dist/js/bootstrap.js">
<script src="../../public/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
		
		<div id="printable" style="margin: 5%">
			<?php
			include 'barcode128.php';
			$product_id = $_POST['product_id'];
			

			for($i=1;$i<=$_POST['print_qty'];$i++){
				echo "<p class='inline'><span >
				</span>".bar128(stripcslashes($_POST['product_id']))."<span >
				<span></p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";			
			}
			?>
		</div>
		<div id="non-printable">
			<a href="../admin/admin.php"><button type="submit" name="login_Sale" class="btn btn-primary"style="margin-right: 1%"><span>Back</span></button></a>
			<span class="input-group1">
			<a ><button  onclick="myFunction()" class="btn btn-primary"style="margin-left: 1%"><span>Print</span></button>
		</div>
	</center>
	<script>
		function myFunction() 
		{
			window.print();
		}
	</script>
</body>
</html>