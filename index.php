<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP SDK</title>
</head>
<body>
	
	<?php 

	require_once('class/stanleystella.php');

	$stanleystella = new stst(array(
		'apiKey'      => 'pk_905198710a957531d2a3fd739226d447',
		'apiSecret'   => 'sk_151f5ad54a7b385cb3755b11470f176e'
		));
	
	//$stanleystella->searchBySize('XXXL');
	
	$array = array(
	    "sizeName" => "XXL",
	    "colorName" => "Red", 
	    "rangeName" => "SWEAT"
	);
	$stanleystella->searchMixed($array);

	?>


</body>
</html>