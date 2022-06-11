<?php include '../../../public/nav-bar.php';?>
    <center>
		<div class="fs-1"> CREATE USER</div>
	</center>
            <form class="row g-3 w-50 border mt-4" style="display: blog; margin-left: auto; margin-right: auto;">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">ตำแหน่งงาน</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6 " style="text-align: center;">
                <i class="fa-solid fa-circle-user fa-5x "></i>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                        <button name="login_Sale" class="btn btn-link m-3" style="width: 200px;">
                            <span>อัพโหลดรูป</span>
                        </button>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">เบอร์โทร</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">ที่อยู่</label>
                    <input type="text" class="form-control" id="inputAddress" >
                </div>
                
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">ตำบล</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" id="inputCity">
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