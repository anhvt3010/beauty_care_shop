<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$connect->query("delete from orderdetail where orderid=$id");
		$connect->query("delete from orders where id=$id");
		header("location: ?option=order&status=4");
}
?>

<?php
$status=$_GET['status'];
	$query="select*from orders where status=".$_GET['status']." order by id desc";
	$result=$connect->query($query);
?>
<h1>ORDER<?=$status==1?'UNPROCESSED':($status==2?'PROCESSING':($status==3?'PROCESSED':'CANCEL'))?></h1>
<table class="table table-bodered">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Date </th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $count=1;?>
		<?php foreach ($result as $item):?>
				<tr>
					<td><?=$count++?></td>
					<td><?=$item['id']?></td>
					<td><?=$item['orderdate']?></td>
					<td>
					   <a class="btn btn-sm btn-info" href="?option=orderdetail&id=<?=$item['id']?>">Detail</a>
					   <a style="display:<?=$status==4?'':'none'?>" class="btn btn-sm btn-danger" href="?option=order&id=<?=$item['id']?>" onclick="return confirm ('Are you sure?')">Delete</a>
					</td>
				</tr>
		<?php endforeach; ?>
	</tbody>
</table>