<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stanley &amp; Stella PHP SDK</title>
</head>
<body>
	<?php 
	require_once('class/stanleystella.php');

	$stst = new Stst([
		'apiKey' => 'YOUR PUBLIC API KEY',
		'apiSecret' => 'YOUR SECRET API KEY'
	]);

	$response = $stst->search([], 0, 10);

	var_dump($response);
	?>
</body>
</html>
