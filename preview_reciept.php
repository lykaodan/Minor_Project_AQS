<?php 

	include 'config.php';

	$sql = "SELECT * FROM canvas_tempo";
	$result = $con->query($sql);

	$sqlx = "SELECT * FROM client_tempo";
	$resultx = $con->query($sqlx);

?>

<html>
<body>
<form action="preview_reciept.php" method="POST">
<p>
<font size="5"><b>APOLINARIO CONCRETE PRODUCTS</b></font><br/>
Peñaplata, Island Garden City of Samal<br/>
APOLINARIO A. BOSTON – Prop.<br/>
TIN: 922-249-993 Non-VAT<br/>

</p>
Date: <u>
<?php 
if($resultx->num_rows > 0){
				while($row = $resultx->fetch_array()){
					echo $row['quotation_date'];
					$client_id = $row['client_id'];
					$date = $row['quotation_date'];
							
?></u>
<br/><br/>
Project:	<?php echo $project = $row['project']; $project = $row['project'];?></u><br/><br/>
Location:	<?php echo $location = $row['location']; $location = $row['location'];?></u><br/><br/>
Attention:  &nbsp<b><?php echo $person = $row['person']; $person = $row['person'];?></b><br/>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<?php echo $standing = $row['standing']; $standing = $row['standing'];?><br/><br/><br/>
Subject:  	&nbsp&nbsp&nbsp&nbsp <?php echo $subject = $row['subject']; $subject = $row['subject'];?><br/><br/><br/>
<?php 
			}
	}
?>
Forwarding to your end the price quotation requested for the following items:<br/><br/>
<table>
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th>Price</th>
				<th>Total price</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 
				$count = 1;
				if($result->num_rows > 0){
				while($row = $result->fetch_array()){
			?>
			<tr>
				<td><?php echo $count ?>.)</td>
				<td><?php echo $row['c_qty']; $aq = $row['c_qty'];?> pcs.</td>
				<td><?php echo $row['c_description']; $ad = $row['c_description'];?></td>
				<td><center>P<?php echo $row['c_price']; $ap = $row['c_price'];?></center></td>
				<td><?php echo "P".$row['c_total']; $at = $row['c_total'];?></td>
				<?php $count = $count + 1; ?>
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
<input type="submit" name="print" value="Print"> <input type="submit" name="back" value="Back">
</form>
</body>
</html>

<?php 
	
	if(isset($_POST['print']) && $_REQUEST['print'] == "Print"){

			$sqlg = "INSERT INTO client_log(client_id, project, location, quotation_date, person, standing, subject)
				VALUES (\"".$client_id."\", \"".$project."\",\"".$location."\",\"".$date."\",\"".$person."\",\"".$standing."\",\"".$subject."\")";
			if($con->query($sqlg)){
       		}

			$sqly = "TRUNCATE TABLE client_tempo";
			$resulty = $con->query($sqly);

			$sqlz = "TRUNCATE TABLE canvas_tempo";
			$resultz = $con->query($sqlzee);


       		header("location: home.php");

	}


?>