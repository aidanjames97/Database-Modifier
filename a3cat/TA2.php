<html>
    <head>
        <title>A3cat/newTA</title>
        <link rel="stylesheet" type="text/css" href="TA.css">
    </head>
    <body>
	<?php
            include 'connectdb.php';
        ?>
        <a href="mainmenu.php" class="homeButton">Home</a>
        <h1>Insert a new Teaching Assistant</h1>
	<h3>Input TA information:</h3>

	<form action="TAinsert.php" method="POST">
	<div class="in">
            <h5>TA User Id:</h5>
            <input type="text" name="id">
        </div>

        <div class="in">
            <h5>First Name:</h5>
            <input type="text" name="fname">
        </div>

        <div class="in">
            <h5>Last Name:</h5>
            <input type="text" name="lname">
        </div>

	<div class="in">
            <h5>Student Number:</h5>
            <input type="text" name="studentnum">
        </div>

        <div class="in">
            <h5>Degree Type:</h5>
            <input type="text" name="degree">
        </div>

        <div class="in">
            <h5>Loves:</h5>
            <select class="small" name="loves">
		<option value="none"></option>
                <option value="CS1026">CS1026</option>
                <option value="CS1033">CS1033</option>
                <option value="CS3319">CS3319</option>
                <option value="CS3388">CS3388</option>
                <option value="CS4411">CS4411</option>
            </select>

            <h5>Hates:</h5>
            <select class="small" name="hates">
		<option value="none"></option>
                <option value="1026">CS1026</option>
                <option value="1033">CS1033</option>
                <option value="3319">CS3319</option>
                <option value="3388">CS3388</option>
                <option value="4411">CS4411</option>
            </select>
        </div>
	<input class="submitB" name="submit" type="submit" value="Insert">
	<?php
        	include 'TAinsert.php';
        ?>
	</form>
    </body>
</html>
