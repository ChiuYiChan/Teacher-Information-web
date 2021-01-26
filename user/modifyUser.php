<?php
include("db_conn.inc.php");
date_default_timezone_set('Asia/Taipei');
header("Access-Control-Allow-Origin: *");

$userID = $_POST['userID'];
//echo"$userID";
$userEmail=mysqli_real_escape_string($link,$_POST["userEmail"]);
$userName=mysqli_real_escape_string($link,$_POST["userName"]);
$userPH=mysqli_real_escape_string($link,$_POST["userPhone"]);
$userTy=mysqli_real_escape_string($link,$_POST["type"]);
$userSt=mysqli_real_escape_string($link,$_POST["state"]);
if($userSt==''){
    $userSt=1;
}

$sql="SELECT * FROM `user` WHERE `e-mail`='$userEmail' AND `id`=$userID";
//echo $sql;
$result=mysqli_query($link,$sql);
$val= $result->num_rows;
if( $val == 1){
    $sql = "UPDATE `user`
    SET `name` = '$userName', `e-mail` = '$userEmail', `phone` = '$userPH', `type` = $userTy, `state`=$userSt
    WHERE `id`=$userID";
    mysqli_query($link,$sql);
    header("Location:user_info.php");
}else{
    echo"更改帳號</br>";
    $sql="SELECT * FROM `user` WHERE `e-mail`='$userEmail'";
    $result=mysqli_query($link,$sql);
    $val= $result->num_rows;
    if( $val == 0){
        // 更改帳號
        $sql = "UPDATE `user`
        SET `name` = '$userName', `e-mail` = '$userEmail', `phone` = '$userPH', `type` = $userTy, `state`=$userSt
        WHERE `id`=$userID";
        mysqli_query($link,$sql);
        header("Location:user_info.php");
    }else{
        // 已註冊
        echo"已註冊</br>";
        echo"$userID,$userName, $userEmail,$userPH,$userTy";
    }
}

// $sql = "UPDATE `user`
// SET `name` = value1, `e-mail` = value2, `passwd` = value2, `phone` = value22, `type` = value22, `state` = value2
// WHERE `id`='$userID'";

// mysqli_query($link,$sql);
// header("Location:user_info.php");


//http://210.70.80.21/~k107021027/modifyUser.php
?>