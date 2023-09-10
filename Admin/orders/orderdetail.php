
<?php
	if(isset($_GET['action'])){
		$condition=" where orderid=".$_GET['orderid']." and productid=".$_GET['productid'];
		if($_GET['type']=='asc'){			
			$query=" update orderdetail set number=number+1".$condition; 
		} else {
			$query=" update orderdetail set number=number-1".$condition;
		}
		$connect->query($query);
		header("location:  ?option=orderdetail&id=".$_GET['id']);
	}
	if(isset($_POST['status'])){
		$connect->query("update orders set status=".$_POST['status']." where id=".$_GET['id']);
		header("Refresh:0");
	}
?>
<?php
	$query="select a.fullname,a.mobile as 'mobileuser',a.address as 'addressuser',a.email as 'emailuser', b.*,c.name as 'nameordermethod' 
	from user a join orders b on a.id=b.userid join ordermethod c on b.ordermethodid=c.id where b.id=".$_GET['id'];
	$result=$connect->query($query);
	$order=mysqli_fetch_array($result);
?>
<h1>ORDER DETAIL<br>(Order ID :<?=$order['id']?>)</h1>
<h2>Order Creation Date</h2>
<p><?=$order['orderdate']?></p>
<h2>Order Infomation</h2>
<table class="table">
	<tbody>
		<tr>
			<td>User:</td>
			<td><?=$order['fullname']?></td>
		</tr>
		<tr>
			<td>Mobile:</td>
			<td><?=$order['mobileuser']?></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><?=$order['addressuser']?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?=$order['emailuser']?></td>
		</tr>
		<tr>
			<td>Note:</td>
			<td><?=$order['note']?></td>
		</tr>
	</tbody>
</table>
<h2>Shipment Details</h2>
<table class="table">
	<tbody>
		<tr>
			<td>Customer Name:</td>
			<td><?=$order['name']?></td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><?=$order['mobile']?></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><?=$order['address']?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?=$order['email']?></td>
		</tr>
	</tbody>
</table>
<h2>ORDER METHOD</h2>
<section><p><?=$order['nameordermethod']?></p></section>
<?php
	$query="select a.status, b.*,c.name,c.image from orders a join orderdetail b on a.id=b.orderid join products c on b.productid=c.id where a.id=".$order['id'];
	// echo $query;
	$orderdetails=$connect->query($query);
	// $item=mysqli_fetch_array($result);
	// var_dump($item);
?>

<form method="post">
<h2>ORDERED PRODUCTS </h2>
<?php $count=1;?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Unit Price</th>
			<th>Quatity</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>	
		<?php foreach($orderdetails as $item):?>
			<tr>
				<td><?=$count++?></td>
				<td><?=$item['name']?></td>
				<td width="30%"><img  src="../imageproducts/<?=$item['image']?>" width='20%'></td>
				<td><?=number_format($item['price'],0,',','.')?></td>
				<td>
					<input class="btn btn-outline-danger" <?=$item['number']==0?'disabled':''?> type="button" value="-" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=desc&orderid=<?=$item['orderid']?>&productid=<?=$item['productid']?>'">
					<?=$item['number']?>
					<input class="btn btn-outline-info"  type="button" value="+" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=asc&orderid=<?=$item['orderid']?>&productid=<?=$item['productid']?>'">				
					
				</td>
				<td><?=number_format(($total=$item['price']*$item['number']),0,',','.')?></td>
			</tr>
			<?php 
				$alltotal = 0;
				$alltotal+=$total; 
			?>
		<?php endforeach;?>
		<td colspan="5"> Total Price </td>
		<td><?=number_format($alltotal,0,'.',',')?></td>
	</tbody>
</table>
<h2>OERDER STATUS</h2>
	<p style="display: <?=$order['status']==2 || $order['status']==3?'none':''?>;">
		<input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?>>&emsp;Unprocessed
	</p>

	<p style="display: <?=$order['status']==3?'none':''?>;">
		<input type="radio" name="status" value="2" <?=$order['status']==2?'checked':''?>>&emsp;Processing
	</p>

	<p>
		<input type="radio" name="status" value="3" <?=$order['status']==3?'checked':''?>>&emsp;Processed
	</p>

	<p style="display: <?=$order['status']==3?'none':''?>;">
			<input type="radio" name="status" value="4" <?=$order['status']==4?'checked':''?>>&emsp;Cancel
	</p>

	<section>
		<a class="btn btn-danger" href="?option=order&status=1">Back</a>
		&emsp;
		<input  <?=$order['status']==3?'disabled':''?> type="submit" value="Update" class="btn btn-primary">
	</section>

</form>