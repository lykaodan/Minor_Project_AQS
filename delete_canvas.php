<?php 

	include 'config.php';

	$p_product_id = isset($_REQUEST['p_product_id'])? $_REQUEST["p_product_id"]:NULL;

	$delete = isset($_REQUEST['delete'])? $_REQUEST['delete']:NULL;

	$void = isset($_REQUEST['void'])? $_REQUEST['void']:NULL;


	if($delete=="yes"){
	$sql = "DELETE FROM purchase WHERE p_product_id = $p_product_id";
		if($con->query($sql)){
            echo "Product has been deleted";
       		header("location: view_purchase.php");
       	}
        else{
            echo "Error deleting Record";	
        }
    }

    if($void=="yes"){
		$sql = "TRUNCATE TABLE purchase";
		$results = $con->query($sqls);
		if($con->query($sql)){
            echo "Product has been deleted";
       		header("location: view_purchase.php");
       	}

        
    }

?>