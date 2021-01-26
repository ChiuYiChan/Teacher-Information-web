<?php
session_start();
//echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    $userID=mysqli_real_escape_string($link,$_POST["userName"]);
    $userEM=mysqli_real_escape_string($link,$_POST["userEmail"]);
    $userPW=mysqli_real_escape_string($link,$_POST["userPasswd"]);
    $userPH=mysqli_real_escape_string($link,$_POST["userPhone"]);
    $userTy=mysqli_real_escape_string($link,$_POST["type"]);

    $sql="SELECT * FROM `user` WHERE `e-mail`='$userEM'";
    $result=mysqli_query($link,$sql);
    $val= $result->num_rows;
    if( $val == 0){
        echo"<h1>sucess</h1>";
        $userPW=sha1($userPW);
        $sql="INSERT INTO `user` (`name`, `e-mail`,`passwd`, `type`, `phone`)VALUES ('$userID', '$userEM', '$userPW', '$userTy', '$userPH')";
        //echo $sql;
        mysqli_query($link,$sql);
        header("Location:user_info.php");
    }else{
        echo"<h1>fail</h1>";
    }

}else{
    echo "<h1>You have no permission !</h1>";
}

?>

<!-- http://210.70.80.21/~k107021027/addUser.php -->