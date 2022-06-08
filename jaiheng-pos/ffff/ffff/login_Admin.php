<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admain</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b09cd47e25.js" crossorigin="anonymous"></script>
    
</head>
<body>
    
<center>  
    <form action="login_db.php" method="post">
    <div class="input-group">
        <img src="หลังขาว1.png"  class="imgg">
        </div>    
    <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h2>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h2>
            </div>
        <?php endif ?>
        <div class="input-group">
        <i class="fa-solid fa-user fa-3x"></i>&nbsp;&nbsp;
            <input 
             name="username" class="s" placeholder="Username">
        </div>
        <div class="input-group">
        <i class="fa-solid fa-lock fa-3x"></i>&nbsp;&nbsp;
            <input  name="password" class="s" placeholder="Password">
        </div>
    </form>
    <span class="input-group">
        <a href="login copy.php"><button type="submit" name="login_" class="button1"style="vertical-align:middle"><span>Login</span></button></a>
        
		<span class="input-group">
		<a href="login.php"><button type="submit" name="cancel_login" class="button1"style="vertical-align:middle"><span>Cancel</span></button>
        </span></a>
        </center> 
</body>
</html>