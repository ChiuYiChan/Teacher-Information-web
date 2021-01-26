<?php
session_start();
//echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    $JournalTitle=mysqli_real_escape_string($link,$_POST["title"]);
    $JournalCountry=mysqli_real_escape_string($link,$_POST["counrty"]);
    $isSCI=($_POST["isSCI"] == '0')? 0:1;
    $isEI=($_POST["isEI"] == '0')? 0:1;

    $sql="SELECT * FROM `Journal` WHERE `title`='$JournalTitle'";
    //echo $sql;
    $result=mysqli_query($link,$sql);
    $val= $result->num_rows;
    if( $val == 0){
        $sql="INSERT INTO `Journal` (`title`, `isSCI`, `isEI`,`country`)VALUES ('$JournalTitle',$isSCI,$isEI,'$JournalCountry')";
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