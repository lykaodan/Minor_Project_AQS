	<?php

	include 'config.php';
	$sql = "SELECT * FROM product";
	$result = $con->query($sql);

	if(isset($_POST['home']) && $_REQUEST['home'] == "Home"){
       		header("location: home.php");
	}

	if(isset($_POST['add_product']) && $_REQUEST['add_product'] == "Add new Product"){
			header("location: add_product.php");
	}


?>
<html>
<link rel="stylesheet" href="quote.css">
<body>
<h1><center>PRODUCTS</center></h1>
<form action="view_product.php" method="POST">
<div class="sides"><center>
<input type="submit" class="myButton" id="home" name="home" value="Home"/>
<input type="submit" class="myButton" id="add_product" name="add_product" value="Add new Product"/><br/><br/>
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
				<td><center><?php echo $row['description']; ?></td>
				<td><center><?php echo "P".$row['price']; ?></td>
			</tr>
			<?php }
				}
			?>
		</tbody>
	</table>
</center></div>
</form>
</body>
</html>
