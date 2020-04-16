<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<?php include ('header.php') ?>
	</head>
	<body class="is-preload">

		<?php include('navbar.php') ?>
		<!-- Heading -->
			<div id="heading" >
				<h1 align="center">Login Page</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<h2>Login here</h2>
						</header>
						<form method="post">
	<table align="center">
		<tr>
			<td>
				Email
			</td>
			<td>
				<input type="email" name="e" placeholder="Enter email">
			</td>
		</tr>
		<tr>
			<td>
				Password
			</td>
			<td>
				<input type="password" name="p" placeholder="Enter valid password">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="login" value="Login">
			</td>
		</tr>
	</table>
</form>
<?php
	if(isset($_POST['login'])){
		$email = $_POST['e'];
		$password = $_POST['p'];

		# verify if valid user
		$v = mysqli_query($conn,"SELECT * FROM user WHERE email ='$email' AND password = '$password'") or die(mysqli_error($conn));

		if(mysqli_num_rows($v)==1){

			# get user data
			$userData = mysqli_fetch_array($v);
			$_SESSION['user'] = $userData;
			header('Location:profile.php');

		} else {
			echo "<h4 style='color:red'>Invalid user!</h4>";
		}
	}
?>
					</div>
				</div>
			</section>

		<?php include ('footer.php') ?>
	</body>
</html>