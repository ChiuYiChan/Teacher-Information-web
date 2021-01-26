<?php
session_start();
//echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");

    $userID = $_POST['userID'];
    $tcherName_c=mysqli_real_escape_string($link,$_POST["tcherName_c"]);
    $tcherName_e=mysqli_real_escape_string($link,$_POST["tcherName_e"]);
    $show_tcherPhone=mysqli_real_escape_string($link,$_POST["show_tcherPhone"]);
    $tcherPhone=mysqli_real_escape_string($link,$_POST["tcherPhone"]);
    $show_tcherOfPhone=mysqli_real_escape_string($link,$_POST["show_tcherOfPhone"]);
    $tcherOfPhone=mysqli_real_escape_string($link,$_POST["tcherOfPhone"]);
    $tcherFax=mysqli_real_escape_string($link,$_POST["tcherFax"]);
    $tcherRoom=mysqli_real_escape_string($link,$_POST["tcherRoom"]);
    $show_tcherRoom=mysqli_real_escape_string($link,$_POST["show_tcherRoom"]);
    $tcherOfMail=mysqli_real_escape_string($link,$_POST["tcherOfMail"]);
    $tcherMail=mysqli_real_escape_string($link,$_POST["tcherMail"]);
    $tcherDep_c=mysqli_real_escape_string($link,$_POST["tcherDep_c"]);
    $tcherDep_e=mysqli_real_escape_string($link,$_POST["tcherDep_e"]);
    $tcherPostAd_c=mysqli_real_escape_string($link,$_POST["tcherPostAd_c"]);
    $tcherPostAd_e=mysqli_real_escape_string($link,$_POST["tcherPostAd_e"]);
    // $tcherRes_c=stripslashes(htmlentities($_POST["research_c"]));
    // $tcherRes_e=stripslashes(htmlentities($_POST["research_e"]));
    $tcherRes_c=$_POST["research_c"];
    $tcherRes_e=$_POST["research_e"];

    if($show_tcherPhone==on){
        $show_tcherPhone=0;
    }else{ $show_tcherPhone=1; }
    if($show_tcherOfPhone==on){
        $show_tcherOfPhone=0;
    }else{ $show_tcherOfPhone=1; }
    if($show_tcherRoom==on){
        $show_tcherRoom=0;
    }else{ $show_tcherRoom=1; }
   
    $sql="SELECT * FROM `personal_list` WHERE `name_c`='$tcherName_c' AND `id`=$userID";
    echo $sql;
    echo"<br>";
    $result=mysqli_query($link,$sql);
    $val= $result->num_rows;
    if( $val == 1){

        $sql = "UPDATE `personal_list`
        SET `name_c`='$tcherName_c',`name_e`='$tcherName_e',`cell_phone`=$tcherPhone,`is_show_cell_phone`=$show_tcherPhone,
        `office_phone`=$tcherOfPhone,`is_show_office_phone`=$show_tcherOfPhone,`fax`='$tcherFax',`email_work`='$tcherOfMail',
        `email_home`='$tcherMail',`room_no`=$tcherRoom,`is_show_room_no`=$show_tcherRoom, `department_c`='$tcherDep_c',
        `department_e`='$tcherDep_e',`post_address_c`='$tcherPostAd_c', `post_address_e`='$tcherPostAd_e',`research_c`='$tcherRes_c',`research_e`='$tcherRes_e'
        WHERE `id`=$userID";

        echo $sql;
        mysqli_query($link,$sql);
        header("Location:teacher_info.php");
    }

}else{
    echo "<h1>You have no permission !</h1>";
}

?>

<!-- http://210.70.80.21/~k107021027/addUser.php -->