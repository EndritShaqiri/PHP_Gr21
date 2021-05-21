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
				
				<!-- email sending -->

				<?php
                    
                    $recipient = "";
                    //if user clicks the send button
                    if(isset($_POST['send_email'])){
                        //access user entered data
					   $senderName = $_POST['contact_name'];
                       $recipient = $_POST['contact_email'];
                       $subject = $_POST['contact_subject'];
					   $message = "Message from: $senderName\n\n";
                       $message .= $_POST['contact_message'];
                       $sender = "From: testinggacc630@gmail.com";
                       //if user leaves an empty field
                       if(empty($recipient) || empty($subject) || empty($message)){
                           //display an alert message if one of the fields is empty -->
                           header("Location: page.php?id=$id&message=All+inputs+are+required!");
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender)){
                            
                            header("Location: page.php?id=$id&message=Your+mail+was+successfully+sent!");

                           $recipient = "";
                           }else{
                            
                            header("Location: page.php?id=$id&message=Failed+to+send+your+mail!");

                           }
                       }
                    }
                ?>
				
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $page_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="style/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	
		<!--NAVIGATION BAR HERE-->
		<?php include_once "includes/nav.php"; ?>
		<!--NAVIGATION BAR ENDS HERE-->
		
		
		
		<div class="container">
			<h1 style="width:100%;background-color:grey;padding-top:25px;padding-bottom:25px;text-align:center;color:white"><?php echo $page_title2; ?></h1>
			<hr>

			<?php
			if(isset($_GET['message'])){
				$msg = $_GET['message'];
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				'.$msg.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			}
			?>
			
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
		
	
	
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scroll.js"></script>
		</body>
	</html>
					
					
					<?php
				}
			}
		}
	}
	?>