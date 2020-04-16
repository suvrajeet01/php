<!-- Header -->
			<header id="header">
				<a class="logo" href="index.html">BPPIMT Project</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<?php if(!isset($_SESSION['user'])){
						$link = "index.php";
					 } else {
					 	$link = 'profile.php';
					 }?>
					<li><a href="<?php echo $link ?>">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>

					<?php if(!isset($_SESSION['user'])){?>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>

					<?php } else { ?>					<li><a href="change_password.php">Edit Password</a></li>
					<li><a href="change_profile.php">Edit Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
				<?php } ?>
				</ul>
			</nav>