<?php
session_start();
//echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    $pubId=mysqli_real_escape_string($link,$_POST["pub_title"]);
    $pubTitle=mysqli_real_escape_string($link,$_POST["pub_title"]);
    $pubYear=mysqli_real_escape_string($link,$_POST["pub_year"]);
    $pubName=mysqli_real_escape_string($link,$_POST["pub_name"]);
    $pubType=mysqli_real_escape_string($link,$_POST["pubType"]);
    $pubVolum=mysqli_real_escape_string($link,$_POST["pub_volum"]);
    $pubIssue=mysqli_real_escape_string($link,$_POST["pub_issue"]);
    $pubPage=mysqli_real_escape_string($link,$_POST["pub_p"]);
    $num=(int)$_POST["author_num"];
    //$pubAuthor_4=mysqli_real_escape_string($link,$_POST["pubAuthor_3"]);
    //echo"$pubAuthor_4";
    $sql="INSERT INTO `Publication` (`title`, `type`, `pub_id`, `year`,`volume`,`issue`,`page`)VALUES ('$pubTitle',$pubType,$pubName,$pubYear,'$pubVolum','$pubIssue','$pubPage')";
    //echo $sql."<br>";
    mysqli_query($link,$sql);
    $idsql="SELECT MAX(id) FROM `Publication`";
    //echo $idsql."<br>";
    $result=mysqli_query($link,$idsql);
    $val_id = mysqli_fetch_row($result);
    $val = $val_id[0];
 
    for ( $i=0 ; $i<$num ; $i++ ) {
        $author=mysqli_real_escape_string($link,$_POST["pubAuthor_".$i]);
        //echo"${'author_'.$i}"."<br>";
        $Authorsql="INSERT INTO `pub_author` (`pub_id`, `author_id`, `author_order`, `isCorresponding`)VALUES ($val, $author, $i, 0)";
        //echo $Authorsql."<br>";
        mysqli_query($link,$Authorsql);
    }


    //mysqli_query($link,$Authorsql);
    header("Location:pubList.php");

}else{
    echo "<h1>You have no permission !</h1>";
}

?>

<!-- http://210.70.80.21/~k107021027/addUser.php -->