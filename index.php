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
    'apiSecret'   => 'pk_905198710a957531d2a3fd739226d447'
));

echo $stanleystella->getApiKey();

?>


</body>
</html>