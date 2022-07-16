<?php include '../../../public/nav-bar.php';?>
<?php
   
    require('../connect.php');
    
    $users_id    = $_REQUEST['users_id'];
    
    $sql = '
    SELECT * 
    FROM users 
    WHERE users_id=  ' . $users_id .' ; 
        ';

    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    $objResult = mysqli_fetch_array($objQuery)
    
    
    ?>
    <center>
		<div class="fs-1" > Edit users</div>
	</center>
            
            <form action="updatedatausers.php?users_id=<?php echo $users_id; ?>" method="post" name="users" class="row g-3 w-50 border mt-4" enctype="multipart/form-data" style="display: blog; margin-left: auto; margin-right: auto;">
                
                <div class="col-md-3">
                    <label class="form-label">ตำแหน่งงาน</label>
                    <select class="form-control" name="role" >
                        <option value="<?php echo $objResult["role"]; ?>">Admin</option>
                        <option value="<?php echo $objResult["role"]; ?>">พนักงานขาย</option>
                        <option value="<?php echo $objResult["role"]; ?>">ผู้จัดการ</option>
                    </select>
                </div>
                <div class="col-md-7 " style="text-align: center;">
                <i class="fa-solid fa-circle-user fa-5x "></i>
                </div>
               
                <div class="col-md-3">
                    <label  class="form-label">เพศ</label>
                    <select class="form-control" name="gender" >
                        <option value="<?php echo $objResult["gender"]; ?>">ชาย</option>
                        <option value="<?php echo $objResult["gender"]; ?>">หญิง</option>
                        <option value="<?php echo $objResult["gender"]; ?>">อื่นๆ</option>
                    </select>
                </div>
                <div class="col-md-9">
                    <label  class="form-label" >ลิงค์รูปภาพ</label>
                    <input name="file" type="text" class="form-control" value="<?php echo $objResult["file"]; ?>" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">ชื่อ-นามสกุล</label>
                    <input name="usersname"  class="form-control" value="<?php echo $objResult["usersname"]; ?>">
                </div>
                <div class="col-md-6">
                    <label  class="form-label">เบอร์โทร</label>
                    <input name="phone"  class="form-control" value="<?php echo $objResult["phone"]; ?>" >
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email"  class="form-control" value="<?php echo $objResult["email"]; ?>">
                </div>
                <div class="col-md-6">
                    <label  class="form-label">Password</label>
                    <input name="password"  class="form-control" value="<?php echo $objResult["password"]; ?>" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">ที่อยู่</label>
                    <input name="address"  class="form-control" value="<?php echo $objResult["address"]; ?>" >
                </div>
                
                <div class="col-md-6">
                    <label  class="form-label">ตำบล</label>
                    <input name="subdistrict"  class="form-control" value="<?php echo $objResult["subdistrict"]; ?>" >
                </div>
                <div class="col-md-6">
                    <label class="form-label">อำเภอ</label>
                    <input name="district"  class="form-control" value="<?php echo $objResult["district"]; ?>">
                </div>
                <div class="col-md-6">
                    <label  class="form-label">จังหวัด</label>
                    <input name="province"  class="form-control" value="<?php echo $objResult["province"]; ?>">
                </div>
                
                
                <div class="col-12 d-flex justify-content-center">
                    <a href="http://localhost/1421-project/jaiheng-pos/src/app/admin/admin.php">
                        <input name="login_Sale" VALUE="กลับ" class="btn btn-secondary m-3" style="width: 300px;"> 
                        </button>
                    </a>
                    <a>
                        <button name="submit" class="btn btn-primary m-3" style="width: 300px;">
                            <span input type="submit" name="submit" value="Insert Data">บันทึก</span>
                        </button>
                     </a>
                </div>
                
            </form>
           
<?php include '../../../public/footer.php';?>

