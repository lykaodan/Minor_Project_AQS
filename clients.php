<?php

	include 'config.php';
	$sql = "SELECT * FROM client";
	$result = $con->query($sql);

	if(isset($_POST['home']) && $_REQUEST['home'] == "Home"){
       		header("location: home.php");
	}
?>
<html>
<link rel="stylesheet" href="quote.css">
<body>
<form action="canvas.php" method="POST">
<h1><center>List of Clients</center></h1>
<div class="sides">
<center>
<input type="submit" class="myButton" id="home" name="home" value="Home"/><br/><br/>
<table>
		<thead>
			<tr>
				<th>Client</</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$count = 1;
				if($result->num_rows > 0){
				while($row = $result->fetch_array()){
			?>
			<tr>
				<td><?php echo $count;?>.) <?php echo $row['person']; ?></td>
				<td> 	 <a href="client_select.php ?>
				&use=yes
				&client_id=<?php echo $row['client_id'];?>
				&project=<?php echo $row['project'];?>
				&location=<?php echo $row['location'];?>
				&quotation_date=<?php echo $row['quotation_date'];?>
				&person=<?php echo $row['person'];?>
				&standing=<?php echo $row['standing'];?>
				&subject=<?php echo $row['subject'];?>
				"> <center> SELECT </center></a>  </td>
			</tr>
			<?php $count = $count + 1;}
				}
			?>
		</tbody>
</table><br/>
</center>
</div>
</form>
</body>
</html>
