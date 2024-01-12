<!-- first button choice -->
<html>
    <head>
        <title>A3cat/TaInfo</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>

	<?php
            include 'connectdb.php';
        ?>

	<a href="mainmenu.php" class="homeButton">Home</a>
        <h1>List all info about TA's depending on criteria</h1>
        <h3>Order by last name or degree type</h3>

	<form action="TAinfo.php" method="POST">
	    <div class="TA1">
            <div>
                <b>Order by last name: </b>
                <input type="radio" name="rb" value="a" checked>Asending<br>
                <input type="radio" name="rb" value="d">Decending<br>
            </div>
            <div>
                <b>Order by degree type: </b>
                <input type="radio" name="rb" value="phd">PhD<br>
                <input type="radio" name="rb" value="master">Master<br>
            </div>
	    </div>

	    <input class="submitB" name="submit" type="submit" value="Show">
            <?php
                include 'TAinfo.php';
            ?>
	</form>
    </body>
</html>
