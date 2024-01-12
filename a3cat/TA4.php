<html>
    <head>
        <title>A3cat/TaImage</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
        <?php
            include 'connectdb.php';
        ?>
        <a href="mainmenu.php" class="homeButton">Home</a>
        <h1>Change TA's image URL</h1>
	<h3>Select a TA to insert image URL below:</h3>

        <form class="taDeleteContain"  action="addTAimage.php" method = "POST">
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
	<div class="in">
	<h5>Input TA image url:</h5>
	<input type="text" name="url">
	</div>
        <input class="submitB" name = "submit" type="submit" value="Add image">
        </form>
    </body>
</html>
