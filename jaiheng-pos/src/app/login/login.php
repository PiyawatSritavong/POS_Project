<?php include '../../public/header.php';?>
    <center>
        <form class="form-index">
            <div >
                <img src="../../public/uplode/หลังขาว.png" class="img-login">
            </div>
            <div class="input-group">
                <i class="fa-solid fa-user fa-3x"></i>
                <input name="username" class="s" placeholder="Username">
            </div>
            <div class="input-group">
                <i class="fa-solid fa-lock fa-3x"></i>
                <input  name="password" class="s" placeholder="Password">
            </div>
        </form> 
        <a href="../pos/pos.php">
            <button type="submit" name="login_Sale" class="bt-index">
                <span>Login</span>
            </button>
        </a>
        <a href="../../index.php">
            <button type="submit" name="login_Sale" class="bt-index">
                <span>Cancel</span>
            </button>
        </a>
    </center>