<?php
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$query = "select*from products where name='$name'";
		$result = $connect->query($query);
		if(mysqli_num_rows($result)!=0){
			$alert = "This product already exists!";
		} else {
			$brandid=$_POST['brandid'];
			$portfolio = $_POST['portfolioid'];
			$price=$_POST['price'];
			$description=$_POST['description'];
			$status = $_POST['status'];
			//xử lý ảnh
			$store="../imageproducts/";
			$imageName=$_FILES['image']['name'];
			$imageTemp=$_FILES['image']['tmp_name'];
			$exp3=substr($imageName, strlen($imageName)-3);
			$exp4=substr($imageName, strlen($imageName)-4);
			if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp4=='webp'||$exp4=='jpeg'){
				//$imageName=time().'_'.$imageName;
				move_uploaded_file($imageTemp, $store.$imageName);
				$query="insert products (brandid, productportfolio, name, price, image, description, status) values ('$brandid','$portfolio','$name','$price','$imageName','$description','$status')";
				$result=$connect->query($query);
				header("location:?option=product");
				unset($_SESSION['alert']);
			}else{
				$alert="Not File Image !";
			}
		}
	} 
?>
<?php 
	$brands=$connect->query("select*from showbrands");
	$portfoliosp = $connect->query("select * from productportfolio ");
?>
<h1>ADD PRODUCTS</h1>
<section style="color: red; font-weight: bold;text-align: center;"><?=isset($alert)?$alert:''?></section >
<section class="container col-md-6">
	<form method="post" enctype="multipart/form-data">
		<section class="form-group">
			<label>Brand:</label>
			<select name="brandid" >
				<option hidden>--Choose brand--</option>
				<?php foreach ($brands as $item): ?>
					<option value="<?=$item['id']?>"><?=$item['brandname']?></option>	
				<?php endforeach ?>
			</select>
		</section>
		<section class="form-group">
			<label>Product Portfolio:</label>
			<select name="portfolioid" >
				<option hidden>--Choose Product Portfolio--</option>
				<?php foreach ($portfoliosp as $item): ?>
					<option value="<?=$item['id']?>"><?=$item['portfolio']?></option>	
				<?php endforeach ?>
			</select>
		</section>
		<section class="form-group">
			<label>Name:</label><input name="name" class="form-control">
		</section>
		<section class="form-group">
			<label>Price:</label><input name="price" class="form-control">
		</section>
		<section class="form-group">
			<label>Image:</label><input type="file" name="image" class="form-control">
		</section>
		<section class="form-group">
			<label>Desciption:</label>
			<textarea name="description" id="description"></textarea>
			<script>CKEDITOR.replace("description");</script>
		</section>
		<section class="form-group">
			<label>Status brand: </label><br>
				<input type="radio" name="status" value="1" checked > Acitve
				<input type="radio" name="status" value="0"> Unacitve
		</section>
		<section>
			<input type="submit" value="Thêm" class="btn btn-primary">
			<a class="btn btn-secondary" href="?option=product"> <- Back</a>
		</section > 
	</form>
</section>