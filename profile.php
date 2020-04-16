<!DOCTYPE HTML>
<html>
	<head>
		<title>Profile</title>
		<?php include ('header.php') ?>
	</head>
	<body class="is-preload">

		<?php include('navbar.php') ?>
		<!-- Heading -->
			<div id="heading" >
				<h1>Profile Page</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<h2>Profile</h2>
						</header>
						<?php
						$userid = $_SESSION['user']['id'];
	$query = mysqli_query($conn,"SELECT imageurl FROM user WHERE id = '$userid'") or die(mysqli_eror($conn));
	$img = mysqli_fetch_array($query); ?>
						<img src="<?php echo $img['imageurl']?>" width='400' height='250'>
	<h1>Name:  <?php echo $_SESSION['user']['username'];?></h1>
	<h1>Email:  <?php echo $_SESSION['user']['email'];?></h1>
	<h1>Date Time:  <?php echo $_SESSION['user']['datetime'];?></h1>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				Image Name
			</td>
			<td>
				<input type="text" name="img_name" placeholder="Enter name of the image">
			</td>
		</tr>
		<tr>
			<td>
				Profile Picture Upload
			</td>
			<td>
				<input type="file" name="img">
			</td>
			<td>
				<input type="submit" name="upload">
			</td>
		</tr>
	</table>
</form>
<?php

	if(isset($_POST['upload'])){
		//$img_name = $_POST['img_name'];
		# for files
		$file_name = $_FILES['img']['name'];
		// bytes
		$file_size = $_FILES['img']['size'];

		// tmp
		$file_tmp_path = $_FILES['img']['tmp_name'];

		$file_type = $_FILES['img']['type'];

		$file_error = $_FILES['img']['error'];

		if( $file_size > 2000000 ) {
			echo "File size exceeds!";
			exit;
		}

		if( $file_type == "image/jpg" or $file_type == "image/JPG" or $file_type == "image/png" or $file_type == "image/jpeg") {

			# create path 
			// images/723_image.jpg
			$destination = "rohit/".rand(000,999).'_'.$file_name;
			# upload the file
			move_uploaded_file($file_tmp_path, $destination) or die($file_error);

			# update profile picture for user
			$userid = $_SESSION['user']['id'];
			$query = mysqli_query($conn,"UPDATE user SET imageurl = '$destination' WHERE id = '$userid'") or die(mysqli_eror($conn));

			if($query) {
				echo "<h4 style='color:green'>Upload success</h4>";
			}

		} else {
			echo 'File must be image type';
		}


	}

?>
					</div>
				</div>
			</section>

		<?php include ('footer.php') ?>
	</body>
</html>