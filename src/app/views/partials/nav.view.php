<!-- <div class="navbar">
	<div class="bt-navbar">
		<a href="index.php?pg=home" class="active" aria-current="page" >Home</a>
		<a href="index.php?pg=admin">Admin</a>
		<a href="index.php?pg=signup">User</a>
	</div>
</div> -->

<nav>
	<div class="navbar bg-success">
		<div class="bt-navbar">
				<a class="nav-link" aria-current="page" href="index.php?pg=home">POS</a>
			<?php if(Auth::access('supervisor')):?>
				<a class="nav-link" href="index.php?pg=admin">Admin</a>
			<?php endif;?>

			<?php if(Auth::access('admin')):?>
				<a class="nav-link" href="index.php?pg=signup">Create user</a>
			<?php endif;?>

			<?php if(!Auth::logged_in()):?>
				<a class="nav-link" href="index.php?pg=login">SALE</a>	
			<?php endif;?>

			<?php if(!Auth::logged_in()):?>
				<a class="nav-link" href="index.php?pg=login">ADMIN</a>	
			<?php endif;?>
		</div>
	</div>
</nav>