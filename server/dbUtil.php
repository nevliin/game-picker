<?php

    include_once './config.php';

	function executeStmt($stmt) {
		// Create connection
		$con = new \MySQLi(dbVars::$dbservername, dbVars::$dbusername, dbVars::$dbpassword, dbVars::$db);
		
		$result = new \stdClass();

		// Check connection
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		} 

		if ($con->query($stmt) === TRUE) {
			mysqli_close($con);
			$result->state = true;
			return $result;
		} else {
			$result->state = false;
			$result->error = "Error: " . $con->error;
			mysqli_close($con);
			return $result;
		}
	}
	
	function executeQuery($query) {
		// Create connection
		$con = new \MySQLi(dbVars::$dbservername, dbVars::$dbusername, dbVars::$dbpassword, dbVars::$db);

		$result = new \stdClass();
		
		// Check connection
		if ($con->connect_error) {
			$result->state = false;
			$result->error = "Connection failed: " . $con->connect_error;
			mysqli_close($con);
			return $result;
		} 
				
		if(($sqlresult = mysqli_query($con, $query)) == FALSE) {
			$result->state = false;
			$result->error = "Error: " . $con->error;
			mysqli_close($con);
			return $result;	
		} else {
			$result->state = true;
			$result->sql_result = $sqlresult;
			mysqli_close($con);
			return $result;
		}

	}
	

?>