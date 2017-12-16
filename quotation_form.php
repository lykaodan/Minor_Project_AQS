<?php

	include 'config.php';

	if(isset($_POST['home']) && $_REQUEST['home'] == "Home"){
       		header("location: home.php");
	}

?>

<html>
<link rel="stylesheet" href="quote.css">
<body>
<center><h1>QUOTATION FORM</h1></center>
<form action="quotation_form.php" method="POST">
<div class="sides2">
<input type="submit" class="myButton" id="home" name="home" value="Home"/><br/><br/>
Project:  <br/><input type="text" name="project" value="" placeholder="Land Development/Site Preparation"><br/><br />
Location:  <br/><input type="text" name="location" value=""
placeholder="Brgy. San Jose, District II, Island Garden City of Samal"><br/><br />
Date: <br/><input type="date" name="date" value=""><br/><br/>
Attention:  <br/><input type="text" name="person" value="" placeholder="Ex. Joey Gonzales" size="30"><br/>
			<input type="text" name="standing" value="" placeholder="Ex. Project Head" size="30"><br/><br/>
Subject:<br/><input type="text" name="subject" value="" placeholder="Price Quotation" size="30"><br/><br/><br/>

<input type="submit" class="myButton" id="canvas" name="canvas" value="Proceed Canvas"/>
</div>
</form>
</body>
</html>

<?php

	if(isset($_POST['canvas']) && $_REQUEST['canvas'] == "Proceed Canvas"){

		$project = $_POST['project'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		$person = $_POST['person'];
		$standing = $_POST['standing'];
		$subject = $_POST['subject'];

			$sql = "INSERT INTO client(project, location, quotation_date, person, standing, subject)
				VALUES (\"".$project."\",\"".$location."\",\"".$date."\",\"".$person."\",\"".$standing."\",\"".$subject."\")";

			if($con->query($sql)){
       		}

       		$sqlx = "INSERT INTO client_tempo(project, location, quotation_date, person, standing, subject)
				VALUES (\"".$project."\",\"".$location."\",\"".$date."\",\"".$person."\",\"".$standing."\",\"".$subject."\")";

			if($con->query($sqlx)){
       			header("location: canvas.php");
       		}
	}




?>
