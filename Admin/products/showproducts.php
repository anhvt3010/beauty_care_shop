<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$products = $connect->query("select*from products where brandid=$id");
		if(mysqli_num_rows($products)!=0){
			$connect->query("update products set status=0 where id=$id");
		} else {
			$connect->query("delete from products where id=$id");
			unlink("imageproducts/".$_GET['image']);
			header("location: ?option=product");
		}
	}
?>

<?php
	$query="select*from products order by id desc ";
	$result=$connect->query($query);

?>
<h1>List Products</h1>
<section style="text-align: center;"><a href="?option=productadd" class="btn btn-success">Add Products</a></section>
<table class="table table-bodered">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Name </th>
			<th>Price </th>
			<th>Image</th>
			<th>Portfolio</th>
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
					<td width="25%"><?=$item['name']?></td>
					<td style="color: red;"><?=number_format($item['price'],0,',','.')?></td>
					<td width="30%"><img src="../imageproducts/<?=$item['image']?>" width="20%"></td>
					<td><?=$item['productportfolio']?></td>
					<td><?=$item['status']==1?'Active':'Unactive'?></td>
					<td>
						<a class="btn btn-sm btn-info" href="?option=productupdate&id=<?=$item['id']?>">Update</a>
						<a class="btn btn-sm btn-danger" href="?option=product&id=<?=$item['id']?>&image=<?=$item['image']?>" onclick="return confirm ('Are you sure ?')">Delete</a>
					</td>
				</tr>
		<?php endforeach; ?>
	</tbody>
</table>