<?php

require('fpdf17/fpdf.php');

include 'config.php';
	$sql = "SELECT * FROM canvas_tempo";
	$result = $con->query($sql);

	$sqlx = "SELECT * FROM client_tempo";
	$resultx = $con->query($sqlx);


$pdf = new FPDF('P' ,'mm' , 'A4');

$pdf -> AddPage();

$pdf -> SetFont('Arial' , 'B' , 16);
$pdf -> Cell(120 , 5 , 'Apolinario Concrete Product' , 0 , 0);
$pdf -> Cell(50 , 5 , 'Price Quotation' , 0 , 1);

$pdf -> SetFont('Arial' , '' , 10);

$pdf -> Cell(120 , 5 , 'Penaplata, Island Garden City of Samal' , 0 , 1);
$pdf -> Cell(70 , 5 , 'APOLINARIO A. BOSTON – Prop.' , 0 , 1);

$pdf -> Cell(120 , 5 , 'TIN: 922-249-993 Non-VAT' , 0 , 0);
$pdf -> SetFont('Arial' , '' , 12);
$pdf -> Cell(20 , 5 ,  , 0 , 0);
$pdf -> Cell(30 , 5 ,'[yy-mm-dd] ' , 1 , 1);

$pdf -> Cell(170 , 10 ,'' , 0 , 1);

$pdf -> Cell(20 , 5 , 'Project: ' , 0 , 0);
$pdf -> Cell(150 , 5 ,'[Project Name] ' , 1 , 1);

$pdf -> Cell(20 , 5 ,'Location: ' , 0 , 0);
$pdf -> Cell(150 , 5 ,'[Location Here] ' , 1 , 1);

$pdf -> Cell(170 , 8 ,'' , 0 , 1);

$pdf -> Cell(20 , 5 ,'Attention: ' , 0 , 0);
$pdf -> Cell(150 , 5 ,'[Customer Name]' , 1 , 1);

$pdf -> Cell(20 , 5 ,'' , 0 , 0);
$pdf -> Cell(150 , 5 ,'[Position]' , 1 , 1);

$pdf -> Cell(170 , 8 ,'' , 0 , 1);

$pdf -> Cell(20 , 5 ,'Subject:' , 0 , 0);
$pdf -> Cell(150 , 5 ,'[Subject description]' , 1 , 1);

$pdf -> Cell(170 , 8 ,'' , 0 , 1);

$pdf -> Cell(170 , 5 ,'Forwarding to your end the price quotation requested for the following items: ' , 0 , 1);
$pdf -> Cell(170 , 4 ,'' , 0 , 1);

$pdf -> Cell(170 , 5 , , 1 , 1);

$pdf -> Cell(170 , 10 ,'' , 1 , 1);

$pdf -> Cell(170 , 5 ,'Note' , 0 , 1);

$pdf -> SetFont('Arial' , 'I' , 10);
$pdf -> Cell(20 , 4 ,'' , 0 , 0);
$pdf -> Cell(150 , 4 ,'50% downpayment requested upon confirmation of orders to facilitate mobilization & purchases 
	' , 0 , 1);
$pdf -> Cell(20 , 4 ,'' , 0 , 0);
$pdf -> Cell(150 , 4 ,'of parts/materials for the manufacture of the said items. valid for 60 days and is subject to
	' , 0 , 1);
$pdf -> Cell(20 , 4 ,'' , 0 , 0);
$pdf -> Cell(150 , 4 ,'change thereof due to materials price changes & adjustments.  Final item price is negotiable
	' , 0 , 1);
$pdf -> Cell(20 , 4 ,'' , 0 , 0);
$pdf -> Cell(150 , 4 ,'depending on the quantity of items to be manufactured. 
	' , 0 , 1);

$pdf -> SetFont('Arial' , '' , 10);
$pdf -> Cell(170 , 10 ,'' , 0 , 1);

$pdf -> Cell(30 , 5 ,'Prepared by:' , 0 , 0);
$pdf -> SetFont('Arial' , 'B' , 10);
$pdf -> Cell(140 , 5 ,'Apolinario A. Boston' , 0 , 1);
$pdf -> SetFont('Arial' , 'I' , 10);
$pdf -> Cell(38 , 4 ,'' , 0 , 0);
$pdf -> Cell(132 , 4 ,'Proprietor', 0 , 1);






$pdf -> Output();


?>
