<?php 
	include 'config.php';
	$c_product_id = isset($_REQUEST['c_product_id'])? $_REQUEST["c_product_id"]:NULL;
	$c_description = isset($_REQUEST['c_description'])? $_REQUEST["c_description"]:NULL;
	$c_qty = isset($_REQUEST['c_qty'])? $_REQUEST["c_qty"]:NULL;
	$c_price = isset($_REQUEST['c_price'])? $_REQUEST["c_price"]:NULL;
	$c_total = isset($_REQUEST['c_total'])? $_REQUEST["c_total"]:NULL;

?>
<html>
<body>
<link rel="stylesheet" href="csss.css">
<form action="<?php $_PHP_SELF ?>" method="POST">
<div class="sides">
<center> Description: <u><?php echo $c_description?></u><br/>
Price: <u>P<?php echo $c_price;?></u><br/>
Quantity: <input type="number" name="qty" value=""> <br/><br/>
<input type="submit" name="edit" value="Submit"></center>
</div>
</form>
</body>
</html>

<?php 
if(isset($_POST['edit']) && $_REQUEST['edit'] == "Submit"){
		$qty = $_POST['qty'];
		$c_total = $c_price* $qty;
		$sql = "UPDATE canvas_tempo SET c_qty =\"".$qty."\", c_total = \"".$c_total."\"
			WHERE c_product_id = \"".$c_product_id."\" ";
		  	if($con->query($sql)){
            	echo "Quantity has been added";
            	header("location: canvas.php");
       		}
        	else{
           		echo "Error Adding quantity";
           	}
}
?>