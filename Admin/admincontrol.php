<?php
	$chuaxuly=mysqli_num_rows($connect->query("select*from orders where status=1"));
	$dangxuly=mysqli_num_rows($connect->query("select*from orders where status=2"));
	$daxuly=mysqli_num_rows($connect->query("select*from orders where status=3"));
	$huy=mysqli_num_rows($connect->query("select*from orders where status=4"));
?>
<table class="table table-brodered tbl-admin">
	<tbody>
		<tr >
			<td style="width: 15%;text-align: center;">Hello: <?=$_SESSION['admin'];?><br>[<a href="?option=logout">Log Out</a>] </td>
			<td style="text-align: center;">ADMIN CONTROL PANEL</td>
		</tr>
		<tr>
			<td>
				<section><a  class="btn btn-outline-primary" href="?option=users">>>user management</a></section>
				<section><a  class="btn btn-outline-primary" href="?option=brand">>>Brands</a></section>
				<section><a class="btn btn-outline-success" href="?option=product">>>Products</a></section>
				<section>
					<section class="btn btn-outline-primary" >>>ORDER</section>
					<section><a href="?option=order&status=1">&nbsp;&nbsp;Unprocessed[<span style="color:red"><?=$chuaxuly?></span>]</a></section>
					<section><a href="?option=order&status=2">&nbsp;&nbsp;Processing[<span style="color:red"><?=$dangxuly?></span>]</a></section>
					<section><a href="?option=order&status=3">&nbsp;&nbsp;Processed[<span style="color:red"><?=$daxuly?></span>]</a></section>
					<section><a href="?option=order&status=4">&nbsp;&nbsp;Cancel[<span style="color:red"><?=$huy?></span>]</a></section>
				</section>
				<section><a class="btn btn-outline-primary" href="?option=feedback">>>Feedback</a></section>
				<section><a class="btn btn-outline-primary" href="?option=comments">>>Comments</a></section>
			</td>
			<td>
				<?php 
					if (isset($_GET['option'])) {
						switch ($_GET['option']) {
							case 'logout':
								unset($_SESSION['admin']);
								header("Location:.");
								break;
							case 'brand':
								include"brands/showbrand.php";
								break;
							case 'brandadd':
								include"brands/brandadd.php";
								break;
							case 'brandupdate':
								include"brands/brandupdate.php";
								break;
							case 'product':
								include"products/showproducts.php";
								break;
							case 'productadd':
								include"products/productadd.php";
								break;
							case 'productupdate':
								include"products/productupdate.php";
								break;
							case'order':
								include"orders/showorders.php";
								break;
							case'orderdetail':
								include"orders/orderdetail.php";
								break;
							case 'feedback':
								include'feedback/feedback.php';
								break;
							case 'feedbackupdate':
								include 'feedback/feedbackupdate.php';
								break;
							case 'comments':
								include 'comments/comments.php';
								break;
							case 'commentupdate':
								include 'comments/commentupdate.php';
								break;
							case'users':
								include"users/showusers.php";
								break;
							case'userupdate':
								include"users/userupdate.php";
								break;	
						}
					}
				?>
			</td>
		</tr>
	</tbody>
</table>