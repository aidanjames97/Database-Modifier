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
		// run query here
			$ta = $_POST["taName"];
                        $result = $connection->query("SELECT c.coursenum, c.coursename, co.term, co.year, hw.hours FROM course c JOIN courseoffer co ON c.coursenum = co.whichcourse JOIN hasworkedon hw ON co.coid = hw.coid WHERE hw.tauserid = '$ta';");

                        // printing the result
                        if($result->num_rows > 0) {
                               echo "<table class='table' border='1'><tr><th>Course #</th><th>Course Name</th><th>Term</th><th>Year</th><th>Hours</th><th>Loves / Hates ?</th></tr>";
                               while($row = $result->fetch_assoc()) {
                                 // print each row
				$c = $row['coursenum'];
				$lr = $connection->query("select lcoursenum from loves where ltauserid = '$ta' and lcoursenum = '$c';");
				$hr = $connection->query("select hcoursenum from hates where htauserid = '$ta' and hcoursenum = '$c';");
				$face = ''; //default
				if($lr->num_rows > 0) {
					$face = ':)';
				}
				if($hr->num_rows > 0) {
					$face = ':(';
				}
                                 echo "<tr><th>{$row['coursenum']}</th><th>{$row['coursename']}</th><th>{$row['term']}</th><th>{$row['year']}</th><th>{$row['hours']}</th><th>{$face}</th></tr>";
                               }
                        } else {
                                echo '<p>No results </p>';
                        }
	}
	}
	mysqli_close($connection);
?>
    </body>
</html>

