<html>
    <head>
        <title>A3cat/TaInfo</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
<?php
include 'connectdb.php';
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["taID"])) {
		$ta = $_POST['taID'];
		$result = $connection->query("SELECT t.* FROM ta t WHERE t.tauserid = '$ta';");

		// printing the result
                        if($result->num_rows > 0) {
                               echo "<table class='table' border='1'><tr><th>TA User ID</th><th>First Name</th><th>Last Name</th><th>Student Num</th><th>Degree Type</th><tr>";
                               while($row = $result->fetch_assoc()) {
                                 // print each row
				echo "<tr><th>{$row['tauserid']}</th><th>{$row['firstname']}</th><th>{$row['lastname']}</th><th>{$row['studentnum']}</th><th>{$row['degreetype']}</th></tr>";

				// show image
				if($row['image'] == '') {
					$url = 'https://static.vecteezy.com/system/resources/previews/009/292/244/original/default-avatar-icon-of-social-media-user-vector.jpg';
					echo "<img src='$url' alt='Null image' width=200px height=200px>";
				} else {
					$url = '';
					try {
					echo "<img src='$url' alt='TA image' width=200px height=200px>";
					} catch (Exception $e) {
					echo "<h3>Could not display image</h3>";
					}
				}
				}
			}
		$lr = $connection->query("SELECT * FROM loves WHERE ltauserid='$ta';");
		$hr = $connection->query("SELECT * FROM hates WHERE htauserid='$ta';");

		// check if they hate or love any
		if($lr->num_rows > 0 and $hr->num_rows > 0) {
		if($lr->num_rows > 0) {
		echo "<h4>Loves:</h4>";
		while($row = $lr->fetch_assoc()) {
			echo $row['lcoursenum'] . '<br>';
		}
		}

		if($hr->num_rows > 0) {
                echo "<h4>Hates:</h4>";
                while($row = $hr->fetch_assoc()) {
                        echo $row['hcoursenum'] . '<br>';
                }
                }
		} else {
			echo "<h4>TA doesn't love or hate any courses<h4>";
		}
}
}

mysqli_close($connection);
?>
    </body>
</html>

