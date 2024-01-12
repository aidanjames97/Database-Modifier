<html>
    <head>
	<title>A3cat/viewCourseOffer</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
	<?php
            include 'connectdb.php';
	    if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST["submit"])) {
                        $course = $_POST["offering"];
			$start = $_POST["startYear"];
			$end = $_POST["endYear"];
		if($course == "none") {
			echo '<h3>Please select a course</h3>';
		} else {
			// figure out which query to run
			if($start == "" and $end == "") {
				$result = $connection->query("SELECT * FROM courseoffer WHERE whichcourse='$course';");
			} else if($start == "") {
				$result = $connection->query("SELECT * FROM courseoffer WHERE whichcourse='$course' AND year<='$end';");
			} else if($end == "") {
				$result = $connection->query("SELECT * FROM courseoffer WHERE whichcourse='$course' AND year>='$start';");
			} else {
				// no empty fields
				$result = $connection->query("SELECT * FROM courseoffer WHERE whichcourse='$course' AND year>='$start' AND year<='$end';");
			}

		// run query here
                        // printing the result
                        if($result->num_rows > 0) {
                               echo "<table class='table' border='1'><tr><th>COID</th><th># Studnets</th><th>Term</th><th>Year</th><th>Course</th></tr>";
                               while($row = $result->fetch_assoc()) {
                                 // print each row
                                 echo "<tr><th>{$row['coid']}</th><th>{$row['numstudent']}</th><th>{$row['term']}</th><th>{$row['year']}</th><th>{$row['whichcourse']}</th></tr>";
                               }
                        } else {
                                echo '<h3>No results</h3>';
                        }
	mysqli_close($connection);
	}
	}
	}
        ?>
    </body>
</html>
