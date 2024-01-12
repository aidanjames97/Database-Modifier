<html>
    <head>
        <title>A3cat/TaDelete</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
	<?php
            include 'connectdb.php';
        ?>
        <a href="mainmenu.php" class="homeButton">Home</a>
        <h1>Delete an existing Teaching Assistant</h1>
	<h3>Select a TA to delete below:</h3>

	<form class="taDeleteContain"  action="TAdelete.php" method = "POST">
	<select class="taDelete" name="taDel">
		<option value="none"></option>
		<?php
		// for getting ta info to put on select option
		$result = $connection->query("SELECT tauserid, firstname, lastname FROM ta;");

		// loop through rows in result
		while($row = $result->fetch_assoc()) {
			echo '<option value="';
			echo $row["tauserid"];
			echo '">';
			echo $row["firstname"] . " " . $row["lastname"];
			echo '</option>';
		}
		?>
	</select>
	<input class="submitB" name = "submit" type="submit" value="Delete">
	</form>
    </body>
</html>

