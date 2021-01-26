<?php
include("db_conn.inc.php");
date_default_timezone_set('Asia/Taipei');
header("Access-Control-Allow-Origin: *");

$userID = $_POST['userID'];
//echo"$userID";
$sql = "DELETE FROM `user` WHERE `id`='$userID'";
echo"$sql";
mysqli_query($link,$sql);
header("Location:user_info.php");


//http://210.70.80.21/~k107021027/delTcher.php
?>
