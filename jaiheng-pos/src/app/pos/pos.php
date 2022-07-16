<?php include '../../public/nav-pos.php';?>
<?php
	require('../admin/connect.php');
?>
<!-- <script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "test.php?q="+str, true);
    xmlhttp.send();
  }
}
</script> -->


<div class="container-fluid">
    <div class="row">
        <div class="col ">
			<div class="input-group mb-2">
				<button class="input-group-text">
					<i class="fa fa-search"></i>
				</button>
				
				<!-- <input onclick="add_item(event)" onkeyup="check_for_enter_key(event)" oninput="search_item(event)" type="text" name="barcode" class="ms-4 form-control js-search" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" required autofocus> -->
				<input type="search" onkeyup="showHint(this.value)" id="myInput" onsearch="myFunction()" autofocus>
				
			</div>
			<div class="table-responsive" style="overflow-y: scroll;">
			


				<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">name</th>
								<th scope="col">details</th>
								<th scope="col">price</th>
								<th scope="col">image</th>
								<th scope="col" id="qty">qty</th>
							</tr>
						</thead>
						<tbody class="js-items">
							<tr id="txtHint" style = "display : none">

							
							<tr id="demo" >

							</tr>  
						</tbody>
				</table>	
			</div>		
		</div>
        
		
		<div class="col-3 p-3 bg-secondary text-white " style="height:714px;">

				<div class="row hr-border">
					<div>เวลา :</div>
				</div>

				<div class="col m-2">
						<div>เวลา :</div>
				
				</div>

				<div class="row">
					<div class="col m-2">
						<div>จำนวนสินค้า:</div>
					</div>
					<div class="col m-2">
						<div>
							<span class="items_total btn1 btn-light rounded text-dark ">$ 0.00</span>
						</div>
					</div>
				</div>

				<div class="row hr-border">
					<div class="col m-2">
						<div>VAT:</div>
					</div>
					<div class="col m-2">
						<div>
							<span id="tax" class="js-gtotal btn1 btn-light rounded text-dark ">$ 0.00</span>
						</div>	
					</div>
				</div>

				<div class="row">
					<div class="col m-2">
						<div>ส่วนลด:</div>
					</div>
					<div class="col m-2">
						<div>
							<span id="discount" class="js-gtotal btn1 btn-light rounded text-dark ">$ 0.00</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col m-2">
						<div>รับเงิน:</div>
					</div>
					<div class="col m-2">
						<div>
							<span><input  type="number" id="pay" placeholder="  $ 0.00" class="btn1 btn-light rounded text-dark "></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col m-2">
						<div>เงินทอน:</div>
					</div>
					<div class="col m-2">
						<div>
							<span id="results" class="js-gtotal btn1 btn-light rounded text-dark ">$ 0.00</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col m-2">
						<div class="display-3">เงินรวม:</div>
					</div>
					<div class="col m-2">
						<div>
							<span  class="js-gtotal btn_ btn-light rounded ">$ 0.00</span>
						</div>
					</div>
				</div>

				<div class="row">
							<div class="col">
								<div>
								<button  type="button" class="btn btn-successa my-2 w-100 py-4" data-bs-toggle="modal" data-bs-target="#exampleModal">ส่วนลด</button>
								<div class="row">
										<div class="col">
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">

											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title text-dark" id="exampleModalLabel">ส่วนลด</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="d-flex ">
													<button onclick="reduce_5()" class="btn_reduce btn-primary2 my-2 w-50 m-1" data-bs-dismiss="modal">5%</button>		
													<button onclick="reduce_10()" class="btn_reduce btn-primary2 my-2 w-50 m-1" data-bs-dismiss="modal">10%</button>	
													<button onclick="reduce_15()" class="btn_reduce btn-primary2 my-2 w-50 m-1" data-bs-dismiss="modal">15%</button>	
													<button onclick="reduce_20()" class="btn_reduce btn-primary2 my-2 w-50 m-1" data-bs-dismiss="modal">20%</button>
														
												</div>
										<center>
											<div class="row">
													<div class="col m-2">
														<div class="text-dark">ราคารวม:</div>
													</div>

												<div class="col m-2">
													<div>
														<span class="btn1 btn-light rounded ">$0.00</span>
													</div>
												</div>
											</div>
										</center>
										<center>
											<div class="row">
													<div class="col m-2">
														<div class="text-dark">ส่วนลด:</div>
													</div>

												<div class="col m-2">
													<div>
														<span class="btn1 btn-light rounded border border-primary ">$ 0.00</span>
													</div>
												</div>
											</div>
										</center>
										<center>
											<div class="row">
													<div class="col m-2">
														<div class="text-dark1 ">ราคาสุทธิ:</div>
													</div>

												<div class="col m-2">
													<div>
														<span class="btn2 btn-light rounded ">$ 0.00</span>
													</div>
												</div>
											</div>
										</center>
												<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยืนยัน</button>
												</div>	
									</div>
								</div>
						</div>
								<div class="d-flex">
									<button onclick="clear_all()" class="btn btn-primary1 my-2 w-100 m-1">ยกเลิกบิล</button>		
									<button onclick="clear_all()" class="btn btn-primary my-2 w-100 m-1" onclick="clearAll()">พักใบเสร็จ</button>
								</div>
								<div class="d-flex">
									<button class="btn btn-successs my-1 w-100 py-4" onclick='cal()'>จ่ายเงิน</button>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	
  function showHint(str) {
    if (str.length == 0) { 
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "test.php?q="+str);
    xhttp.send();   
  }
  
  function myFunction() {
	const element = document.getElementById("txtHint");
     var h2 = document.getElementById("demo");
     h2.insertAdjacentHTML("afterend", element.innerHTML);
  }


	// function add_barcode() {
	// var x = document.getElementById("fname").value; 
	// var y = document.getElementById("ID_pos");
	// y.insertAdjacentHTML("afterend", x);
	// }
	
