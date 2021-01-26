<?php
include("db_conn.inc.php");
date_default_timezone_set('Asia/Taipei');
header("Access-Control-Allow-Origin: *");

$pubID = $_POST['pubID'];

//echo"$userID";
$delpub = "DELETE FROM `Publication` WHERE `id`='$pubID'";
echo"$delpub";
mysqli_query($link,$delpub);
$delAuthor = "DELETE FROM `pub_author` WHERE `pub_id`='$pubID'";
echo"$delAuthor ";
mysqli_query($link,$delAuthor );
header("Location:pubList.php");


//http://210.70.80.21/~k107021027/delList.php
?>