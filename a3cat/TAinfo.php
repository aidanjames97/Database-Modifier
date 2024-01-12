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
                	$choice = $_POST["rb"];
                        if($choice == "a" ) {
                        	$sql = "SELECT * FROM ta ORDER BY lastname ASC;";
                        } else if ($choice == "d") {
           			$sql = "SELECT * FROM ta ORDER BY lastname DESC;";
                        } else if ($choice == "phd") {
                                $sql = "SELECT * FROM ta WHERE degreetype='PhD';";
                        } else if ($choice == "master") {
                                $sql = "SELECT * FROM ta WHERE degreetype='Masters';";
                        }

                        // run query here
                        $result = $connection->query($sql);

                        // printing the result
                        if($result->num_rows > 0) {
			       echo "<table class='table' border='1'><tr><th>TA User ID</th><th>First Name</th><th>Last Name</th><th>Student Num</th><th>Degree Type</th><th>Show More</th></tr>";
         	               while($row = $result->fetch_assoc()) {
              	                 // print each row
				 echo "<tr><th>{$row['tauserid']}</th><th>{$row['firstname']}</th><th>{$row['lastname']}</th><th>{$row['studentnum']}</th><th>{$row['degreetype']}</th><th><form action='TAinfoMore.php' method='POST'><input name='taID' type='submit' value={$row['tauserid']}></form></th></tr>";
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
