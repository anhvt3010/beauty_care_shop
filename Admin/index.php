<?php session_start(); ?>
<?php $connect = new MySQLi('localhost','root','','eproject1'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN W E K I N</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js/ckeditor/ckeditor.js"></script>
	<link rel="icon" href="images/WEKIN-logo-admin.png">
</head>
<body>
	<?php
		if (isset($_POST['user'])) {
			$username = $_POST['user'];
			$password = md5($_POST['pass']);
			$query="select*from admin where username='$username' and password= '$password'";
			$result = $connect->query($query);
			if (mysqli_num_rows($result)==0) {
				$alert="User or Password incorrect !";
			} else {
				$result = mysqli_fetch_array($result);
				if ($result['status']==0) {
					$alert="Account is locked";
				} else {
					$_SESSION['admin'] = $username;
					header("Refresh:0");
				}
			}
		}
	?>
	<section>
		<?php 
			if (isset($_SESSION['admin'])) {
				include"admincontrol.php";
			} else {
				include"login.php";
			}
		?>
	</section>
</body>
</html>