<?php 
	
	include 'config.php';


	$client_id = isset($_REQUEST['client_id'])? $_REQUEST["client_id"]:NULL;
	$quotation_date = isset($_REQUEST['quotation_date'])? $_REQUEST["quotation_date"]:NULL;

	$product_id = isset($_REQUEST['product_id'])? $_REQUEST["product_id"]:NULL;
	$description = isset($_REQUEST['description'])? $_REQUEST["description"]:NULL;
	$qty = isset($_REQUEST['qty'])? $_REQUEST["qty"]:NULL;
	$price = isset($_REQUEST['price'])? $_REQUEST["price"]:NULL;
	$total = isset($_REQUEST['total'])? $_REQUEST["total"]:NULL;
	
	$delete = "no";
	$delete = isset($_REQUEST['delete'])? $_REQUEST['delete']:NULL;


	if($delete=="no"){

		$sql = "INSERT INTO canvas(client_id, c_product_id, c_description, c_qty, c_price, c_total, date_quotation) 
				VALUES (\"".$client_id."\",\"".$product_id."\",\"".$description."\",\"".$qty."\",\"".$price."\",\"".$total."\"
				,\"".$quotation_date."\")";

        if($con->query($sql)){
            echo "Product has been added";
       		header("location: canvas.php");
       	}
        else{
            echo "Error Adding Record";	
		}

		$sqlx = "INSERT INTO canvas_tempo(client_id, c_product_id, c_description, c_qty, c_price, c_total, date_quotation) 
				VALUES (\"".$client_id."\",\"".$product_id."\",\"".$description."\",\"".$qty."\",\"".$price."\",\"".$total."\"
				,\"".$quotation_date."\")";

        if($con->query($sqlx)){
            echo "Product has been added";
       		header("location: canvas.php");
       	}
        else{
            echo "Error Adding Record";	
		}
	}

	if($delete=="yes"){
	$sql = "DELETE FROM product WHERE product_id = $product_id";
		if($con->query($sql)){
       		header("location: canvas.php");
       	}
    }

?>