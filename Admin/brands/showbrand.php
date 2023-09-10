<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$product = $connect->query("select*from products where brandid=$id");
		if(mysqli_num_rows($product)!=0){
			$connect->query("update showbrands set status=0 where id=$id");
		} else {
			$connect->query("delete from showbrands where id=$id");
		}
	}
?>

<?php
	$query="select*from showbrands order by id desc";
	$result=$connect->query($query);

?>
<h1>BRAND</h1>
<section style="text-align: center;"><a href="?option=brandadd" class="btn btn-success">Add Brand</a></section>
<table class="table table-bodered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Brand ID</th>
			<th>Name brand</th>
			<th>Logo</th>
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
					<td><?=$item['brandname']?></td>
					<td width="30%" ><img width="20%" src="../logobrands/<?=$item['imagelogo']?>" ></td>
					<td><?=$item['status']==1?'Active':'Unactive'?></td>
					<td>
						<a class="btn btn-sm btn-info" href="?option=brandupdate&id=<?=$item['id']?>">Update</a>
						<a class="btn btn-sm btn-danger" href="?option=brand&id=<?=$item['id']?>" onclick="return confirm ('Are you sure ?')">Delete</a>
					</td>
				</tr>
		<?php endforeach; ?>
	</tbody>
</table>