<?php 
	
	include 'config.php';
	$sql = "SELECT * FROM purchase";
	$result = $con->query($sql);

	/*
	$sqls = "SELECT * FROM transact";
	$results = $con->query($sqls);
	*/

?>
<html>
<body>
<form action="reciept.php" method="POST">
<p>
<font size="5"><b>APOLINARIO CONCRETE PRODUCTS</b></font><br/>
Peñaplata, Island Garden City of Samal<br/>
APOLINARIO A. BOSTON – Prop.<br/>
TIN: 922-249-993 Non-VAT<br/>

</p>
Date: <input type="date" name="date" value=""><br/><br/>
Project:	&nbsp&nbsp&nbsp&nbsp Land Development/Site Preparation <br/>
Location:	&nbsp Brgy. San Jose, District II, Island Garden City of Samal <br/><br/>
Attention:  &nbsp <input type="text" name="person" value="" placeholder="Ex. Joey Gonzales" size="30"><br/>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="text" name="role" value="" placeholder="Ex. Project Head" size="30"><br/><br/><br/>
Subject:  	&nbsp&nbsp&nbsp&nbsp <input type="text" name="subject" value="" placeholder="Price Quotation" size="30"><br/><br/><br/>

Forwarding to your end the price quotation requested for the following items:<br/><br/>
<table>
		<thead>
			<tr>
				<th><u>Description</u></th>
				<th><u>Price</u></th>
				<th><u>Quantity</u></th>
				<th><u>Total</u></th>
			</tr>
		</thead>
		
		<tbody>
			<?php 
				$count = 1;
				if($result->num_rows > 0){
				while($row = $result->fetch_array()){
			?>
			<tr>
				<td><?php echo $count;?>. <?php echo $row['p_description']; ?></td>
				<td><?php echo "P".$row['p_price']; ?></td>
				<td><?php echo $row['p_qty']; ?></td>
				<td><?php echo "P".$row['p_total']; ?></td>
			</tr>
			<?php } 
				}
			?>
		</tbody>
</table><br/><br/><br/>
Note:<br/><br/><br/>
	&nbsp&nbsp&nbsp&nbsp 50% downpayment requested upon confirmation of orders to facilitate <br/>
	&nbsp&nbsp&nbsp&nbsp mobilization & purchases of parts/materials for the manufacture of the said items. <br/>
	&nbsp&nbsp&nbsp&nbsp valid for 60 days and is subject to change thereof due to <br/>
	&nbsp&nbsp&nbsp&nbsp materials price changes & adjustments.<br/>
	&nbsp&nbsp&nbsp&nbsp Final item price is negotiable depending on the quantity of items to be manufactured. <br/><br/><br/><br/>


Prepared by:  <b>Apolinario A. Boston</b> <br/>
&nbsp&nbsp&nbsp&nbsp 
&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp
					Proprietor
<br/><br/><br/><br/><br/><br/><br/><br/>					
<input type="submit" name="preview" value="Preview"> <input type="submit" name="back" value="Back">
</form>
</body>
</html>

<?php

	if(isset($_POST['preview']) && $_REQUEST['preview'] == "Preview"){
			$date = $_POST['date'];
			$person = $_POST['person'];
			$role = $_POST['role'];
			$subject = $_POST['subject'];

			$sql = "INSERT INTO preview(date_quotation, person, role, subject) 
				VALUES (\"".$date."\",\"".$person."\",\"".$role."\",\"".$subject."\")";

			if($con->query($sql)){
       			header("location: preview_reciept.php");
       		}
	} 
	
	if(isset($_POST['back']) && $_REQUEST['back'] == "Back"){

		$sqlz = "TRUNCATE TABLE transact";
		if($con->query($sqlz)){
       	}
		header("location: view_purchase.php");
	}
	/*
	$sqlx = "TRUNCATE TABLE purchase";
		if($con->query($sqlx)){
        $resultx = $con->query($sqlx);
       	}

	*/

?>