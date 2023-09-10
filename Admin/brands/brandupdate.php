<?php $brand=mysqli_fetch_array($connect->query("select*from showbrands where id=".$_GET['id']));?>
<?php
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$query = "select*from showbrands where brandname='$name' and id!=".$brand['id'];
		$result = $connect->query($query);
		if(mysqli_num_rows($result)!=0){
			$alert = "This brand already exists!";
		} else {
			$status = $_POST['status'];
			$query = "update showbrands set brandname='$name', status='$status' where id=".$brand['id'];
			$connect->query($query);
			header("Location: ?option=brand");
		}
	} 
?>

<h1>BRAND UPDATE</h1>
<section style="color: red; font-weight: bold;text-align: center;"><?=isset($alert)?$alert:''?></section >
<section class="container col-md-6">
	<form method="post">
		<section class="form-group">
			<label>Name brand: </label><input value="<?=$brand['brandname']?>" name="name" class="form-control">
		</section>
		<section class="form-group">
			<label>Status: </label><br>
				<input type="radio" name="status" value="1" checked <?=$brand['status']==0?> > Active
				<input type="radio" name="status" value="0"> Unacitve
		</section>
		<section>
			<input type="submit" value="Update" class="btn btn-primary">
			<a class="btn btn-secondary" href="?option=brand"> <- Back</a>
		</section > 
	</form>
</section>