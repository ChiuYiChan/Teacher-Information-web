<?php
session_start();
//echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    $firatName=$_POST["fname"];
    $lastName=$_POST["lname"];

    $i=0;
    foreach ($firatName as $value) {
        $sql="SELECT * FROM `Author` WHERE `first_name`=trim('$value') AND `last_name`=trim('$lastName[$i]')";
        $result=mysqli_query($link,$sql);
        $val= $result->num_rows;
        if( $val == 0){
        $sql="INSERT INTO `Author` (`first_name`, `last_name`)VALUES (trim('$value'),trim('$lastName[$i]'))";
        echo $sql;
        mysqli_query($link,$sql);
        header("Location:pubList.php");
        $i++;
        }else{
            echo $value." ".$lastName[$i]." 該作者已存在於資料庫中!<br>";
        }
    }

}else{
    echo "<h1>You have no permission !</h1>";
}

?>

<!-- http://210.70.80.21/~k107021027/addUser.php -->