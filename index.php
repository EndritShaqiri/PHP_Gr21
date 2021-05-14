<?php
include_once "includes/functions.php";
include_once "includes/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lajmet e fundit - DARDANIA</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
	
    <!-- NAVBAR -->
    <?php include_once "includes/nav.php"?>

    <?php add_jumbotron() ?>

<br>
<div class="container">
    <div class="card-columns">
        <div class="card" style="width: 18rem;">
		    <img class="card-img-top" alt="Card image cap">
		    <div class="card-body">
		    <h5 class="card-title">Post Title</h5>
		    <h6 class="card-subtitle mb-2 text-muted">Author Name</h6>
	    	<p class="card-text">Hello there!</p>
		    <a href="#" class="btn btn-primary">Read More</a>
		    </div>
        </div>
	</div>
</div>
    
		
	</body>
</html>