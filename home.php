<?php

	include 'config.php';

?>
<html>
<link rel="stylesheet" href="quote.css">
<body>


<center><p>APOLINARIO'S QUOTATION SYSTEM</p>
</center>
<form action = "home.php" method="POST">

	<div class="container">
		<div id="top">
		<button type="submit" id="new_quotation" style="background: transparent; border: 0;" name="new_quotation" value="Add new Quotation"><img src="new_Quotation.png" width="250" height = "180" alt="submit" />
		</button>
		<button type="submit" id="add_product" style ="border: 0; background: transparent;" name="add_product" value="Add new Product"/><img src="new_product.png" width="250" height = "180" alt="submit" /></button>
		<button type="submit" id="manage_product" style ="border: 0; background: transparent" name="manage_product" value="Manage Products"/><img src="manage_product.png" width="250" height = "180" alt="submit" /></button>
		</div>
		<div id = "bottom">
		<button type="submit" id="view_product" style ="border: 0; background: transparent" name="view_product" value="View Products"/><img src="view_product.png" width="250" height = "180" alt="submit" /></button>
		<button type="submit" id="clients" style ="border: 0; background: transparent" name="clients" value="Clients"/><img src="clients.png" width="250" height = "180" alt="submit" /></button>
		<button type="submit" id="records" style="border: 0; background: transparent;" name="records" value="Records"><img src="records.png" width="250" height="180" alt="submit" /></button>
	</div>
	</div>

</form>

</body>
</html>

<?php

	if(isset($_POST['new_quotation']) && $_REQUEST['new_quotation'] == "Add new Quotation"){
			header("location: quotation_form.php");
	}

	if(isset($_POST['add_product']) && $_REQUEST['add_product'] == "Add new Product"){
			header("location: add_product.php");
	}

	if(isset($_POST['manage_product']) && $_REQUEST['manage_product'] == "Manage Products"){
			header("location: manage_product.php");
	}

	if(isset($_POST['view_product']) && $_REQUEST['view_product'] == "View Products"){
			header("location: view_product.php");
	}

	if(isset($_POST['clients']) && $_REQUEST['clients'] == "Clients"){
			header("location: clients.php");
	}
	if(isset($_POST['records']) && $_REQUEST['records'] == "Records"){
			header("location: records.php");
	}

	if(isset($_POST['restart']) && $_REQUEST['restart'] == "Restart"){

		$sqla = "TRUNCATE TABLE client";
		$resulta = $con->query($sqla);

		$sqlb = "TRUNCATE TABLE canvas";
		$resultb = $con->query($sqlb);

		$sqlaa = "TRUNCATE TABLE client_tempo";
		$resultaa = $con->query($sqlaa);

		$sqlbb = "TRUNCATE TABLE canvas_tempo";
		$resultbb = $con->query($sqlbb);

		$sqlc = "TRUNCATE TABLE client_log";
		$resultc = $con->query($sqlc);

       		header("location: home.php");

	}


?>
