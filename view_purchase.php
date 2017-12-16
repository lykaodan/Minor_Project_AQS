<?php 
	
	include 'config.php';
	$sql = "SELECT * FROM purchase";
	$result = $con->query($sql);
	$all_total = 0;
?>
<html>
<body>
<form action="view_purchase.php" method="POST">
<h1>TO PURCHASE</h1>
<input type="submit" id="view_product" name="view_product" value="View Product"/> 
<input type="submit" id="delete_all" name="delete_all" value="Delete All"/> <br/><br/>
<table>
		<thead>
			<tr>
				<th><u>Description</u></th>
				<th><u>Price</u></th>
				<th><u>Pieces</u></th>
				<th><u>Total</u></th>
			</tr>
		</thead>
		
		<tbody>
			<?php if($result->num_rows > 0){
				while($row = $result->fetch_array()){
			?>
			<tr>
				<td><?php echo $row['p_description']; ?></td>
				<td><?php echo "P".$row['p_price']; ?></td>
				<td><center><?php echo $row['p_qty']; ?>pc(s).</center></td>
				<td><?php echo "P".$row['p_total']; ?></td>
				<td> | <a href="delete_purchase.php ?>
				&delete=yes
				&p_product_id=<?php echo $row['p_product_id'];?>
				"> DELETE </a> | </td>
				<?php $all_total = $row['p_total'] + $all_total;?>
			</tr>
			<?php } 
				}
			?>
		</tbody>
	</table>
	===================================<br/>
	TOTAL: P<?php echo $all_total; ?><br/>
	===================================<br/>
<input type="submit" id="buy" name="buy" value="Buy"/> 
</form>
</body>
</html>
<?php 
	if(isset($_POST['view_product']) && $_REQUEST['view_product'] == "View Product"){
			header("location: view_product.php");
	}

	if(isset($_POST['delete_all']) && $_REQUEST['delete_all'] == "Delete All"){
			$sql = "TRUNCATE TABLE purchase";
				$results = $con->query($sqls);
				if($con->query($sql)){
       				header("location: view_purchase.php");
				}
	}

	if(isset($_POST['buy']) && $_REQUEST['buy'] == "Buy"){
			header("location: transaction.php");
	}
	
?>