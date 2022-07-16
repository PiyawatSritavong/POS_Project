<?php
	session_start();
	if($_SESSION['users_id'] == "")
	{
		echo "Please Login Again";
?>
            <br><a href="logout.php">go back</a>
<?php
	} elseif($_SESSION['role'] != "ADMIN")
	{
		echo "This page for Admin only!";
?>
            <br><a href="logout.php">go back</a>
<?php
	} else
    {
        header("location: ../admin/admin.php");
    }
?>