// 	var PRODUCTS 	= [];
// 	var ITEMS 		= [];
// 	var BARCODE 	= false;
// 	var GTOTAL  	= 0;
// 	var CHANGE  	= 0;

// 	function search_item(e){

// 		var text = e.target.value.trim();
	 
// 		var data = {};
// 		data.data_type = "search";
// 		data.text = text;

// 		send_data(data);
// 	}

// 	function send_data(data)
// 	{

// 		var ajax = new XMLHttpRequest();

// 		ajax.addEventListener('readystatechange',function(e){

// 			if(ajax.readyState == 4){

				
// 				if(ajax.status == 200)
// 				{
// 					if(ajax.responseText.trim() != ""){
// 						handle_result(ajax.responseText);
// 					}else{
// 						if(BARCODE){
// 							alert("that item was not found");
// 						}
// 					}
// 				}else{

// 					console.log("An error occured. Err Code:"+ajax.status+" Err message:"+ajax.statusText);
// 					console.log(ajax);
// 				}

// 				//clear main input if enter was pressed
// 				if(BARCODE){
// 					main_input.value = "";
// 					main_input.focus();
// 				}

// 				BARCODE = false;

// 			}
			
// 		});

// 		ajax.open('post','index.php?pg=ajax',true);
// 		ajax.send(JSON.stringify(data));
// 	}

// 	function handle_result(result){
		
// 		console.log(result);
// 		var obj = JSON.parse(result);
// 		if(typeof obj != "undefined"){

// 			//valid json
// 			if(obj.data_type == "search")
// 			{

// 				var mydiv = document.querySelector(".js-products");

// 				mydiv.innerHTML = "";
// 				PRODUCTS = [];

// 				var mydiv = document.querySelector(".js-products");
// 				if(obj.data != "")
// 				{
					
// 					PRODUCTS = obj.data;
// 					for (var i = 0; i < obj.data.length; i++) {
						
// 						mydiv.innerHTML += product_html(obj.data[i],i);
// 					}

// 					if(BARCODE && PRODUCTS.length == 1){
// 						add_item_from_index(0);
// 					}
// 				}
// 			}
			
// 		}

// 	}

// 	function product_html(data,index)
// 	{

// 		return `
// 			<!--card-->
// 			<div class="card m-2 border-0 mx-auto" style="min-width: 190px;max-width: 190px;">
// 				<a href="#">
// 					<img index="${index}" src="${data.image}" class="w-100 rounded border">
// 				</a>
// 				<div class="p-2">
// 					<div class="text-muted">${data.description}</div>
// 					<div class="" style="font-size:20px"><b>$${data.amount}</b></div>
// 				</div>
// 			</div>
// 			<!--end card-->
// 			`;

				
// 	}

