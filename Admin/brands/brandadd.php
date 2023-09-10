<?php
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$query = "select*from showbrands where brandname='$name'";
		$result = $connect->query($query);
		if(mysqli_num_rows($result)!=0){
			$alert = "This brand already exists!";
		} else {
			$status = $_POST['status'];

			//xử lý ảnh
			$store="../logobrands/";
			$imageName=$_FILES['image']['name']; // lấy tên file ảnh
			$imageTemp=$_FILES['image']['tmp_name'];
			$exp3=substr($imageName, strlen($imageName)-3);
			$exp4=substr($imageName, strlen($imageName)-4);
			if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp4=='webp'||$exp4=='jpeg'){
				// $imageName=time().'_'.$imageName; //tránh việc trùng ảnh không up được
				move_uploaded_file($imageTemp, $store.$imageName);
				$query = "insert showbrands(brandname,imagelogo,status) values ('$name','$imageName','$status')";
				$result=$connect->query($query);
				header("location:?option=brand");
				unset($_SESSION['alert']);
			}else{
				$alert="Not File Image !";
			}
		}
	} 
?>
<h1>ADD BRAND</h1>
<section style="color: red; font-weight: bold;text-align: center;"><?=isset($alert)?$alert:''?></section >
<section class="container col-md-6">
	<form method="post" enctype="multipart/form-data" >
		<section class="form-group">
			<label>Brand name: </label><input name="name" class="form-control">
		</section>		
		<section class="form-group">
			<label>Image:</label><input type="file" name="image" class="form-control">
		</section>
		<section class="form-group">
			<label>Status: </label><br>
				<input type="radio" name="status" value="1" checked > Acitve
				<input type="radio" name="status" value="0"> Unacitve
		</section>
		<section>
			<input type="submit" value="Add" class="btn btn-primary">
			<a class="btn btn-secondary" href="?option=brand"> <- Back</a>
		</section > 
	</form>
</section>