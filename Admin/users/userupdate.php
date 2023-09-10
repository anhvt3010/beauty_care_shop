<?php $user=mysqli_fetch_array($connect->query("select*from user where id=".$_GET['id']));?>
<?php
	if (isset($_POST['fullname'])) {
			$fullname = $_POST['fullname'];
			$status = $_POST['status'];
			$connect->query( "update user set fullname='$fullname', status='$status' where id=".$user['id']);
			header("Location: ?option=users");
		}	
?>
<h1>USER UPDATE</h1>
<section class="container col-md-6">
	<form method="post">
		<section class="form-group">
			<label>Fullname</label><input value="<?=$user['fullname']?>" name="fullname" class="form-control">
		</section>
		<section class="form-group">
			<label>Status: </label><br>
				<input type="radio" name="status" value="1" <?=$user['status']==1?'checked':''?> > Acitve
				<input type="radio" name="status" value="0" <?=$user['status']==0?'checked':''?> > Unacitve
		</section>
		<section>
			<input type="submit" value="Update" class="btn btn-primary">
			<a class="btn btn-secondary" href="?option=users"> <- Back</a>
		</section > 
	</form>
</section>