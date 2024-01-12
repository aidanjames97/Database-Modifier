<html>
    <head>
        <title>A3cat/TaInfo</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
<?php
include 'connectdb.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["submit"])) {
	$ta = $_POST['taName'];
	$coid = $_POST['coID'];
	$hours = $_POST['hours'];

	if($ta == 'none' or $coid == 'none' or $hours == '') {
		echo '<h3>Please fill all fields</h3>';
	} else {
		$result = $connection->query("SELECT tauserid FROM hasworkedon WHERE coid = '$coid' AND tauserid = '$ta';");
		if($result->num_rows > 0) {
			// ta has worked on this offering
			echo '<h3>TA already assigned to this course</h3>';
		} else {
			// assign ta to the course offering
			$qs = 'SET FOREIGN_KEY_CHECKS=0;';
                        if (!mysqli_query($connection, $qs)) {
                        	die("Error: failed to turn off foreign key check");
                        }
			$q = 'INSERT INTO hasworkedon VALUES("' . $ta . '","' . $coid . '","' . $hours . '")';
			if (!mysqli_query($connection, $q)) {
                        	die("Error: insert failed " . mysqli_error($connection));
                        }
			echo '<h3>TA Assignment Successful</h3>';
		}
	}
}
}
mysqli_close($connection);
?>
    </body>
</html>

