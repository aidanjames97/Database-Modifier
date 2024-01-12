<html>
    <head>
        <title>A3cat/coTAworkedOn</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
	<?php
            include 'connectdb.php';
        ?>
        <a href="mainmenu.php" class="homeButton">Home</a>
        <h1>Course offerings a TA has worked on</h1>
	<h3>Select a TA below to view course offerings they have worked on:</h3>

        <form class="taDeleteContain"  action="TAcourseOffer.php" method = "POST">
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
	<input class="submitB" name = "submit" type="submit" value="View">
        </form>
</body>
</html>
