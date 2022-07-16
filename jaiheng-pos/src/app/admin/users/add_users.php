<?php include '../../../public/nav-bar.php';?>
    <center>
		<div class="fs-1" style="margin-top:0px;"> CREATE USER</div>
	</center>
           
            <form action="insertdatausers.php" method="post" name="users" enctype="multipart/form-data" class="row g-3 w-50 border mt-4" style="display: blog; margin-left: auto; margin-right: auto;" >
                <div class="col-md-4">
                    <label class="form-label">ตำแหน่งงาน</label>
                    <select class="form-control" name="role">
                        <option value=Admin>Admin</option>
                        <option value=พนักงานขาย>พนักงานขาย</option>
                        <option value=ผู้จัดการ>ผู้จัดการ</option>
                    </select>
                </div>
                <div class="col-md-6 " style="text-align: center;">
                <i class="fa-solid fa-circle-user fa-5x "></i>
                </div>
               
                <div class="col-md-4">
                    <label  class="form-label">เพศ</label>
                    <select class="form-control" name="gender" >
                        <option value=ชาย>ชาย</option>
                        <option value=หญิง>หญิง</option>
                        <option value=อื่นๆ>อื่นๆ</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label  class="form-label">ลิงค์รูปภาพ</label>
                    <input name="file" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">ชื่อ-นามสกุล</label>
                    <input name="usersname" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">เบอร์โทร</label>
                    <input name="phone" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">Password</label>
                    <input name="password" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">ที่อยู่</label>
                    <input name="address" type="text" class="form-control"  >
                </div>
                
                <div class="col-md-6">
                    <label  class="form-label">ตำบล</label>
                    <input name="subdistrict" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label class="form-label">อำเภอ</label>
                    <input name="district" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">จังหวัด</label>
                    <input name="province" type="text" class="form-control" >
                </div>
                
                
                <div class="col-12 d-flex justify-content-center" >
                    <a>
                        <a href="http://localhost/1421-project/jaiheng-pos/src/app/admin/admin.php">
                        <input name="login_Sale" VALUE="กลับ" class="btn btn-secondary m-3" style="width: 300px;">       
                    </a>    
                    <a>
                        <button name="submit" class="btn btn-primary m-3" style="width: 300px;">
                            <span input type="submit" name="submit" value="Insert Data">บันทึก</span>
                        </button>
                     </a>
                    </a>
                    <br>
                </div>
            </form>
    
<?php include '../../../public/footer.php';?>