<?php
$connect = mysqli_connect("localhost","root","","guvi");
$sql = "select * from guvi_3";

$result = mysqli_query($connect,$sql);

$json_array = array();

while($row = mysqli_fetch_assoc($result))
{
 $json_array[] = $row;
}

echo json_encode($json_array);
?>