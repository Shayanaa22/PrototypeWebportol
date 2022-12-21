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

<div class = "bg-primary">
		<br />
		<h1 class = "text-center">Recruiters Present</h1>
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
	
	$c1 = $row["gender"] == $_SESSION['row']["gender"];
	if ($row["gender"] == "B") $c1 = true;
	$c2 = $row[$_SESSION['row']["department"]] == "Y";
	$c3 = $row["CGPA_criteria"] <= $_SESSION['row']["cgpa"];
	$app = $c1 && $c2 && $c3;
	
	$id = $row["id"];
	$applied = check($_SESSION['row']["id"], $id);

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
		
		<?php if (!$app) : ?>
		<button class = "btn btn-primary disabled">Apply Now</button>
		<br />
		<span class="text-danger">Sorry. You do not meet the requirements to apply.</span>
		
		<?php elseif ($applied) : ?>
		<button class = "btn btn-primary disabled">Apply Now</button>
		<br />
		<span class="text-primary">You have already applied for this job !</span>
		
		<?php else : ?>
		<button class = "btn btn-primary" onclick='success(<?php echo $id; ?>)'>Apply Now</button>
		<br />
		<span class="text-success">You are eligible to apply to this job !</span>
		
		<?php endif; ?>
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
</body>

</html>