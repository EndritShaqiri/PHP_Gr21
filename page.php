<?php
include_once "includes/connection.php";
include_once "includes/functions.php";
if(!isset($_GET['id'])){
	header("Location: index.php?geterr");
}else{
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	if(!is_numeric($id)){
		header("Location: index.php?numerror");
		exit();
	}else if(is_numeric($id)){
		$sql = "SELECT * FROM page WHERE page_id='$id'";
		$result = mysqli_query($conn, $sql);
		//Check if posts exits
		if(mysqli_num_rows($result)<=0){
			//no posts
			header("Location: index.php?nopagefound");
		}else if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$page_title = $row['page_title'];
				$page_content = $row['page_content'];
				$page_title2 = $row['page_title'];
				
				?>
				
				
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $page_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
	
		<!--NAVIGATION BAR HERE-->
		<?php include_once "includes/nav.php"; ?>
		<!--NAVIGATION BAR ENDS HERE-->
		
		
		
		<div class="container">
			<h1 style="width:100%;background-color:grey;padding-top:25px;padding-bottom:25px;text-align:center;color:white"><?php echo $page_title2; ?></h1>
			<hr>
			
			<p><?php echo $page_content; ?></p><br>


			<p>Search for authors: <span id="txtHint"></span></p> 

<p>Author: <input type="text" id="txt1" onkeyup="showHint(this.value)"></p>

<script>
function showHint(str) {
    if (str.length == 0)
    {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    else
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function ()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?c=" + str, true);
        xmlhttp.send();
   }
}
</script>


			
		</div>
		
	
</body>
</html>
				
				
				<?php
			}
		}
	}
}
?>