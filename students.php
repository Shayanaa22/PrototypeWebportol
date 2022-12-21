<?php
	session_start();
	
	if (!isset($_SESSION['s_rno']))
		die("Forbidden.");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">PLACEMENT <b>DRIVE</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-power-off" aria-hidden="true"></i>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="user.png">
				<h4><?php echo $_SESSION['row']["name"]; ?></h4>
			</div>
			<ul>
				<li>
					<a href="recruiters.php">
						<i class="fa fa-group" aria-hidden="true"></i>
						<span>All Recruiters</span>
					</a>
				</li>
				<li>
					<a href="applications.php">
						<i class="fa fa-address-card" aria-hidden="true"></i>
						<span>Your Applications</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<span>Schedule</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-bell-o" aria-hidden="true"></i>
						<span>Notifications</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
			<h1></h1>
		</section>
	</div>

</body>
</html>