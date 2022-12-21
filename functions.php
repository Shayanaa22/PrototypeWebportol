<?php

	if (isset($_POST['perform'])) $_POST['perform']();

	function connect()
	{
		return new mysqli("localhost", "root", "", "placements");
	}

	function s_login()
	{
		$conn = connect();
		$roll = filter_input(INPUT_POST, 'roll', FILTER_SANITIZE_NUMBER_INT);
		$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
		
		$sql = "SELECT * FROM `student_login` WHERE `roll_no` = '" . $roll . "'";
		$query = $conn->query($sql);
		
		if ($query->num_rows == 0)
			die("Not registered.");
		
		$row = $query->fetch_assoc();
		if ($row["Password"] == $pass)
		{
			echo "Login Successful.";
			session_start();
			$_SESSION['s_rno'] = $roll;
			$_SESSION['row'] = $row;
		}
		else
			echo "Invalid Login Details.";
	}
	
	function recruiters()
	{
		$conn = connect();
		$sql = "SELECT * FROM `comp_req`";
		$query = $conn->query($sql);
		return $query;
	}
	
	function getBlob($comp)
	{
		$conn = connect();
		$sql = "SELECT * FROM `recruiter_login` WHERE `org_name` = '" . $comp . "'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		return $row["logo"];
	}
	
	function apply()
	{
		session_start();
		
		$conn = connect();
		$s_id = $_SESSION['row']["id"];
		$c_id = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_NUMBER_INT);
		
		$q1a = $conn->query("SELECT * FROM `student_login` WHERE `id` = " . $s_id);
		$sApp = json_decode($q1a->fetch_assoc()["applied"]);
		if ($sApp == NULL)
			$sApp = array($c_id);
		else
			array_push($sApp, $c_id);
		$fsApp = json_encode($sApp);
		$q1b = $conn->query("UPDATE `student_login` SET `applied` = '" . $fsApp . "' WHERE `id` = " . $s_id);
		
		$q2a = $conn->query("SELECT * FROM `comp_req` WHERE `id` = " . $c_id);
		$cApp = json_decode($q2a->fetch_assoc()["applied"]);
		if ($cApp == NULL)
			$cApp = array($s_id);
		else
			array_push($cApp, $s_id);
		$cApp = json_encode($cApp);
		$q2b = $conn->query("UPDATE `comp_req` SET `applied` = '" . $cApp . "' WHERE `id` = " . $c_id);
	}
	
	function check($s_id, $c_id)
	{
		$conn = connect();
		$query = $conn->query("SELECT * FROM `student_login` WHERE `id` = " . $s_id);
		$row = $query->fetch_assoc();
		
		$json = json_decode($row["applied"]);
		if ($json == NULL)
			return false;
		
		foreach ($json as $elem)
			if ($elem == $c_id)
				return true;
		return false;
	}