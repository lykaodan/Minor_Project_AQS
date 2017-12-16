<?php 
	include 'config.php';
	$product_id = isset($_REQUEST['product_id'])? $_REQUEST["product_id"]:NULL;
	$description = isset($_REQUEST['description'])? $_REQUEST["description"]:NULL;
	$qty = isset($_REQUEST['qty'])? $_REQUEST["qty"]:NULL;
	$price = isset($_REQUEST['price'])? $_REQUEST["price"]:NULL;
	$total = isset($_REQUEST['total'])? $_REQUEST["total"]:NULL;
?>


<html>
<head>
<body>
<link rel="stylesheet" href="quote.css">

<h1><center>EDIT PRODUCT</center></h1>

<form action="<?php $_PHP_SELF ?>" method = "POST">
<div class = "sides2"

<input type="submit" id="view_product" name="view_product" value="View Products"/><br/><br/>
Item: <b><u><?php echo $description; ?></u></b><br/><br />
Current Price: <u>P<?php echo $price; ?></u><br/><br />
New Price: <br/>
<input type="number" name="price" value=""><br/><br/>

<input type="submit" name="submit" value="Submit"><br/><br/>
</div>
</form>

</body>
</html>

<?php 

	if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Submit"){
			$price = $_POST['price'];
			$sql = "UPDATE product SET qty =\"".$qty."\", price = \"".$price."\", total = \"".$total."\"
		   	WHERE product_id = \"".$product_id."\" ";

		  	if($con->query($sql)){
            	echo "Quantity has been added";
            	header("location: manage_product.php");
       		}
        	else{
           		echo "Error Adding quantity";
           	}
			

	}

	if(isset($_POST['view_product']) && $_REQUEST['view_product'] == "View Products"){
			header("location: view_product.php");
	}

?>