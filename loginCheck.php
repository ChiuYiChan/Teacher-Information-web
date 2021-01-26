<?php
session_start();
include("db_conn.inc.php");
//echo "test";
// $userID=$_POST["userName"];
// $userPW=$_POST["userPasswd"];
$userID=mysqli_real_escape_string($link,$_POST["userName"]);
$userPW=mysqli_real_escape_string($link,$_POST["userPasswd"]);

//echo"$userID </br> $userPW </br>";
$sql="SELECT * FROM `user` WHERE `e-mail`='$userID' AND `passwd`=sha1('$userPW')";
//echo $sql;
$result=mysqli_query($link,$sql);
$val= $result->num_rows;
if( $val == 1){
    //echo"<h1>sucess</h1>";
    $_SESSION['userID']=$userID;
    //echo $SESSION['userID'];
    echo"<h1>Success</h1>";
    echo"<meta http-equiv='refresh' content='1;url=mainPage.php'/>";
    //header("Location:mainPage.php");
}else{
    echo"<h1>fail</h1>";
    echo"<meta http-equiv='refresh' content='1;url=index.php'/>";
    //header("Location:index.php");
}
?>
