<?php include '../../../public/nav-bar.php';?>
    <center>
		<div class="fs-1"> ADD PRODUCT</div>
	</center>
            <form action="insertdataproduct.php" method="post" name="products" enctype="multipart/form-data" class="row g-3 w-50 border mt-4" style="display: blog; margin-left: auto; margin-right: auto;">
                
                
                <div class="col-md-6">
                    <label  class="form-label">ชื่อสินค้า</label>
                    <input name="products_name" class="form-control" >
                </div>                   
                <div class="col-md-6 " style="text-align: center;">
                <i class="fa-solid fa-cart-arrow-down fa-5x"></i>
                </div>
                <div class="col-md-6">
                    <label  class="form-label">ประเภท</label>
                    <input name="type" class="form-control" >
                </div>
                <div class="col-md-2">
                    <label  class="form-label">จำนวน</label>
                    <input name="qty" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label  class="form-label">ลิงค์รูปภาพ</label>
                    <input name="file" type="text" class="form-control" >
                </div>
                <div class="col-md-6">
                <label  name="" class="form-label">ลักษณะสินค้า</label>
                    <input name="brand" class="form-control" >
                </div>
                <div class="col-md-3">
                    <label  class="form-label">ราคาปรีก</label>
                    <input name="retail price" class="form-control" >
                </div>
                <div class="col-md-3">
                    <label  class="form-label">ราคาส่ง</label>
                    <input name="whoesale price" class="form-control" >
                </div>
                
                <div class="col-md-3">
                    <label  class="form-label">บาร์โค้ด</label>
                    <input name="barcode" class="form-control" >
                </div>
                <div class="col-md-3">
                    <label  class="form-label">หมายเหตุ</label>
                    <input name="comments" class="form-control" >
                </div>
                
                
                
                <div class="col-12 d-flex justify-content-center">
                    <a>
                        <a href="http://localhost/1421-project/jaiheng-pos/src/app/admin/admin.php">
                        <input name="login_Sale" VALUE="กลับ" class="btn btn-secondary m-3" style="width: 300px;">       
                    </a> 
                    <a>
                        <button name="submit" class="btn btn-primary m-3" style="width: 300px;">
                            <span input type="submit" name="submit" value="Insert Data">บันทึก</span>
                        </button>
                     </a>
                </div>
            </form>
            
<?php include '../../../public/footer.php';?>