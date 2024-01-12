<html>
	<head>
		<title>A3cat/newTA</title>
		<link rel="stylesheet" type="text/css" href="TA.css">
	</head>
	<body>
	<?php
		include 'connectdb.php';
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["submit"])) {
			$tauserid = $_POST["id"];
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$studentnum = $_POST["studentnum"];
			$degree = $_POST["degree"];
			$loves = $_POST["loves"];
			$hates = $_POST["hates"];

			$good = true;
			$result = $connection->query("SELECT tauserid, studentnum FROM ta;");
			while($row = $result->fetch_assoc()) {
				if($tauserid == $row["tauserid"] or $studentnum == $row["studentnum"]) {
					echo "TA already exists with same Id or student number";
					$good = false;
					break;
				}
			}
				if($good) {
					try {
						$qs = 'SET FOREIGN_KEY_CHECKS=0;';
						if (!mysqli_query($connection, $qs)) {
							die("Error: failed to turn off foreign key check");
						}
						$query = 'INSERT INTO ta values("' . $tauserid . '","' . $fname . '","' . $lname . '","' . $studentnum . '","' . $degree . '","' . NULL . '")';
						if (!mysqli_query($connection, $query)) {
							die("Error: insert failed " . mysqli_error($connection));
						}

						// insert to lover or hates if needed
						if($loves != "none" and $tauserid != "") {
							$query1 = 'INSERT INTO loves values("' . $tauserid . '","' . $loves . '")';
	                                        	if (!mysqli_query($connection, $query1)) {
                                                		die("Error: insert loves failed " . mysqli_error($connection));
                                        		}
						}
						if($hates != "none" and $tauserid != "") {
							$query2 = 'INSERT INTO hates values("' . $tauserid . '","' . $hates . '")';
                                                        if (!mysqli_query($connection, $query2)) {
                                                                die("Error: insert hates failed " . mysqli_error($connection));
                                                        }
						}
					} catch (Exception $e) {
                                                echo "Exception -> " . $e->getMessage();
                                        }
					echo "insert successful! <br>";
					mysqli_close($connection);
				}
			}
		}
	?>
	</body>
</html>
