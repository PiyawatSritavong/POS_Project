<style>
	.show-barcode {
		display: inline-block;
		margin-right: 2%;
	}

	.border-barcode{
		margin: 5%;
	}

	.btn-back{
		color: white;
		background-color:tomato;
		border: solid 0px;
		border-radius: 10%;
		padding: 10px 20px;
		margin-right: 10%;
		cursor: pointer;
	}

	.btn-print{
		color: white;
		background-color:deepskyblue;
		border: solid 0px;
		border-radius: 10%;
		padding: 10px 20px;
		cursor: pointer;
	}

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
	<center>
		<div class="border-barcode">
			<?php
				include 'barcode128.php';
				$product_id = $_POST['product_id'];
				

				for($i=1;$i<=$_POST['print_qty'];$i++){
					echo "<p class='show-barcode'>"
						.bar128(stripcslashes($_POST['product_id']))
						."</p>";			
				}
			?>
		</div>
		<a href="../admin.php"><button class="btn-back">Back</button></a>
		<a ><button  onclick="myFunction()" class="btn-print">Print</button></a>
	</center>

	<script>
		function myFunction() 
		{
			window.print();
		}
	</script>