<html>
    <head>
        <title>A3cat/viewCourseOffer</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
	<?php
            include 'connectdb.php';
        ?>
        <a href="mainmenu.php" class="homeButton">Home</a>
        <h1>View all course offerings of a course</h1>
	<h3>Select course below:</h3>

	<form class="taDeleteContain"  action="viewOffering.php" method = "POST">
        <select class="taDelete" name="offering">
                <option value="none"></option>
                <?php
                // for getting ta info to put on select option
                $result = $connection->query("SELECT DISTINCT whichcourse FROM courseoffer;");

                // loop through rows in result
                while($row = $result->fetch_assoc()) {
                        echo '<option value="';
                        echo $row["whichcourse"];
                        echo '">';
                        echo $row["whichcourse"];
                        echo '</option>';
                }
                ?>
        </select>
	<div class="in">
		<h5>Start Year: </h5>
		<input class="small" name="startYear" type="text">
	</div>
	<div class="in">
                <h5>End Year: </h5>
                <input class="small" name="endYear" type="text">
        </div>
	<input class="submitB" name = "submit" type="submit" value="View">
	</form>
 </body>
</html>
