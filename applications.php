<?php
	include 'functions.php';
	session_start();
	
	if (!isset($_SESSION['s_rno']))
		die("Forbidden.");
	
	$query = recruiters();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Student Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href = "bootstrap.min.css" rel="stylesheet">
  <link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
  <script src="jquery.min.js"></script>
</head>

<body>

<div class = "bg-light">
		<br />
		<h1 class = "text-center">Your Applications</h1>
		<br />

	</div>

</body>

</html>