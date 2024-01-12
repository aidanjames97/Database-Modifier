<html>
      	<head>
              	<title>A3cat/TADelete</title>
                <link rel="stylesheet" type="text/css" href="TA.css">
        </head>
 <body>
<?php
	include 'connectdb.php';

	// boolean to check if we need to delete ta
	$del = false;
	// request method
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	// for delete popup
        if(isset($_POST["confirm"])) {
		$ta = $_POST['confirm'];
		$q = "DELETE FROM ta WHERE tauserid = '$ta';";
		if(!mysqli_query($connection, $q)) {
			die("Error: couldn't delete TA");
		}
		echo '<h1>TA Deleted</h1>';
		mysqli_close($connection);
        }

	// check for submit button
	if(isset($_POST["submit"])) {
		$ta =  $_POST["taDel"];

		// check for null value
		if($ta == 'none') {
			echo '<h1> No Ta Selected</h1>';
		} else {
		$lineCount = $connection->query("SELECT COUNT(*) FROM courseoffer co INNER JOIN hasworkedon hw ON co.coid = hw.coid WHERE hw.tauserid='$ta';");
		$count = $lineCount->fetch_assoc();
		// check if ta is assigned to a course offering
		if($count['COUNT(*)'] != 0) {
			// ta in course offering therefor do not delete
			echo 'TA has course offering, therefor cannot delete <br>';
		} else {
			// delete but ask user first
			echo "<html>";
			echo "<head>";
                	echo "<title>A3cat/TADelete</title>";
                	echo "<link rel='stylesheet' type='text/css' href='TA.css'>";
        		echo "</head>";
 			echo "<body>";
			echo "<form action='TAdelete.php' method='POST'>";
                        echo "<button class='submitBB' name='confirm' type='submit' value='$ta'>Are you sure you want to delete?</button>";
                        echo "</form>";
			echo "</body>";
			echo "</html>";
		}
	}
	}
	}
?>
</body>
</html>
