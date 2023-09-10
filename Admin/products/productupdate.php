<?php $product=mysqli_fetch_array($connect->query("select*from products where id=".$_GET['id']));?>
<?php
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$query = "select*from products where name='$name' and id!=".$product['id'];
		$result = $connect->query($query);
		if(mysqli_num_rows($result)!=0){
			$alert = "This product already exists!";
		} else {
			$brandid=$_POST['brandid'];
			$price=$_POST['price'];
			$description=$_POST['description'];
			$status = $_POST['status'];
			//xử lý ảnh
			
			$store="imageproducts/";
			$imageName=$_FILES['image']['name'];
			$imageTemp=$_FILES['image']['tmp_name'];
			$exp3=substr($imageName, strlen($imageName)-3);
			$exp4=substr($imageName, strlen($imageName)-4);
			if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp4=='webp'||$exp4=='jpeg'){
				$imageName=time().'_'.$imageName;
				move_uploaded_file($imageTemp, $store.$imageName);
				unlink($store.$product['image']);
				
			}else{
				$alert="Not File Image !";
			}
			if (empty($imageName)) {
				$imageName=$product['image'];
			}
		}
				$query="update products set brandid='$brandid',name='$name',price='$price',image='$imageName', description='$description', status='$status'where id=".$product['id'];
				$result=$connect->query($query);
				header("location:?option=product");
				unset($_SESSION['alert']);
			
		}
	
?>

<?php $brands=$connect->query("select*from showbrands");?>
<h1>UPDATE PRODUCTS</h1>
<section style="color: red; font-weight: bold;text-align: center;"><?=isset($alert)?$alert:''?></section >
<section class="container col-md-6">
	<form method="post" enctype="multipart/form-data">
		<section class="form-group">
			<label>Brand:</label>
			<select name="brandid" class="form-control">
				<option hidden>--Choose brand--</option>
				<?php foreach ($brands as $item): ?>
					<option value="<?=$item['id']?>" <?=$item['id']==$product['brandid']?'selected':''?>><?=$item['brandname']?></option>	
				<?php endforeach ?>
			</select>
		</section>
		<section class="form-group">
			<label>Name:</label><input name="name" class="form-control"  value="<?=$product['name']?>">
		</section>
		<section class="form-group">
			<label>Price:</label><input name="price" class="form-control" value="<?=$product['price']?>">
		</section>
		<section class="form-group">
			<label>Image:</label><br>
			<img src="../imageproducts/<?=$product['image']?>" width="50%">
			<input type="file" name="image" class="form-control">
		</section>
		<section class="form-group">
			<label>Desciption:</label>
			<textarea name="description" id="description"  class="form-control" rows="10" ><?=$product['description']?></textarea>
			<script>CKEDITOR.replace("description");</script>
		</section>
		<section class="form-group">
			<label>Status brand: </label><br>
				<input type="radio" name="status" value="1" <?=$product['status']==1?'checked':''?> > Acitve
				<input type="radio" name="status" value="0" <?=$product['status']==0?'checked':''?> > Unacitve
		</section>
		<section>
			<input type="submit" value="cập nhật" class="btn btn-primary">
			<a class="btn btn-secondary" href="?option=product"> <- Back</a>
		</section > 
	</form>
</section>