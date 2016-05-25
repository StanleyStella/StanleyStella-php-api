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
		'apiKey'      => 'pk_869d1ecbe0a0c60bbfddee1fa68ab6eb',
		'apiSecret'   => 'sk_d0b087600e6260dd35bbdaa742497c7b'
		));
	
	$stanleystella->searchByColor('Red');

	?>


</body>
</html>