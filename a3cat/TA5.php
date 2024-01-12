<html>
    <head>
        <title>A3cat/TaAssign</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
        <?php
            include 'connectdb.php';
        ?>
        <a href="mainmenu.php" class="homeButton">Home</a>
        <h1>Assign a TA to a course offering</h1>
	<h3>Select a TA to add a course offering below:</h3>

        <form class="taDeleteContain"  action="assignToOffering.php" method = "POST">
        <div class="in">
	<h5>Select TA:</h5>
	<select class="taDelete" name="taName">
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
	</div>
	<div class="in">
	<h5>Select course offering:</h5>
	<select class="taDelete" name="coID">
                <option value="none"></option>
                <?php
                // for getting ta info to put on select option
                $result = $connection->query("SELECT coid, whichcourse FROM courseoffer;");

                // loop through rows in result
                while($row = $result->fetch_assoc()) {
                        echo '<option value="';
                        echo $row["coid"];
                        echo '">';
                        echo $row["coid"] . " course: " . $row["whichcourse"];;
                        echo '</option>';
                }
                ?>
        </select>
	</div>
	<div class="in">
		<h5>Input Hours:</h5>
		<input name="hours" type="text">
	</div>
	<input class="submitB" name = "submit" type="submit" value="Assign">
	</form>
    </body>
</html>
