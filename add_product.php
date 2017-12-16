<html>
<link rel="stylesheet" href="quote.css">
<body>
<h1><center>ADD PRODUCT</center></h1>
<form action="add_product.php" method="POST">
<div class="sides2">
<center>
<input type="submit" class="myButton" id="home" name="home" value="Home"/>
<input type="submit" class="myButton" id="view_product" name="view_product" value="View Product"/><br/><br/>
</center>
Product Description: <br/>
<input type="text" class="inpt" name="description" value="" placeholder="" align="left" size="20"><br/><br />
Price: <br/>
<input type="number" name="price" value="" placeholder="0.00" size="12"> <br/><br/>
<input type="submit" class="myButton" id="add" name="add" value="Add"/>
</div>
</form>
</body>
</html>
<?php

	include 'config.php';

	if(isset($_POST['add']) && $_REQUEST['add'] == "Add"){
		$description = $_POST['description'];
		$qty = 0;
		$price = $_POST['price'];
		$total = $qty*$price;


		$sql = "INSERT INTO product(description, qty, price, total)
				VALUES (\"".$description."\",\"".$qty."\",\"".$price."\",\"".$total."\")";

        if($con->query($sql)){
            echo "Product has been added";
        	header("location: home.php");
        }
        else
            echo "Error Adding Record";
        	header("location: home.php");

	}
	if(isset($_POST['view_product']) && $_REQUEST['view_product'] == "View Product"){
			header("location: view_product.php");
	}
	if(isset($_POST['home']) && $_REQUEST['home'] == "Home"){
       		header("location: home.php");
	}

?>
