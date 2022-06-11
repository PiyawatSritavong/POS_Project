<?php include '../../../public/nav-bar.php';?>
    <center>
		<div class="fs-1"> EDIT PRODUCT</div>
	</center>
            <form class="row g-3 w-50 border mt-4" style="display: blog; margin-left: auto; margin-right: auto;">
                
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">ลักษณะสินค้า</label>
                </div>
                
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">ชื่อสินค้า</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                    
                <div class="col-md-6 " style="text-align: center;">
                <i class="fa-solid fa-cart-arrow-down fa-5x"></i>
                </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">ประเภท</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6 ">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button name="login_Sale" class="btn btn-link m-3 " style="width: 200px;">
                            <span>อัพโหลดรูป</span>
                        </button>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">ยี่ห้อ</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">น้ำหนัก</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">ความสูง</label>
                    <input type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-3">
                    <label for="inputCity" class="form-label">ความยาว</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">ความหนา</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">ลักษณะสินค้า</label>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">ราคาปรีก</label>
                    <input type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-3">
                    <label for="inputCity" class="form-label">ราคา่ส่ง</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">บาร์โค้ด</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">หมายเหตุ</label>
                    <input type="text" class="form-control" id="inputPassword4">
                </div>
                
                
                
                <div class="col-12 d-flex justify-content-center">
                    <a href="../../home.php">
                        <button name="login_Sale" class="btn btn-secondary m-3" style="width: 300px;">
                            <span>ยกเลิก</span>
                        </button>
                    </a>
                    <a href="../../home.php">
                        <button name="login_Sale" class="btn btn-primary m-3" style="width: 300px;">
                            <span>บันทึก</span>
                        </button>
                    </a>
                </div>
            </form>
<?php include '../../../public/footer.php';?>