<?php
session_start();
// echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    include('../fun_inc.php');

    $pubID=$_POST['pubID'];
    //echo"$userID";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php htmlHead_b()?>
    <title>Document</title>
    <style>
    body {
        height: 100%;
        background-color: #1C1C1C;
        color: #33A6B8;
    }

    .center {
        margin: 100px auto;
        width: 40%;
    }

    input {
        margin-bottom: 20px;
    }

    select {
        margin-bottom: 20px;
    }

    .custom-switch {
        margin: 10px auto;
    }

    .green-border-focus .form-control:focus {
        border: 1px solid #8bc34a;
        box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, .25);
    }

    footer {
        background-color: #8493A6;
    }

    @media screen and (max-width: 480px) {
        .center {
            margin: 100px auto;
            width: 70%;
        }
    }
    </style>
</head>

<body>
    <?php
    $sql="SELECT * FROM `Publication` WHERE `id`= $pubID";
    //echo "$sql";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="container center">
        <h3>修改資料</h3>

        <form action='modifyJaction.php' method='post'>
            <input type='hidden' name='pubID' value='<?php echo$row['id'];?>'>
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" id="title" name="pub_title" value="<?php echo$row['title'];?>">
            </div>
            <div class="form-group">
                <label for="type">type</label>
                <select class="form-control form-control-sm" id="type" name="pubType">
                    <?php
                    $sql="SELECT * FROM `Journal`";
                    //echo "$sql";
                    $result=mysqli_query($link,$sql);
                    while($row_j=mysqli_fetch_assoc($result)){
                        echo"<option value=".$row_j['id'];
                        if("$row[pub_id]"=="$row_j[id]") echo" selected";
                        echo ">".$row_j['title']."</option>";
                    }
                    mysqli_free_result($result);
                ?>
                </select>
            </div>
            <div class='row'>
                <div class="form-group col-6">
                    <label for="year">year</label>
                    <input class="form-control" type="text" id="year" name="pub_year" value=<?php echo$row['year'];?>>
                </div>
                <div class="form-group col-6">
                    <label for="volume">volume</label>
                    <input class="form-control" type="text" id="volume" name="pub_volum"
                        value=<?php echo"$row[volume]";?>>
                </div>
            </div>
            <div class='row'>
                <div class="form-group  col-6">
                    <label for="issue">issue</label>
                    <input class="form-control" type="text" name="pub_issue" id="issue"
                        value=<?php echo"$row[issue]";?>>
                </div>
                <div class="form-group col-6">
                    <label for="page">page</label>
                    <input class="form-control" type="text" name="pub_p" id="page" value=<?php echo$row['page'];?>>
                </div>
            </div>
            <!-- 新增作者 -->
            <?php
            $authorQuery="SELECT * FROM `pub_author` CROSS JOIN `Author` ON `pub_author`.`author_id`=`Author`.`id`
            WHERE `pub_author`.`pub_id` = ".$row['id']." ORDER BY `pub_author`.`author_order`";
            //echo$authorQuery;
            $authorResult=mysqli_query($link,$authorQuery);
            while($authorRow = mysqli_fetch_assoc($authorResult)){
                echo"<label for='pub_name'>Author</label>
                <select class='form-control form-control-md' id='pub_name' name='pub_name[]'>";
                //echo $authorRow['last_name']." ".$authorRow['first_name'];
                echo"<option value=".$authorRow['id']." selected>".$authorRow['last_name']." ".$authorRow['first_name']."</option>";
                // -------------------show all option-------------------
                $sql="SELECT * FROM `Author`";
                //echo "$sql";
                $authorAllResult=mysqli_query($link,$sql);
                while($allRow=mysqli_fetch_assoc($authorAllResult)){
                    if( $authorRow['id'] != $allRow['id']){
                        echo"<option value=".$allRow['id'].">".$allRow['last_name']." ".$allRow['first_name']."</option>";
                    }
                }
                echo"</select>";
                if($authorRow['isCorresponding'] == 1){
                    echo"<div class='form-text'>This Author is Corresponding.</div>";
                }
            }
            mysqli_free_result($authorResult);
            ?>


            <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-clipboard-check"></i>Submit</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <form action='list_journal.php' method='post'>
                <input type='hidden' name='getType' value=<?php echo$row['pub_id'];?> />
                <input type='submit' class='btn btn-secondary' value='返回' />
            </form>
        </div>
    </div>

</body>

</html>

<?php
}else{
    echo "<h1>You have no permission !</h1>";
}

?>