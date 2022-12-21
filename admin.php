<?php
	include 'functions.php';
	session_start();
	
	$query = recruiters();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="bootstrap.bundle.min.js"></script>
	<script src="jquery.min.js"></script>
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
				<h4>Admin</h4>
			</div>
			<ul>
				<li>
					<a href="#">
						<i class="fa fa-group" aria-hidden="true"></i>
						<span>All Recruiters</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-clock-o" aria-hidden="true"></i>
						<span>Timeline</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-handshake-o" aria-hidden="true"></i>
						<span>Ongoing</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
						<span>Archives</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
			<div class="text-danger">
		<br />
		<br />

	</div>

<?php while ($row = $query->fetch_assoc()) : ?>
<?php
	$str = "";
	$dept = array("CSE", "ECE", "EEE", "MECH", "ICE", "CHEM", "CIVIL", "PROD", "META");
	$length = count($dept);
	
	for ($i = 0; $i < $length; $i++)
		if ($row[$dept[$i]] == "Y")
			$str .= $dept[$i] . ", ";
	$str .= "and thats all !";
	
	$gen = $row["gender"];
	if ($gen == "B")
		$gender = "Both";
	else if ($gen == "M")
		$gender = "Male";
	else if ($gen == "F")
		$gender = "Female";
	else
		$gender = "Invalid";
	
	$comp = $row["company"];
	$blob = getBlob($comp);

?>
<div class="container mt-3">
  <div class="card">
    <div class="card-body row">
	   <div class = "col-lg-8">
	
	
	<h2><?php echo $row["company"]; ?></h2>
	<h6><?php echo $row["job-description"]; ?></h6><br />
		Job Type : <?php echo $row["job-type"]; ?> <br />
		CGPA Criteria : <?php echo $row["CGPA_criteria"]; ?> <br />
		Gender : <?php echo $gender; ?> <br />
		Open to : <?php echo $str; ?> <br /><br />
		</div>
		
		<div class = "col-lg-4">
			<br />
			<?php echo '<img style="text-end" src="data:image/png;base64,'.base64_encode($blob).'"/>'; ?>
		</div>
	</div>
  </div>
</div>
<?php endwhile; ?>

<br />
<script src="script.js"></script>
		</section>
	</div>

</body>
</html>