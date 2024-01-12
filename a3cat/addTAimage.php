<html>
    <head>
	<title>A3cat/TaDelete</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
<body>
<?php
	include 'connectdb.php';

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["submit"])) {
		$ta = $_POST["taName"];
		$url = $_POST["url"];

		// check for blank in either
		if($ta == 'none' or $url == ''){
			echo '<h3>Please fill all fields before submitting</h3>';
		} else {
			$q = "UPDATE ta SET image = '$url' WHERE tauserid='$ta';";
			if(!mysqli_query($connection, $q)){
				die("Error: couldn't insert URL");
			}
			echo '<h3>TA URL changed</h3>';
		}
	mysqli_close($connection);
	}
	}
?>

</body>

