<?php 

	include 'config.php';
	$sql = "SELECT * FROM product";
	$result = $con->query($sql);

	$sqlxy = "SELECT * FROM client";
	$resultxy = $con->query($sqlxy);

	if($resultxy->num_rows > 0){
				while($row = $resultxy->fetch_array()){
					$client_id = $row['client_id'];
					$quotation_date = $row['quotation_date'];
				}
			}

	$sqlx = "SELECT * FROM client_tempo";
	$resultx = $con->query($sqlx);

	$sqly = "SELECT * FROM canvas_tempo";
	$resulty = $con->query($sqly);
	

	if(isset($_POST['reset']) && $_REQUEST['reset'] == "Reset"){
		if($result->num_rows > 0){
				while($row = $result->fetch_array()){
					$qty = 0;
					$price = $row['price'];
					$total = $price*$qty;

					$sql = "UPDATE product SET qty =\"".$qty."\", price = \"".$price."\", total = \"".$total."\"
		   			WHERE product_id = \"".$row['product_id']."\" ";

		  			if($con->query($sql)){
            		header("location: canvas.php");
       				}	
				}
			}
	}

	if(isset($_POST['home']) && $_REQUEST['home'] == "Home"){
		$sqla = "TRUNCATE TABLE client_tempo";
		$resulta = $con->query($sqla);

		$sqlb = "TRUNCATE TABLE canvas_tempo";
		$resultb = $con->query($sqlb);

       		header("location: home.php");
       	

	}
	
	if(isset($_POST['preview']) && $_REQUEST['preview'] == "Preview"){
		header("location: preview_reciept.php");
	}
	
?>
<html>
<link rel="stylesheet" href="quote.css">
<body>
<h1><center>LIST OF PRODUCTS</center></h1>
<form action="canvas.php" method="POST">
<div class="sides">
<center><input type="submit" class="myButton" id="home" name="home" value="Home"/> <input type="submit" class="myButton" id="reset" name="reset" value="Reset"/><br/><br/><br/>
</center>
<table>
		<thead>
			<tr>
				<th>Description </th>
				<th>Price </th>
			</tr>
		</thead>
		
		<tbody>
			<?php if($result->num_rows > 0){
				while($row = $result->fetch_array()){
			?>
			<tr>
				<td><?php echo $row['description']; ?></td>
				<td><?php echo "P".$row['price']; ?></td>
				<td><center><a href="to_canvas.php ?>
				&delete=no
				&client_id=<?php echo $client_id;?>
				&quotation_date=<?php echo $quotation_date;?>
				&product_id=<?php echo $row['product_id'];?>
				&description=<?php echo $row['description'];?>
				&qty=<?php echo $row['qty'];?>
				&price=<?php echo $row['price'];?>
				&total=<?php echo $row['total'];?>
				"> ORDER </a></td>

			</tr>
			<?php } 
				}
			?>
		</tbody>
	</table><br/>

<h1 id="qo"><center>QUOTATION ORDER</center></h1>
<?php if($resultx->num_rows > 0){
				while($row = $resultx->fetch_array()){
			?>
<div id="quotee">			
Project:	<br/><?php echo $row['project'];?></u><br/><br/>
Location:	<br/><?php echo $row['location'];?></u><br/><br/>
Date: 		<br/><u><?php echo $row['quotation_date'];?></u><br/><br/>
Attention: 	<br/><b><?php echo $row['person'];?></b>
			<br/><?php echo $row['standing'];?><br/><br/>
Subject: 	<br/><u><?php echo $row['subject'];?></u><br/><br/>
</div>		
<?php } 
				}
			?>
<table>
		<thead>
			<tr>
				<th></th>
				<th>Quantity</th>
				<th>Description</th>
				<th>Price</th>
				<th>Sub Total</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 
				$count = 1;
				if($resulty->num_rows > 0){
				while($row = $resulty->fetch_array()){
			?>
			<tr>
				<td><center><?php echo $count ?>.</td>
				<td><center><?php echo $row['c_qty']; $aq = $row['c_qty'];?></td>
				<td><center><?php echo $row['c_description']; $ad = $row['c_description'];?></td>
				<td><center><?php echo "P".$row['c_price']; $ap = $row['c_price'];?></center></td>
				<td><center><?php echo "P".$row['c_total']; $at = $row['c_total'];?></td>
				<td><center><a href="edit_pieces.php ?>
				&c_product_id=<?php echo $row['c_product_id'];?>
				&c_description=<?php echo $row['c_description'];?>
				&c_qty=<?php echo $row['c_qty'];?>
				&c_price=<?php echo $row['c_price'];?>
				&c_total=<?php echo $row['c_total'];?>
				"> EDIT QUANTITY </a>  </td>
				<td><center><a href="delete_purchase.php ?>
				&delete=yes
				&c_product_id=<?php echo $row['c_product_id'];?>
				&description=<?php echo $row['c_description'];?>
				&qty=<?php echo $row['c_qty'];?>
				&price=<?php echo $row['c_price'];?>
				&total=<?php echo $row['c_total'];?>
				"> DELETE </a>  </td>
				<?php $count = $count + 1; ?>
			</tr>
			<?php } 
				}
			?>
		</tbody>
	</table><br/>
<center>
<input type="submit" class="myButton" id="preview" name="preview" value="Preview"/><br/><br/>
</center>
</form>
</div>
</body>
</html>