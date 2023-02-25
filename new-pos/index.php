<?php
session_start();
require 'header.php';

$cash = 0;
$discount_total = 0;
$discount_input = 0;
$date = date("Y-m-d");
$month = date("Y-m");
$time = date("H:i:s");

if (isset($_SESSION["cart_item"])) {
	foreach ($_SESSION["cart_item"] as $item) {
		if (!empty($_POST["cash"])) {
			$cash = $_POST["cash"];
		}
		if (!empty($_POST["discount0"])) {
			$discount0 = $_POST["discount0"];
			$discount_total = str_split($discount0, 1)[0];
		}
		if (!empty($_POST["discount5"])) {
			$discount5 = $_POST["discount5"];
			$discount_total = str_split($discount5, 1)[0];
		}
		if (!empty($_POST["discount10"])) {
			$discount10 = $_POST["discount10"];
			$discount_total = str_split($discount10, 2)[0];
		}
		if (!empty($_POST["discount15"])) {
			$discount15 = $_POST["discount15"];
			$discount_total = str_split($discount15, 2)[0];
		}
		if (!empty($_POST["discount20"])) {
			$discount20 = $_POST["discount20"];
			$discount_total = str_split($discount20, 2)[0];
		}
		if (!empty($_POST["discount_input"])) {
			$discount_input = $_POST["discount_input"];
		}
	}
}

