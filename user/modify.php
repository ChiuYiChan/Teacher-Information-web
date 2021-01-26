<?php
session_start();
// echo $_SESSION['userID'];
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    include('../fun_inc.php');
    $userID=$_POST['userID'];
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
    .pc {
        display: none;
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
        margin: 35px auto;
    }

    foot {
        background-color: #8493A6;
    }

    @media screen and (max-width: 480px) {
        .center {
            margin: 100px auto;
            width: 70%;
        }

        .custom-switch {
            margin-top: 0px;
            margin-bottom: 20px;
        }

        .pc {
            display: block;
        }

        .mb {
            display: none;
        }
    }
    </style>
</head>

<body>
    <?php
    $sql="SELECT * FROM `user` WHERE `id`= $userID";
    //echo "$sql";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="container center">
        <h3>修改資料</h3>
        <form action="modifyUser.php" method="post">
            <div class="row">
                <div class='form-group col-5'>
                    <label for="id">id</label>
                    <input class="form-control" type="text" name='userID' id="id" readonly="readonly"
                        value=<?php echo"$row[id]";?>>
                </div>
                <div class='form-group col-7-sm custom-control custom-switch'>
                    <input type="checkbox" class="custom-control-input" id='state' name='state' required="required"
                        <?php if($row[state]==0) echo"checked";?> value='0'>
                    <label class="custom-control-label" for="state">User on use or not</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="name">User Name</label>
                    <input class="form-control" type="text" id="name" name='userName' value=<?php echo"$row[name]";?> required="required">
                </div>
                <div class="col-3" style="margin-top:30px;">
                    <button type="button" class="btn btn-secondary mb" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo">修改密碼</button>
                        <button type="button" class="btn btn-secondary pc" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo"><i class="fas fa-unlock-alt"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control" type="text" id="email" name='userEmail' value=<?php echo$row['e-mail'];?> required="required">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input class="form-control" type="text" id="phone" name='userPhone' value=<?php echo"$row[phone]";?> required="required">
            </div>
            <div class="form-group">
                <label for="type">User previlige</label>
                <select class="form-control form-control-sm" id="type" name='type'>
                    <option <?php if($row[type]==1) echo"selected";?> value="1">教授</option>
                    <option <?php if($row[type]==2) echo"selected";?> value="2">研究生</option>
                    <option <?php if($row[type]==3) echo"selected";?> value="3">工讀生</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-clipboard-check"></i> Submit</button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">變更密碼</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  action="cg_Userpwd.php" method="post" onSubmit='return check(this)'>
                        <input type='hidden' name='userID' value=<?php echo"$row[id]";?>>
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" class="form-control" name='userPasswd' id="pw1" value='' required="required">
                            <small id="emailHelp" class="form-text text-muted">New password's length should longer than 7.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Check Again</label>
                            <input type="password" class="form-control" id="pw2" value='' required="required">
                            <small id="emailHelp" class="form-text text-muted">Please enter your password again.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function check() {
        p1 = document.getElementById('pw1').value;
        p2 = document.getElementById('pw2').value;
        if (p1  == p2) {
            if (p1.length > 6 && p2.length > 6) {
                return true;
            } else {
                alert("密碼設定至少 7 碼以上");
                return false;
            }
        } else {
            alert("兩組密碼不一致");
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