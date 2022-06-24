<?php
	session_start();
	if($_SESSION['users_id'] == "")
	{
		echo "Please Login Again";
?>
            <br><a href="logout.php">go back</a>
<?php
	} elseif($_SESSION['role'] != "USER")
	{
		echo "This page for User only!";
?>
            <br><a href="logout.php">go back</a>
<?php
	} else
    {
        header("location: ../pos/pos.php");
    }
?>