<?php 
	$comments = $connect->query("select*from comments");
	$comments = mysqli_fetch_array($comments);

    if (isset($_POST['flexRadioDefault'])) {
    	$query = "update comments set status='$status' where id=".$comments['id'];
    	$result = $connect->query($query);
    	header("location:?option=comments");
    }
?>

<style>
	.edit-fb { width: 100%; text-align: center; }
	.mb-3 { width: 80%; }
	.form-label { width: 20%; float: left; margin: 5px 0px; }
	.form-control { width: 80%; float: left; margin: 5px 0px; }
	
	.form-check-label { width: 60%; float: left; text-align: left; }
</style>
<h1>FEEDBACK UPDATE</h1>
<section class="edit-fb" >
<form class="mb-3" method="post" >
  	<label class="form-label">Status: </label>
  	<section>
  		<section class="form-check-label">
  			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" <?=$comments['status']==1?'checked':''?>>
  			<label class="form-check-lael" for="flexRadioDefault1"  >ON</label>
		</section>
		<section class="form-check-label">
  			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
  			value="0" <?=$comments['status']==0?'checked':''?>>
  			<label class="form-check-lael" for="flexRadioDefault2">OFF</label>
		</section>
	</section>
	<input class="form-label" type="submit" value="Submit">
</form>
</section>