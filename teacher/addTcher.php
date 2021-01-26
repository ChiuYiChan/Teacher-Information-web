<?php
session_start();
//echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
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
    $tcherRes_c=$_POST["research_c"];
    $tcherRes_e=$_POST["research_e"];

    if($show_tcherPhone==off){
        $show_tcherPhone=1;
    }else{$show_tcherPhone=0;}
    if($show_tcherOfPhone==off){
        $show_tcherOfPhone=1;
    }else{$show_tcherOfPhone=0;}
    if($show_tcherRoom==off){
        $show_tcherRoom=1;
    }else{$show_tcherRoom=0;}

    if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }else{
  
        $name = $_FILES['file']['name'];
        echo "$name<br>";
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        //Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        //Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            if(file_get_contents($_FILES['file']['tmp_name'])){
                echo"sucess to open stream.<br>";
            }else{
                echo"file_get_contents failed to open stream<br>";
            }
            //Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );

            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
            //Insert record
            //$query = "INSERT INTO `personal_list`(`image`) VALUES('$image')";
            //echo"$query";

            // if(mysqli_query($link,$query)){
            //     echo"sucess<br>";
            // }else{
            //     echo"<br>fail<br>";
            // }
       
        }
    }
    

    $sql="INSERT INTO `personal_list` (`image`,`name_c`,`name_e`,`cell_phone`,`is_show_cell_phone`,
    `office_phone`,`is_show_office_phone`,`fax`,`email_work`,`email_home`,
    `room_no`,`is_show_room_no`, `department_c`,`department_e`,
    `post_address_c`, `post_address_e`,`research_c`,`research_e`)
    VALUES ('$image','$tcherName_c','$tcherName_e','$tcherPhone',$show_tcherPhone,'$tcherOfPhone',$show_tcherOfPhone,'$tcherFax',
    '$tcherOfMail','$tcherMail','$tcherRoom',$show_tcherRoom,'$tcherDep_c','$tcherDep_e','$tcherPostAd_c','$tcherPostAd_e',
    '$tcherRes_c','$tcherRes_e')";
    echo $sql;
    mysqli_query($link,$sql);
    header("Location:teacher_info.php");

}else{
    echo "<h1>You have no permission !</h1>";
}

?>

<!-- http://210.70.80.21/~k107021027/addUser.php -->