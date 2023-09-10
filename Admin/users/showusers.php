 <!-- <?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$connect->query("delete from user where id=$id");
		$result=$connect->query($query);
	}
?>  -->

<?php
	$query="select*from user";
	$result=$connect->query($query);

?>
<h1 style="font-weight: bold; color: red;">USER MANAGEMENT</h1>
<br>
<table class="table table-bodered">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>username</th>
			<th>Fullname</th>
			<th>Mobile</th>
			<th>Address</th>
			<th>Email</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $count=1;?>
		<?php foreach ($result as $item):?>
				<tr>
					<td><?=$count++?></td>
					<td><?=$item['id']?></td>
					<td><?=$item['username']?></td>
					<td><?=$item['fullname']?></td>
					<td><?=$item['mobile']?></td>
					<td><?=$item['address']?></td>
					<td><?=$item['email']?></td>
					<td><?=$item['status']==1?'Active':'Unactive'?></td>
					<td>
						<a class="btn btn-sm btn-info" href="?option=userupdate&id=<?=$item['id']?>">Update</a>
					</td>
				</tr>
		<?php endforeach; ?>
	</tbody>
</table>