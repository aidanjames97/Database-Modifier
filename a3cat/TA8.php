<html>
    <head>
        <title>A3cat/courseOffer</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
	<?php
            include 'connectdb.php';
        ?>
        <a href="mainmenu.php" class="homeButton">Home</a>
        <h1>View course offering info</h1>
    	<h3>Select a TA below to view course offerings they have worked on:</h3>

        <form class="taDeleteContain"  action="courseOfferInfo.php" method = "POST">
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
                        echo $row["coid"] . " course: " . $row["whichcourse"];
                        echo '</option>';
                }
                ?>
        </select>
        <input class="submitB" name = "submit" type="submit" value="View">
        </form>
    </body>
</html>
