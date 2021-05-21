<?php
include_once "includes/connection.php";
$keyword = htmlspecialchars($_REQUEST["c"]);
$rezultati = "";

$sqlquery="SELECT * FROM `author` WHERE `author_name` LIKE '%$keyword%'";
$rezultati = mysqli_query($conn, $sqlquery);
if($rezultati->num_rows>0)
{
    $nr=1;
    echo "<table border='1'><tr><th>ID</th><th>Emri</th><th>Roli</th></tr>";
    while ($rreshti=$rezultati->fetch_assoc())
    {
        echo "<tr><td>".$rreshti["author_id"]."</td><td>".$rreshti["author_name"]."</td><td>".$rreshti["author_role"]."</td><tr>";
        $nr++;
    }
    echo "</table>";
}
else    
{
    echo "Nuk u gjet asnje rekord!";
}

?>