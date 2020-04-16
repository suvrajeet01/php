<!DOCTYPE HTML>
<html>
	<head>
		<title>About</title>
		<?php include ('header.php') ?>
	</head>
	<body class="is-preload">

		<?php include('navbar.php') ?>
		<!-- Heading -->
			<div id="heading" >
				<h1>Register here</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<h2>Register</h2>
						</header>
						<form method="post">
	<table>
		<tr>
			<td>
				Name
			</td>
			<td>
				<input type="text" name="nm" required>
			</td>
		</tr>
		<tr>
			<td>
				Email
			</td>
			<td>
				<input type="email" name="em" required>
			</td>
		</tr>
		<tr>
			<td>
				Password
			</td>
			<td>
				<input type="password" name="pass" required>
			</td>
		</tr>
		<tr>
			<td>
				Phone
			</td>
			<td>
				<input type="text" name="ph" required>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="kkk" value="Sign Up">
			</td>
		</tr>
	</table>
</form>
<?php
	if( isset ( $_POST['kkk'] ) ) {
		

		$name = $_POST['nm'];
		$email = $_POST['em'];

		# verify if email already exists or not

		$verify = mysqli_query($conn,"SELECT email FROM user WHERE email='$email'") or die(mysqli_error($conn));

		if(mysqli_num_rows($verify)==1){
			echo "Email already exists";

		} else {
		$pwd = $_POST['pass'];
		//$pwd = md5($_POST['pass']);
		$phno = $_POST['ph'];
		$datetime = date('d-m-Y H:i:s');

		# execute sql query to save data
		$saveData = mysqli_query($conn,"INSERT INTO user VALUES (0,'$name','$email','$pwd','$phno','$datetime','')") or die(mysqli_error($conn));




	//	var_dump($saveData);
		if($saveData){
			#$find = mysqli_query($conn,"SELECT * FROM user") or die(mysqli_error($conn));
			# mysqli_num_rows in built function to find the number of records found
			#$count = mysqli_num_rows($find);

			header('Location:login.php');

		}
	}

	}
?>
					</div>
				</div>
			</section>

		<?php include ('footer.php') ?>
	</body>
</html>