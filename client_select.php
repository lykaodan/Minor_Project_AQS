<?php 
	
	include 'config.php';

	$client_id = isset($_REQUEST['client_id'])? $_REQUEST["client_id"]:NULL;
	$project = isset($_REQUEST['project'])? $_REQUEST["project"]:NULL;
	$location = isset($_REQUEST['location'])? $_REQUEST["location"]:NULL;
	$quotation_date = isset($_REQUEST['quotation_date'])? $_REQUEST["quotation_date"]:NULL;
	$person = isset($_REQUEST['person'])? $_REQUEST["person"]:NULL;
	$standing = isset($_REQUEST['standing'])? $_REQUEST["standing"]:NULL;
	$subject = isset($_REQUEST['subject'])? $_REQUEST["subject"]:NULL;

	$use = isset($_REQUEST['use'])? $_REQUEST['use']:NULL;
	$view = isset($_REQUEST['view'])? $_REQUEST['view']:NULL;

	if($use=="yes"){
?>


<html>
<body>
<link rel="stylesheet" href="quote.css">
<h1><center>CLIENT</center></h1>
<form action="<?php $_PHP_SELF ?>" method="POST">
<div class="sides2">
Project:  <br/><input type="text" name="project" value="" placeholder="Land Development/Site Preparation"><br/><br />
Location:  <br/><input type="text" name="location" value=""
placeholder="Brgy. San Jose, District II, Island Garden City of Samal"><br/><br />
Date: 		<br/><input type="date" name="date" value=""><br/><br/>
Attention: 	<br/><b><?php echo $person;?></b>
			<br/><?php echo $standing;?><br/><br/>
Subject: 	<br/><input type="text" name="subject" value="" placeholder="Price Quotation" size="30"><br/><br/><br/>

<input type="submit" class="myButton" id="canvas" name="canvas" value="Proceed Canvas"/><br/>
</div>
</form>
</body>
</html>


<?php

	if(isset($_POST['canvas']) && $_REQUEST['canvas'] == "Proceed Canvas"){
		$project = $_POST['project'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		$subject = $_POST['subject'];

		$sql = "UPDATE client SET project =\"".$project."\", location =\"".$location."\", quotation_date =\"".$date."\", subject = \"".$subject."\" 
				WHERE client_id = \"".$client_id."\" ";

			if($con->query($sql)){
			}

			$sqlx = "INSERT INTO client_tempo(project, location, quotation_date, person, standing, subject)
				VALUES (\"".$project."\",\"".$location."\",\"".$date."\",\"".$person."\",\"".$standing."\",\"".$subject."\")";

			if($con->query($sqlx)){
       			header("location: canvas.php");
       		}


	}

}

if($view=="yes"){
	$sql = "SELECT * FROM canvas WHERE client_id = '$client_id'";
	$result = $con->query($sql);

?>
<html>
<body>
<font size="5"><b>APOLINARIO CONCRETE PRODUCTS</b></font><br/>
Peñaplata, Island Garden City of Samal<br/>
APOLINARIO A. BOSTON – Prop.<br/>
TIN: 922-249-993 Non-VAT<br/>

</p>
Date: <u><?php echo $quotation_date; ?></u><br/><br/>
Project:	<?php echo $projec;?></u><br/><br/>
Location:	<?php echo $location;?></u><br/><br/>
Attention:  &nbsp<b><?php echo $person;?></b><br/>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<?php echo $standing; ?><br/><br/><br/>
Subject:  	&nbsp&nbsp&nbsp&nbsp <?php echo $subject; ?><br/><br/><br/>
Forwarding to your end the price quotation requested for the following items:<br/><br/>
<table>
		<thead>
			<tr>
				<th>Description </th>
				<th>Price </th>
				<th>Quantity </th>
				<th>Total </th>
			</tr>
		</thead>
		
		<tbody>
			<?php if($result->num_rows > 0){
				while($row = $result->fetch_array()){
			?>
			<tr>
				<td><?php echo $row['c_description']; ?></td>
				<td><?php echo "P".$row['c_price']; ?></td>
				<td><center><?php echo $row['c_qty']; ?></center></td>
				<td><?php echo "P".$row['c_total']; ?></td>
			</tr>
			<?php } 
				}
			?>
		</tbody>
</table><br/>
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
</body>
</html>
<?php


}


?>