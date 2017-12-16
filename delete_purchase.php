<?php 

	include 'config.php';

	$c_product_id = isset($_REQUEST['c_product_id'])? $_REQUEST["c_product_id"]:NULL;

	$delete = isset($_REQUEST['delete'])? $_REQUEST['delete']:NULL;

	//$void = isset($_REQUEST['void'])? $_REQUEST['void']:NULL;


	if($delete=="yes"){
		$sql = "DELETE FROM canvas WHERE c_product_id = $c_product_id";
		if($con->query($sql)){
            echo "Product has been deleted";
       		header("location: canvas.php");
       	}
        else{
            echo "Error deleting Record";	
        }

        $sqlx = "DELETE FROM canvas_tempo WHERE c_product_id = $c_product_id";
		if($con->query($sqlx)){
            echo "Product has been deleted";
       		header("location: canvas.php");
       	}
        else{
            echo "Error deleting Record";	
        }
    }

    /*
    if($void=="yes"){
		$sql = "TRUNCATE TABLE purchase";
		$results = $con->query($sqls);
		if($con->query($sql)){
            echo "Product has been deleted";
       		header("location: canvas.php");
       	}

        
    }
    */

?>