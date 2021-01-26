<?php

//SESSION_START();
session_start();
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    $type=$_POST['getType'];
    //echo"$type";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../fun_inc.php');
    htmlHead_b()
    ?>
    <style>
    body,
    html {
        background: #0C0C0C;
        color: #1B813E;
    }
    </style>
</head>

<body>

    <?php  navBar_b();?>
    
    <!-- $sql="SELECT * FROM `Publication` WHERE `type`=0 AND `pub_id`=$type"; -->
   <div class="container mt-4">
        <ol>
            <?php

            $sql="SELECT * FROM `Publication` WHERE `type`=0 AND `pub_id`=$type";
            $result = mysqli_query($link, $sql);
            while ($pubRow = mysqli_fetch_assoc($result)){

                echo"<li style='font-size: 1.3em; padding-bottom:0.3em;'>";
            
                $authorQuery="SELECT * FROM `pub_author` CROSS JOIN `Author` ON `pub_author`.`author_id`=`Author`.`id`
                WHERE `pub_author`.`pub_id` = ".$pubRow['id']." ORDER BY `pub_author`.`author_order`";
                //echo$authorQuery;
                $authorResult=mysqli_query($link,$authorQuery);
                while($authorRow = mysqli_fetch_assoc($authorResult)){
                    echo $authorRow['last_name'].",".$authorRow['first_name'];
                    if($authorRow['isCorresponding'] == 1){
                        echo"*, ";
                    }else{
                        echo", ";
                    }
                }
                echo"(".$pubRow['year']."),\"".$pubRow['title'].",\"";

                $journalQuery="SELECT * FROM `Journal` WHERE `id`=".$pubRow['pub_id'];
                $journalResult = mysqli_query($link,$journalQuery);
                $journalRow = mysqli_fetch_assoc( $journalResult);
                echo"<i>".$journalRow['title']."</i>,";
                
                if($pubRow['volume'] != NILL){
                    echo"Vol. ".$pubRow['volume'].", ";
                }
                if($pubRow['issue'] != NILL){
                    echo"No. ".$pubRow['issue'].", ";
                }
                if($pubRow['month'] != NILL){
                    echo $pubRow['month'].", ";
                }
                echo $pubRow['year'].",pp.".$pubRow['page'].".";
                echo"<form style='display:inline;' action='modifyJour.php'  method='post'>
                <input type='hidden' name='pubID' value='".$pubRow['id']."'/>
                <button type='submit' class='btn btn-secondary'><i class='fas fa-pen'></i></button>
                </form>";
                echo"<form style='display:inline;' onSubmit='return delAccount(this)' action='delList.php' method='post'>
                <input type='hidden' name='pubID' value='".$pubRow['id']."'/>
                <button type='submit' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>
                </form>";

                echo "</li>";
            }
            ?>
        </ol>
   </div>

    <script>
        function myFunction() {
            document.location.href = "http://210.70.80.21/~k107021027/logout.php";
        }
        function delAccount() {
            if (confirm("確定刪除此筆資料?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>

<?php
}else{
    echo "<h1>You have no permission !</h1>";
}

?>