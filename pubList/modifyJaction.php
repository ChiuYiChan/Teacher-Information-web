<?php
include("db_conn.inc.php");
date_default_timezone_set('Asia/Taipei');
header("Access-Control-Allow-Origin: *");

$pubID = $_POST['pubID'];
//echo"$userID";
$pubTitle=mysqli_real_escape_string($link,$_POST["pub_title"]);
$pubYear=mysqli_real_escape_string($link,$_POST["pub_year"]);
$pubName=mysqli_real_escape_string($link,$_POST["pub_name"]);
$pubType=mysqli_real_escape_string($link,$_POST["pubType"]);
$pubVolum=mysqli_real_escape_string($link,$_POST["pub_volum"]);
$pubIssue=mysqli_real_escape_string($link,$_POST["pub_issue"]);
$pubPage=mysqli_real_escape_string($link,$_POST["pub_p"]);
$pubAuthor=$_POST["pub_name"];

$i=0;
foreach ($pubAuthor as $value) {
    $Authorsql="UPDATE `pub_author` 
    SET `author_id`=$value, `isCorresponding`='0'
    WHERE `pub_id`=$pubID AND `author_order`=$i";

    echo"$Authorsql<br>";
    mysqli_query($link,$Authorsql);
    $i++;
}

$sql="SELECT * FROM `Publication` WHERE `id`=$pubID";
//echo $sql;
$result=mysqli_query($link,$sql);
$val= $result->num_rows;
if( $val == 1){
    $sql = "UPDATE `Publication`
    SET `title` = '$pubTitle', `year` = '$pubYear', `pub_id	`='$pubType', `volume`='$pubVolum', `issue`=$pubIssue
    WHERE `id`=$pubID";
    echo"$sql";
    mysqli_query($link,$sql);
    header("Location:pubList.php");
}else{
    echo"出現錯誤</br>";
}


//http://210.70.80.21/~k107021027/modifyUser.php
?>