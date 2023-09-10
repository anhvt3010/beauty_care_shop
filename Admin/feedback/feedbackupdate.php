<?php 
	$query = "select * from feedback";
    $result = $connect->query($query);
    $result = mysqli_fetch_array($result);

    if (isset($_POST['namee'])) {
    	$name = $_POST['namee'];
    	$mobile = $_POST['mobile'];
    	$email = $_POST['email'];
    	$content = $_POST['content'];
    	$status = $_POST['flexRadioDefault'];

    	$query = "update feedback set name='$name', mobile='$mobile', email='$email', content='$content',
    	status='$status' where id=".$result['id'];
    	$resultt = $connect->query($query);
    	header("location:?option=feedback");
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
  	<section>
  		<label class="form-label">Name: </label>
  		<input type="text" class="form-control" id="exampleFormControlInput1" name="namee" value="<?=$result['name']?>">
  	</section>
  	<section>
  		<label class="form-label">Mobile: </label>
  		<input type="tel" class="form-control" id="exampleFormControlInput1" name="mobile" value="<?=$result['mobile']?>">
  	</section>
  	<section>
  		<label class="form-label">Email: </label>
  		<input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?=$result['email']?>" >
  	</section>
  	<section>
  		<label class="form-label">Content: </label>
  		<textarea type="email" class="form-control" id="exampleFormControlInput1" name="content" ><?=$result['content']?></textarea>
  	</section>
  	<label class="form-label">Status: </label>
  	<section>
  		<section class="form-check-label">
  			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" <?=$result['status']==1?'checked':''?>>
  			<label class="form-check-lael" for="flexRadioDefault1"  >ON</label>
		</section>
		<section class="form-check-label">
  			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
  			value="0" <?=$result['status']==0?'checked':''?>>
  			<label class="form-check-lael" for="flexRadioDefault2">OFF</label>
		</section>
	</section>
	<input class="form-label" type="submit" value="Submit">
</form>
</section>