if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByID = $db_handle->runQuery("SELECT * FROM products WHERE pd_id='" . $_GET["pd_id"] . "'");
				$itemArray = array($productByID[0]["pd_id"] => array('name' => $productByID[0]["name"], 'pd_id' => $productByID[0]["pd_id"], 'quantity' => $_POST["quantity"], 'price' => $productByID[0]["price"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByID[0]["pd_id"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByID[0]["pd_id"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["pd_id"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			function set_url($url)
			{
				unset($_SESSION["cart_item"]);
				echo ("<script>history.replaceState({},'','$url');</script>");
			}
			set_url("http://localhost/pos/new-pos/index.php");
			break;
		case "database":
?>

			<div class="d-none">
				<?php
				$payCash = $_POST['payCash'];
				$discount = $_POST['discount'];
				$total = $_POST['total'];
				$change = $_POST['change'];
				$status = 'success';
				/* 	odd = order detail;
				odp = orders (have product);
				prod = products;
				*/
				$sql_insert_odd = "INSERT INTO order_details (order_details.cash, order_details.discount, order_details.total, order_details.change, order_details.status, order_details.date, order_details.month, order_details.time) VALUES ($payCash, '" . $discount . "%" . "', $total, $change, '" . $status . "', '" . $date . "', '" . $month . "', '" . $time . "');";
				$conn->query($sql_insert_odd);

				$sql_get_odd = "SELECT order_details.od_id FROM order_details ORDER BY od_id DESC LIMIT 1;";
				$od_ids = $db_handle->runQuery($sql_get_odd);
				$od_id_format = $od_ids[0]['od_id'];

				foreach ($_SESSION["cart_item"] as $item) {
					$pd_id_web = $item["pd_id"];
					$qty_web = $item["quantity"];
					$price_web = $item["price"];
					$total_price = $item["quantity"] * $item["price"];
					$sql_insert_odp = "INSERT INTO orders (orders.od_id, orders.pd_id, orders.qty, orders.price, orders.total_price, orders.time, orders.date) 
									VALUES ($od_id_format, $pd_id_web, $qty_web, $price_web, $total_price, '" . $time . "', '" . $date . "');";
					$conn->query($sql_insert_odp);
				}
				?>
			</div>

<?php
			function set_url($url)
			{
				unset($_SESSION["cart_item"]);
				echo ("<script>history.replaceState({},'','$url');</script>");
			}
			set_url("http://localhost/pos/new-pos/index.php");

			break;
	}
}

?>

<!-- search bar -->
<div class="py-3">
	<div class="d-flex">
		<input class="form-control bg-second border border-dark text-white me-2" id="value" type="search" name="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-light" type="submit">Search</button>
	</div>
</div>

<!-- all item -->
<div class="row row-cols-1 row-cols-md-3 g-4">
	<!-- item -->
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY pd_id ASC");
	if (!empty($product_array)) {
		foreach ($product_array as $key => $value) {
	?>
			<div class='col profile'>
				<div class='card bg-second btn-zoom'>
					<form method="post" action="index.php?action=add&pd_id=<?php echo $product_array[$key]["pd_id"]; ?>">
						<div class='card-body'>
							<h3><?php echo $product_array[$key]["name"]; ?></h3>
							<div class='py-3'>
								<h6 class="name">รหัสสินค้า #<?php echo $product_array[$key]["pd_id"]; ?></h6>
								<h6 class="name">รายละเอียด <?php echo $product_array[$key]["comment"]; ?></h6>
								<h6>ราคา <?php echo $product_array[$key]["price"]; ?> บาท</h6>
								<input type="number" class="text-center w-50" name="quantity" value="1" />
							</div>
							<div class='text-end ps-5 ms-5'>
								<input type="submit" value="Add to Cart" class="btn btn-outline-green text-white border border-light" />
							</div>
						</div>
					</form>
				</div>
			</div>
	<?php
		}
	}
	?>
	<!-- <div class="col">
		<div class="card bg-second btn-zoom">
			<button class="text-start text-white btn p-0">
				<div class="card-body">
					<h3 class="placeholder-glow">
						<p class="placeholder col-8"></p>
					</h3>
					<div class="py-3">
						<h6 class="placeholder-glow">
							<p class="placeholder col-8"></p>
						</h6>
						<h6 class="placeholder-glow">
							<p class="placeholder col-12"></p>
						</h6>
					</div>
					<h5 class="text-end placeholder-glow">
						<p class="placeholder col-4"></p>
					</h5>
				</div>
			</button>
		</div>
	</div> -->
</div>
</div>

<div class="col-6 col-md-4 bg-second min-vh-100 r-2 card text-white">

	<div class="card-header d-flex">
		<h4>
			Orders
		</h4>
	</div>

	<div class="card-body">
		<?php

		if (isset($_SESSION["cart_item"])) {
			$total_quantity = 0;
			$total_price = 0;
			$change = 0;
			$total_sum = 0;
		?>
			<table class="table table-borderless text-center text-white">
				<thead>
					<tr>
						<th scope="col">รายการ</th>
						<th scope="col">จำนวน</th>
						<th scope="col">ราคาต่อหน่วย</th>
						<th scope="col">ราคา</th>
						<th scope="col">ลบ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($_SESSION["cart_item"] as $item) {
						$item_price = $item["quantity"] * $item["price"];
					?>
						<tr>
							<td><?php echo $item["name"]; ?></td>
							<td><?php echo $item["quantity"]; ?></td>
							<td><?php echo $item["price"]; ?></td>
							<td><?php echo number_format($item_price, 2); ?></td>
							<td>
								<a href="index.php?action=remove&pd_id=<?php echo $item["pd_id"]; ?>" class="link-danger">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
										<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
										<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
									</svg>
								</a>
							</td>
						</tr>
					<?php
						$total_quantity += $item["quantity"];
						/* $total_sum += ($item["price"] * $item["quantity"]); */
						$total_price += ($item["price"] * $item["quantity"]);
						if ($discount_total > 0) {
							$total_sum = $total_price * (100 - $discount_total) / 100;
						} else {
							$total_sum += ($item["price"] * $item["quantity"]);
						}

						if ($discount_input > 0) {
							$total_sum = $total_price - $discount_input;
						}
					}

					?>
				</tbody>
			</table>
			<div class="card-footer mb-5 pb-4 pe-5 me-5 ps-0 ms-0">
				<form method="post" class="text-end d-flex" action="index.php">
					<table class="table table-borderless text-white">
						<tbody>
							<tr>
								<td class="text-start">
									<h4>
										ส่วนลด
									</h4>
								</td>
								<td class="d-flex">
									<input type="submit" name="discount0" value="0%" class="btn btn-outline-green text-white border border-light w-25" />
									<input type="submit" name="discount5" value="5%" class="btn btn-outline-green text-white border border-light w-25" />
									<input type="submit" name="discount10" value="10%" class="btn btn-outline-green text-white border border-light w-25" />
									<input type="submit" name="discount15" value="15%" class="btn btn-outline-green text-white border border-light w-25" />
									<input type="submit" name="discount20" value="20%" class="btn btn-outline-green text-white border border-light w-25" />
									<button type="button" name="discount_input" class="btn btn-outline-green text-white border border-light w-50 p-0" id="myBtnD">เพิ่มเติม</button>
								</td>
							</tr>
							<tr>
								<td class="text-start">
									<h4>จำนวน</h4>
								</td>
								<td class="text-end">
									<h4><?php echo $total_quantity; ?> ชิ้น</h4>
								</td>
							</tr>
							<tr>
								<td class="text-start">
									<h4>เงินสด</h4>
								</td>
								<td>
									<input type="number" name="cash" value="<?php echo $cash ?>" placeholder="กรุณาใส่จำนวนเงิน" class="w-50 float-end text-center form-control">
								</td>
							</tr>
							<tr>
								<td class="text-start">
									<h2>รวม</h2>
								</td>
								<td class="text-end">
									<h2>
										<?php
										echo number_format($total_sum, 2);
										?> บาท
									</h2>
								</td>
							</tr>
							<tr>
								<td class="text-start">
									<h4>เงินทอน</h4>
								</td>
								<td class="text-end">
									<h4>
										<?php
										$change = $cash - $total_sum;
										echo number_format($change, 2);
										?> บาท
									</h4>
								</td>
							</tr>
						</tbody>
					</table>

					<!-- Modal -->
					<div id="myModalD" class="modal">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content bg-second text-white r-2">
								<div class="modal-header">
									<h1 class="modal-title fs-3" id="ChangeModalLabel">ส่วนลด</h1>
									<button type="button" class="close_discountX btn btn-light btn-close" data-bs-dismiss="ChangeModal" aria-label="Close"></button>
								</div>
								<div class="modal-body d-flex mx-5">
									<h5>
										จำนวนเงิน
									</h5>
									<input type="number" name="discount_input" class="form-control text-center w-50 mx-3" placeholder="กรุณาใส่จำนวนเงิน">
									<h5>
										บาท
									</h5>
								</div>
								<div class="modal-footer">
									<button type="cancel" class="close_discount btn btn-secondary">ยกเลิก</button>
									<button type="submit" class="btn btn-primary">ยืนยัน</button>
								</div>
							</div>
						</div>
					</div>

				</form>
				<div class="w-100 d-flex py-2">
					<a id="btnEmpty" href="index.php?action=empty" class="text-white text-decoration-none w-100 me-1">
						<button type="button" class="btn btn-green text-white w-100">
							ล้างบิล
						</button>
					</a>
					<a id="btnEmpty" href="bill_break.php" target="_blank" class="text-white text-decoration-none w-100 me-1">
						<button type="button" class="btn btn-yellow text-white w-100 ms-1">พักบิล</button>
					</a>
				</div>
				<button type="button" class="btn btn-danger w-100" id="myBtn">จ่ายเงิน</button>

				<!-- Modal -->
				<div id="myModal" class="modal">

					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content bg-second text-white r-2">
							<div class="modal-header">
								<h1 class="modal-title fs-3" id="exampleModalLabel">Bill</h1>
								<button type="button" class="close_popupX btn btn-light">
									<h4>&times;</h4>
								</button>
							</div>
							<div class="modal-body">
								<table class="table table-borderless text-center text-white">
									<thead>
										<tr>
											<th scope="col">รายการ</th>
											<th scope="col">จำนวน</th>
											<th scope="col">ราคาต่อหน่วย</th>
											<th scope="col">ราคา</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($_SESSION["cart_item"] as $item) {
											$item_price = $item["quantity"] * $item["price"];
										?>
											<tr>
												<td><?php echo $item["name"]; ?></td>
												<td><?php echo $item["quantity"]; ?></td>
												<td><?php echo $item["price"]; ?></td>
												<td><?php echo number_format($item_price, 2); ?></td>
											</tr>
										<?php
											$total_quantity += $item["quantity"];
											$total_price += ($item["price"] * $item["quantity"]);
										}
										?>
									</tbody>
								</table>
							</div>
							<form method="post" action="index.php?action=database">
								<div class="modal-footer">
									<table class="text-white">
										<tbody>
											<tr>
												<td>
													<h5>
														เงินสด
													</h5>
												</td>
												<td class="text-center px-5">
													<h5>
														<?php echo $cash ?>
													</h5>
													<input type="text" name="payCash" class="d-none" value="<?php echo $cash ?>">
												</td>
												<td>
													<h5>
														บาท
													</h5>
												</td>
											</tr>
											<tr>
												<td>
													<h5>
														ส่วนลด
													</h5>
												</td>
												<td>
													<h5 class="text-center px-5">
														<?php echo $discount_total; ?>
													</h5>
													<input type="text" name="discount" class="d-none" value="<?php echo $discount_total ?>">
												</td>
												<td class="text-end">
													<h5>
														เปอร์เซ็น
													</h5>
												</td>
											</tr>
											<tr>
												<td>
													<h5>รวม</h5>
												</td>
												<td class="text-center px-5">
													<h5><?php echo number_format($total_sum, 2); ?></h5>
													<input type="text" name="total" class="d-none" value="<?php echo number_format($total_sum, 2); ?>">
												</td>
												<td>
													<h5>
														บาท
													</h5>
												</td>
											</tr>
											<tr>
												<td>
													<h5>เงินทอน</h5>
												</td>
												<td class="text-center px-5">
													<h5><?php echo number_format($change, 2); ?></h5>
													<input type="text" name="change" class="d-none" value="<?php echo $change ?>">
												</td>
												<td>
													<h5>
														บาท
													</h5>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="close_popup btn btn-secondary">ยกเลิก</button>
									<button type="submit" class="btn btn-primary">ยืนยัน</button>
								</div>
							</form>
						</div>
					</div>

				</div>

				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content bg-second text-white r-2">
							<div class="modal-header">
								<h1 class="modal-title fs-3" id="exampleModalLabel">Bill</h1>
								<button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<table class="table table-borderless text-center text-white">
									<thead>
										<tr>
											<th scope="col">รายการ</th>
											<th scope="col">จำนวน</th>
											<th scope="col">ราคาต่อหน่วย</th>
											<th scope="col">ราคา</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($_SESSION["cart_item"] as $item) {
											$item_price = $item["quantity"] * $item["price"];
										?>
											<tr>
												<td><?php echo $item["name"]; ?></td>
												<td><?php echo $item["quantity"]; ?></td>
												<td><?php echo $item["price"]; ?></td>
												<td><?php echo number_format($item_price, 2); ?></td>
											</tr>
										<?php
											$total_quantity += $item["quantity"];
											$total_price += ($item["price"] * $item["quantity"]);
										}
										?>
									</tbody>
								</table>
							</div>
							<form method="post" action="index.php?action=database">
								<div class="modal-footer">
									<table class="text-white">
										<tbody>
											<tr>
												<td>
													<h5>
														เงินสด
													</h5>
												</td>
												<td class="text-center px-5">
													<h5>
														<?php echo $cash ?>
													</h5>
													<input type="text" name="payCash" class="d-none" value="<?php echo $cash ?>">
												</td>
												<td>
													<h5>
														บาท
													</h5>
												</td>
											</tr>
											<tr>
												<td>
													<h5>
														ส่วนลด
													</h5>
												</td>
												<td>
													<h5 class="text-center px-5">
														<?php echo $discount_total; ?>
													</h5>
													<input type="text" name="discount" class="d-none" value="<?php echo $discount_total ?>">
												</td>
												<td class="text-end">
													<h5>
														เปอร์เซ็น
													</h5>
												</td>
											</tr>
											<tr>
												<td>
													<h5>รวม</h5>
												</td>
												<td class="text-center px-5">
													<h5><?php echo number_format($total_sum, 2); ?></h5>
													<input type="text" name="total" class="d-none" value="<?php echo number_format($total_sum, 2); ?>">
												</td>
												<td>
													<h5>
														บาท
													</h5>
												</td>
											</tr>
											<tr>
												<td>
													<h5>เงินทอน</h5>
												</td>
												<td class="text-center px-5">
													<h5><?php echo number_format($change, 2); ?></h5>
													<input type="text" name="change" class="d-none" value="<?php echo $change ?>">
												</td>
												<td>
													<h5>
														บาท
													</h5>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
									<button type="submit" class="btn btn-primary">ยืนยัน</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
		} else {
		?>
			<div class="card-footer mb-5 pb-4 pe-5 me-5 ps-0 ms-0">
				<table class="table table-borderless text-white">
					<tbody>
						<tr>
							<td>
								<h4>
									ส่วนลด
								</h4>
							</td>
							<td class="text-end d-flex">
								<input type="submit" name="discount0" value="0%" class="btn btn-outline-green text-white border border-light w-25" />
								<input type="submit" value="5%" class="btn btn-outline-green text-white border border-light w-25" />
								<input type="submit" value="10%" class="btn btn-outline-green text-white border border-light w-25" />
								<input type="submit" value="15%" class="btn btn-outline-green text-white border border-light w-25" />
								<input type="submit" value="20%" class="btn btn-outline-green text-white border border-light w-25" />
								<input type="submit" value="เพิ่มเติม" data-bs-toggle="modal" data-bs-target="#change" class="btn btn-outline-green text-white border border-light w-25" />
							</td>
						</tr>
						<tr>
							<td>
								<h4>จำนวน</h4>
							</td>
							<td class="text-end">
								<h4>0 ชิ้น</h4>
							</td>
						</tr>
						<tr>
							<td>
								<h4>เงินสด</h4>
							</td>
							<td>
								<form method="post" action="index.php?action=callCash" class="d-flex justify-content-end">
									<input type="number" name="cash" placeholder="กรุณาใส่จำนวนเงิน" class="w-50 text-center form-control mx-3">
									<h4>บาท</h4>
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<h2>รวม</h2>
							</td>
							<td class="text-end">
								<h2>0 บาท</h2>
							</td>
						</tr>
						<tr>
							<td>
								<h4>เงินทอน</h4>
							</td>
							<td class="text-end">
								<h4>0 บาท</h4>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="w-100 d-flex py-2">
					<a id="btnEmpty" href="index.php?action=empty" class="text-white text-decoration-none w-100 me-1">
						<button type="button" class="btn btn-green text-white w-100">
							ล้างบิล
						</button>
					</a>
					<a id="btnEmpty" href="bill_break.php" target="_blank" class="text-white text-decoration-none w-100 me-1">
						<button type="button" class="btn btn-yellow text-white w-100 ms-1">พักบิล</button>
					</a>
				</div>
				<button type="button" class="btn btn-danger w-100">จ่ายเงิน</button>
			</div>
		<?php
		}
		?>
	</div>
</div>

<script>
	document.getElementById("value").addEventListener("keyup", filterSearch);

	function filterSearch() {
		var value, name, profile, i;
		value = document.getElementById('value').value.toUpperCase();
		profile = document.getElementsByClassName('profile');
		for (i = 0; profile.length; i++) {
			name = profile[i].getElementsByClassName('name');
			if (name[0].innerHTML.toUpperCase().indexOf(value) > -1) {
				profile[i].style.display = "inline";
			} else {
				profile[i].style.display = "none";
			}
		}
	}

	/* start pay popup model */
	var modal = document.getElementById("myModal");
	var btn = document.getElementById("myBtn");
	var span = document.getElementsByClassName("close_popup")[0];
	var spanX = document.getElementsByClassName("close_popupX")[0];
	btn.onclick = function() {
		modal.style.display = "block";
	}
	span.onclick = function() {
		modal.style.display = "none";
	}
	spanX.onclick = function() {
		modal.style.display = "none";
	}
	/* end pay popup model */

	/* start discount popup model */
	var modalD = document.getElementById("myModalD");
	var btnD = document.getElementById("myBtnD");
	var spanD = document.getElementsByClassName("close_discount")[0];
	var spanDX = document.getElementsByClassName("close_discountX")[0];
	btnD.onclick = function() {
		modalD.style.display = "block";
	}
	spanD.onclick = function() {
		modalD.style.display = "none";
	}
	spanDX.onclick = function() {
		modalD.style.display = "none";
	}
	/* end discount popup model */

	/* click outside to close */
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
		if (event.target == modalD) {
			modalD.style.display = "none";
		}
	}
</script>

<?php require 'footer.php'; ?>
<!-- get footer.php -->