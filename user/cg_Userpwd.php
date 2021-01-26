<?php
include("db_conn.inc.php");
date_default_timezone_set('Asia/Taipei');
header("Access-Control-Allow-Origin: *");

$userID = $_POST['userID'];
$userPW=mysqli_real_escape_string($link,$_POST["userPasswd"]);

$sql="UPDATE `user` SET `passwd`=sha1('$userPW') WHERE `id`=$userID";
// echo $sql;
$result=mysqli_query($link,$sql);
header("Location:user_info.php");

//http://210.70.80.21/~k107021027/cg_Userpwd.php
?>