// 	function item_html(data,index)
// 	{

// 		return `
// 			<!--item-->
// 			<tr>
// 				<td style="width:110px"><img src="${data.image}" class="rounded border" style="width:100px;height:100px"></td>
// 				<td class="text-primary">
// 					${data.description}

// 					<div class="input-group my-3" style="max-width:150px">
// 					  <span index="${index}" onclick="change_qty('down',event)" class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus text-primary"></i></span>
// 					  <input index="${index}" onblur="change_qty('input',event)" type="text" class="form-control text-primary" placeholder="1" value="${data.qty}" >
// 					  <span index="${index}" onclick="change_qty('up',event)" class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus text-primary"></i></span>
// 					</div>

// 				</td>
// 				<td style="font-size:20px">
// 					<b>$${data.amount}</b>
// 					<button onclick="clear_item(${index})" class="float-end btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
// 				</td>
// 			</tr>
// 			<!--end item-->
// 			`;
				
// 	}

	
// 	function add_item_from_index(index)
// 	{

// 			//check if items exists
// 			for (var i = ITEMS.length - 1; i >= 0; i--) {
				
// 				if(ITEMS[i].id == PRODUCTS[index].id)
// 				{
// 					ITEMS[i].qty += 1;
// 					refresh_items_display();
// 					return;
// 				}
// 			}

// 			var temp = PRODUCTS[index];
// 			temp.qty = 1;

// 			ITEMS.push(temp);
// 			refresh_items_display();

// 	}

// 	function add_item(e)
// 	{

// 		if(e.target.tagName == "IMG"){
// 			var index = e.target.getAttribute("index");

// 			add_item_from_index(index);
// 		}
// 	}

// 	function refresh_items_display()
// 	{

// 		/* var item_count = document.querySelector(".js-item-count");
// 		item_count.innerHTML = ITEMS.length; */
		
// 		var items_div = document.querySelector(".js-items");
// 		items_div.innerHTML = "";
// 		var grand_total = 0;
// 		var items_sum = 0;
		
// 		for (var i = ITEMS.length - 1; i >= 0; i--) {
			
// 			items_sum += ITEMS[i].qty;
			
// 			items_div.innerHTML += item_html(ITEMS[i],i);
			
// 			grand_total += (ITEMS[i].qty * ITEMS[i].amount);
// 		}
		
// 		var items_div = document.querySelector(".items_total");
// 		items_div.innerHTML = items_sum;

// 		var gtotal_div = document.querySelector(".js-gtotal");
// 		gtotal_div.innerHTML = "$" + grand_total.toFixed(2);
// 		GTOTAL = grand_total;

// 	}

// 	function clear_all()
// 	{

// 		if(!confirm("Are you sure you want to clear all items in the list??!!"))
// 			return;

// 		ITEMS = [];
// 		refresh_items_display();

// 	}
	
// 	function clear_item(index)
// 	{

// 		if(!confirm("Remove item??!!"))
// 			return;

// 		ITEMS.splice(index,1);
// 		refresh_items_display();

// 	}

// 	function change_qty(direction,e)
// 	{

// 		var index = e.currentTarget.getAttribute("index");
// 		if(direction == "up")
// 		{
// 			ITEMS[index].qty += 1;
// 		}else
// 		if(direction == "down")
// 		{
// 			ITEMS[index].qty -= 1;
// 		}else{

// 			ITEMS[index].qty = parseInt(e.currentTarget.value);
// 		}

// 		//make sure its not less than 1
// 		if(ITEMS[index].qty < 1)
// 		{
// 			ITEMS[index].qty = 1;
// 		}

// 		refresh_items_display();
// 	}

// 	function check_for_enter_key(e)
// 	{

// 		if(e.keyCode == 13)
// 		{
// 			BARCODE = true;
// 			search_item(e);
// 		}
// 	}

// 	function show_modal(modal)
// 	{

// 		if(modal == "amount-paid"){

// 			if(ITEMS.length == 0){

// 				alert("Please add at least one item to the cart");
// 				return;
// 			}
// 			var mydiv = document.querySelector(".js-amount-paid-modal");
// 			mydiv.classList.remove("hide");

