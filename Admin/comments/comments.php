<?php 
	// $comments = $connect->query("select*from user a join comments b on a.id=b.userid join products c on b.productid=c.id ");
	$comments = $connect->query("select*from comments");
	// $comments = mysqli_fetch_array($comments);
	if(mysqli_num_rows($comments)!=0){
			$connect->query("delete from comments where id=$id");
			header("location:?option=comments");
		}
?>
<h1>COMMENTS</h1>
<table class="table table-brodered tbl-admin" >
	<thead>
		<tr class="head-table" >
			<td>STT</td>
			<td>Userid</td>
			<td>Productid</td>
			<td>Content</td>			
			<td>Created Date</td>
			<td>Status</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($comments as $item):?>
				<tr>
					<td><?=$item['id']?></td>
					<td><?=$item['userid']?></td>
					<td><?=$item['productid']?></td>
					<td><?=$item['content']?></td>
					<td><?=$item['date']?></td>
					<td><?=$item['status']==1?'ON':'OFF'?></td>
					<td>
						<a class="btn btn-sm btn-info" href="?option=commentupdate&id=<?=$item['id']?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="?option=comments&id=<?=$item['id']?>" onclick="return confirm ('Are you sure ?')">Delete</a>
					</td>
				</tr>
		<?php endforeach; ?>
	</tbody>
</table>