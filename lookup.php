<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/lookup.css">
<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<title>Geo Lookup Form</title>
</head>
<body>
<section id="geo">

<!-- Insert the PHP code used to do the lookup into the page -->
<?php include('includes/geo.php'); ?>

<!-- HTML Geo Lookup Form -->
    <form id="lookup" enctype="application/x-www-form-urlencoded" method="post">
        <div class="form-row">
            <label for="ipaddress">IP address:</label>
            <input type="text" id="ipaddress" name="ipaddress" autofocus>
            </input>
        </div>
        <div class="form-row">
            <label>Auto Lookup:</label>
            <input type="radio" id="yes-autolookup" name="autolookup" value="true">Yes</input>
            <input type="radio" id="no-autolookup" name="autolookup" value="false" checked>No</input>
        </div>
        <div class="form-row">
            <input type="submit" id="submit" name="submit" value="Submit">
            </input>
        </div>
    </form>

</section>
</body>
</html>