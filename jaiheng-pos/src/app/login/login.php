<?php include '../../public/header.php';?>
    <center>
        <form class="form-index" method="post" action="check_login.php">
            <div >
                <img src="../../public/uplode/หลังขาว.png" class="img-login">
            </div>
            <div class="input-group">
                <i class="fa-solid fa-user fa-3x"></i>
                <input name="txtUsername" class="s" placeholder="Username" id="txtUsername">
            </div>
            <div class="input-group">
                <i class="fa-solid fa-lock fa-3x"></i>
                <input  name="txtPassword" class="s" placeholder="Password" id="txtPassword">
            </div>
            <div class="d-flex">
                <div>
                    <input type="submit" name="Submit" value="Login" class="bt-index">
                </div>
                <a href="../../index.php">
                    <input type="button" name="Cancel" value="Cancel" class="bt-index">
                </a>
            </div>
        </form> 
    </center>