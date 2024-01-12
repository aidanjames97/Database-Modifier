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
		// coid
		$id = $_POST["coID"];
		$result = $connection->query("select co.whichcourse, c.coursename, t.firstname, t.lastname, t.tauserid FROM course c JOIN courseoffer co ON c.coursenum = co.whichcourse JOIN hasworkedon hw ON co.coid = hw.coid JOIN ta t ON hw.tauserid = t.tauserid WHERE hw.coid = '$id';");

		// check for rows
		if($result->num_rows > 0) {
		echo "<table class='table' border='1'><tr><th>CO Id</th><th>Course Number</th><th>Course Name</th><th>First Name</th><th>Last Name</th><th>TA ID</th></tr>";
		while($row = $result->fetch_assoc()) {
			// printing each row
			echo "<tr><th>{$id}</th><th>{$row['whichcourse']}</th><th>{$row['coursename']}</th><th>{$row['firstname']}</th><th>{$row['lastname']}</th><th>{$row['tauserid']}</th></tr>";
		}
		} else {
			// nothing to print
			echo '<h3>No TA availible</h3>';
		}
}
}
mysqli_close($connection);
?>
    </body>
</html>

