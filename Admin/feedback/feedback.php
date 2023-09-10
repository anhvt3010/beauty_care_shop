<?php 
	$query = "select * from feedback";
    $result = $connect->query($query);
    $id = isset($_GET['id'])?$_GET['id']:'';
    if(mysqli_num_rows($result)!=0){
			$connect->query("delete from feedback where id=$id");
			header("location:?option=feedback");
		}
?>
<h1>FEEDBACK</h1>
<table class="table table-brodered tbl-admin" >
	<thead>
		<tr class="head-table" >
			<td>STT</td>
			<td>Name</td>
			<td>Phone</td>
			<td>Email</td>
			<td>Content</td>
			<td>Status</td>
			<td>Created Date</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $item):?>
				<tr>
					<td><?=$item['id']?></td>
					<td><?=$item['name']?></td>
					<td><?=$item['mobile']?></td>
					<td><?=$item['email']?></td>
					<td><?=$item['content']?></td>
					<td><?=$item['datefeedback']?></td>
					<td><?=$item['status']==1?'ON':'OFF'?></td>
					<td>
						<a class="btn btn-sm btn-info" href="?option=feedbackupdate&id=<?=$item['id']?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="?option=feedback&id=<?=$item['id']?>" onclick="return confirm ('Are you sure ?')">Delete</a>
					</td>
				</tr>
		<?php endforeach; ?>
	</tbody>
</table>