<?php include '../../../public/nav-bar.php';?>
<?php
   
    require('../connect.php');
    
    $products_id    = $_REQUEST['products_id'];
    
    $sql = '
    SELECT * 
    FROM products 
    WHERE products_id=  ' . $products_id .' ; 
        ';

    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    $objResult = mysqli_fetch_array($objQuery)
    
    
    ?>
    <center>
		<div class="fs-1"> EDIT PRODUCT</div>
	</center>
            <form action="updatedataproduct.php?products_id=<?php echo $products_id; ?>" method="post" name="products" enctype="multipart/form-data" class="row g-3 w-50 border mt-4" style="display: blog; margin-left: auto; margin-right: auto;">
                
          
                <div class="col-md-6">
                    <label  class="form-label">ชื่อสินค้า</label>
                    <input name="products_name" class="form-control" value="<?php echo $objResult["products_name"]; ?>">
                </div>
                    
                <div class="col-md-6 " style="text-align: center;">
                <i class="fa-solid fa-cart-arrow-down fa-5x"></i>
                </div>
                </div>
                <div class="col-md-6">
                    <label  class="form-label">ประเภท</label>
                    <input name="type" class="form-control" value="<?php echo $objResult["type"]; ?>">
                </div>
                <div style="display: blog; margin-left: 440px; margin-right: 50px; margin-top: -145px;">
                    <div id="imgControl" class="d-none" style="width: 200px;">
                       <img id="imgUpload" class="img-fluid my-7" style="display: blog; margin-left: 50px; margin-right: 0px; margin-top: -20px;">
                    </div> 
                     <div >
                        
                         <button  class="btn btn-link m-3" style="width: 300px;">
                             <input type="file" class="form-control" id="file" name="file" onchange="readURL(this)" required>               
                         </button>   
                     </div>
                </div>
                <div class="col-md-6">
                <label  name="" class="form-label">ลักษณะสินค้า</label>
                    <input name="brand" class="form-control" value="<?php echo $objResult["comments"]; ?>">
                </div>
                <div class="col-md-3">
                    <label  class="form-label">ราคาปรีก</label>
                    <input name="retail_price" class="form-control" value="<?php echo $objResult["retail_price"]; ?>">
                </div>
                <div class="col-md-3">
                    <label  class="form-label">ราคา่ส่ง</label>
                    <input name="wholesale_price" class="form-control" value="<?php echo $objResult["wholesale_price"]; ?>">
                </div>
                
                <div class="col-md-3">
                    <label  class="form-label">บาร์โค้ด</label>
                    <input name="barcode" class="form-control" value="<?php echo $objResult["barcode"]; ?>">
                </div>
                <div class="col-md-3">
                    <label  class="form-label">หมายเหตุ</label>
                    <input name="comments" class="form-control" value="<?php echo $objResult["comments"]; ?>">
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
            <script>
            function readURL(input){
                if(input.files[0]){
                    let reader = new FileReader();
                    document.querySelector('#imgControl').classList.replace("d-none", "d-block");
                    reader.onload = function (e) {
                        let element = document.querySelector('#imgUpload');
                        element.setAttribute("src", e.target.result);
                    }  
                    reader.readAsDataURL(input.files[0]);
                }         
            }
            </script>
<?php include '../../../public/footer.php';?>