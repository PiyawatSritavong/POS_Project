<?php include 'header.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col ">
        <div class="input-group mb-2 " style="height30px;  ">
			<span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
				<input onkeyup="check_for_enter_key(event)" oninput="search_item(event)" type="text" class="ms-4 form-control js-search" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" autofocus>
				
			</div>
			<div class="table-responsive" style="height: 400px;px;overflow-y: scroll;">
				<table class="table table-striped table-hover">
					<tr>
						<th>สินค้า</th><th>คำอธิบาย</th><th>ราคาต่อหน่วย</th>
					</tr>
				
					<tbody class="js-items">
					
					
					</tbody>
				</table>
			</div>
						
			<div onclick="add_item(event)" class="js-products d-flex" style="flex-wrap: wrap;;overflow-y: scroll;">
			
			</div>
			
		</div>
        
		
		<div class="col-3 p-3 bg-secondary text-white " style="height:714px;">

		<div class="row">
				<div class="col ">
					<div>เวลา</div>
					<div>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </div>
				</div>
	
			<div class="row">
				<div class="col m-2">
					<div>จำนวนสินค้า:</div>
				</div>
				<div class="col m-2">
					<div>
						<span class="btn1 btn-light rounded 	  text-dark ">$ 0.00</span>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col m-2">
					<div>VAT:</div>
				</div>
				<div class="col m-2">
					<div>
						<span class="btn1 btn-light rounded text-dark ">$ 0.00</span>
					</div>	
				</div>
				<div>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </div>
			</div>
			<div class="row">
				<div class="col m-2">
					<div>ส่วนลด:</div>
				</div>
				<div class="col m-2">
					<div>
						<span class="btn1 btn-light rounded text-dark ">$ 0.00</span>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col m-2">
					<div>รับเงิน:</div>
				</div>
				<div class="col m-2">
					<div>
						<span class="btn1 btn-light rounded text-dark ">$ 0.00</span>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col m-2">
					<div>เงินทอน:</div>
				</div>
				<div class="col m-2">
					<div>
						<span class="btn1 btn-light rounded text-dark ">$ 0.00</span>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col m-2">
					<div class="display-3">เงินรวม:</div>
				</div>
				<div class="col m-2">
					<div>
						<span class="btn_ btn-light rounded ">$ 0.00</span>
					</div>
					
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div>
					<button  type="button" class="btn btn-successa	 my-2 w-100 py-4" data-bs-toggle="modal" data-bs-target="#exampleModal">ส่วนลด</button>
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
									<div class="row">
							<div class="col m-2">
							<div class="text-dark">ราคารวม:</div>
								</div>
							<div class="col m-2">
								<div>
								<span class="btn1 btn-light rounded ">$ 0.00</span>
								</div>
							</div>

      								<div class="modal-footer">
        								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยืนยัน</button>
      								</div>
    							</div>
  							</div>
						</div>
					</div>

						
					

						
				<div class="d-flex">
					<button onclick="clear_all()" class="btn btn-primary1 my-2 w-100 m-1">ยกเลิกบิล</button>		
					<button onclick="clear_all()" class="btn btn-primary my-2 w-100 m-1">พักใบเสร็จ</button>
				</div>
					<div class="d-flex">
						<button class="btn btn-successs my-1 w-100 py-4" onclick='cal()'>จ่ายเงิน</button>	

					</div>
				</div>
			</div>
			