// 			mydiv.querySelector(".js-amount-paid-input").value = "";
// 			mydiv.querySelector(".js-amount-paid-input").focus();
// 		}else
// 		if(modal == "change"){
 
// 			var mydiv = document.querySelector(".js-change-modal");
// 			mydiv.classList.remove("hide");

// 			mydiv.querySelector(".js-change-input").innerHTML = CHANGE;
// 			mydiv.querySelector(".js-btn-close-change").focus();
// 		}
		

// 	}
	
// 	function hide_modal(e,modal)
// 	{
		
// 		if(e == true || e.target.getAttribute("role") == "close-button")
// 		{
// 			if(modal == "amount-paid"){
// 				var mydiv = document.querySelector(".js-amount-paid-modal");
// 				mydiv.classList.add("hide");
// 			}else 
// 			if(modal == "change"){
// 				var mydiv = document.querySelector(".js-change-modal");
// 				mydiv.classList.add("hide");
// 			}			
					
// 		}
	
// 	}

// 		// function reduce_5() {
// 		// 	var discount = document.getElementById("discount");
// 		//     var d = parseInt(pay.value) - GTOTAL;
// 		//     results.innerHTML = "$" + d;

			
// 		// }
// 	function cal() {
//         var pay = document.getElementById("pay");
//         var results = document.getElementById("results");
//         var s = parseInt(pay.value) - GTOTAL;
//         results.innerHTML = "$" + s;

// 		var gtotal_div = document.querySelector(".js-gtotal");
// 		var tax = document.getElementById("tax");
// 		var t = parseInt(pay.value)- GTOTAL;
// 		tax.innerHTML = "$" + t;
//     }

// function reduce_5() {
// 			var discount = document.getElementById("discount");
// 		    var d =   GTOTAL*0.05;
// 		    discount.innerHTML = "$" + d;

			
// 	}
// function reduce_10() {
// var discount = document.getElementById("discount");
// var d =   GTOTAL*0.10;
// discount.innerHTML = "$" + d;

// 	}
// 	function reduce_15() {
// 		var discount = document.getElementById("discount");
// 	var d =   GTOTAL*0.15;
// 	discount.innerHTML = "$" + d;

// 			}
// 	function reduce_20() {
// 		var discount = document.getElementById("discount");
// 		var d =   GTOTAL*0.20;
// 		discount.innerHTML = "$" + d;

// 		}

// 	function clearAll() {
//         var payAfter = document.getElementById("pay");
// 		var gtotal_div = document.querySelector(".js-gtotal");
		
// 		gtotal_div.innerHTML = "$" + "0.00";
//         results.innerHTML = "$" + "0.00";
// 		payAfter.value = " ";

// 		ITEMS = [];
// 		refresh_items_display();
//     }

// 	function validate_amount_paid(e)
// 	{

// 		var amount = e.currentTarget.parentNode.querySelector(".js-amount-paid-input").value.trim();
		
// 		if(amount == "")
// 		{
// 			alert("Please enter a valid amount");
// 			document.querySelector(".js-amount-paid-input").focus();
// 			return;
// 		}

// 		amount = parseFloat(amount);
// 		if(amount < GTOTAL){

// 			alert("Amount must be higher or equal to the total");
// 			return;
// 		}

// 		// จุดคิดเงินทอน เอาที่ได้รับจากลูกค้า - ราคารวมสินค้า
// 		CHANGE = amount - GTOTAL ;
// 		CHANGE = CHANGE.toFixed(2);

// 		hide_modal(true,'amount-paid');
// 		show_modal('change');

// 		//remove unwanted information
// 		var ITEMS_NEW = [];
// 		for (var i = 0; i < ITEMS.length; i++) {
			
// 			var tmp = {};
// 			tmp.id = ITEMS[i]['id'];
// 			tmp.qty = ITEMS[i]['qty'];

// 			ITEMS_NEW.push(tmp);
// 		}

// 		//send cart data through ajax
// 		send_data({

// 			data_type:"checkout",
// 			text:ITEMS_NEW
// 		});

// 		//clear items
// 		ITEMS = [];
// 		refresh_items_display();

// 		//reload products
// 		send_data({

// 			data_type:"search",
// 			text:""
// 		});
// 	}

// 	send_data({

// 		data_type:"search",
// 		text:""
// 	});


</script>


<?php include '../../public/footer.php';?>