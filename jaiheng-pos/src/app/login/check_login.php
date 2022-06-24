<?php
	session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'DB_pos';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql = "
        SELECT * FROM users WHERE usersname = '" .($_POST['txtUsername']). "' AND password = '" .($_POST['txtPassword']). "';
        ";
        
    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
?>
            <br><a href="logout.php">go back</a>
<?php
	}
	else
	{
			$_SESSION["users_id"] = $objResult["users_id"];
			$_SESSION["role"] = $objResult["role"];

			session_write_close();
			
			if($objResult["role"] == "ADMIN")
			{
				header("location: check_admin_page.php");
			}
			else
			{
				header("location: check_user_page.php");
			}
	}
	/* mysql_close(); */
?>