<?php
include_once "connection.php";
function add_jumbotron(){
    echo '<div style="background-color: #ededff; height:20vh;" class="jumbotron jumbotron-fluid">
            <div style="text-align: center; padding-top:20px;" class="container">
            <h1 class="display-4">Gazeta "DARDANIA"</h1>
            <p class="lead">Gazeta e vetme e rregullt ne trojet Iliro-Dardane. Informohuni me ne, informohuni te paret!</p>
            </div>
        </div>';
}

function getAuthorName($id){
	global $conn;
	$sql = "SELECT * FROM author WHERE author_id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		$name = $row['author_name'];
		echo $name;
	}
}


function getCategoryName($id){
	global $conn;
	$sql = "SELECT * FROM category WHERE category_id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		$name = $row['category_name'];
		echo $name;
	}
}
function getSettingValue($setting){
	global $conn;
	$sql = "SELECT * FROM settings WHERE setting_name='$setting'";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		$value = $row['setting_value'];
		echo $value;
	}
}

function setSettingValue($setting,$value){
	global $conn;
	$sql = "UPDATE settings SET setting_value='$value' WHERE setting_name='$setting'";
	if(mysqli_query($conn, $sql)){
		return true;
	}else{
		return false;
	}
}

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

?>