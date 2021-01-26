<?php
session_start();
//echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    $confTitle=mysqli_real_escape_string($link,$_POST["title"]);
    $confName=mysqli_real_escape_string($link,$_POST["confName"]);
    $country=mysqli_real_escape_string($link,$_POST["country"]);
    $city=mysqli_real_escape_string($link,$_POST["city"]);
    $dateStart=mysqli_real_escape_string($link,$_POST["dateStart"]);
    $dateEnd=mysqli_real_escape_string($link,$_POST["dateEnd"]);
    $confVenu=mysqli_real_escape_string($link,$_POST["venu"]);
    $isEI=($_POST["isEI"] == '0')? 0:1;

    $sql="SELECT * FROM `Conference` WHERE `title`='$confTitle'";
    //echo $sql;
    $result=mysqli_query($link,$sql);
    $val= $result->num_rows;
    if( $val == 0){

    $sql="INSERT INTO `Conference` (`title`, `conf_name`, `isEI`,`venue`,`city`,`country`,`start_date`,`end_date`)VALUES ('$confTitle','$confName',$isEI,'$confVenu','$city','$country','$dateStart','$dateEnd')";
    echo $sql;
    mysqli_query($link,$sql);
    header("Location:pubList.php");
    }else{
        echo"此類別已存在";
    }
}else{
    echo "<h1>You have no permission !</h1>";
}

?>

<!-- http://210.70.80.21/~k107021027/addUser.php -->