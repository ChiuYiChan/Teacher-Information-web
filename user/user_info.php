<?php
//SESSION_START();
session_start();
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    include('../fun_inc.php');
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

    .addUser {
        z-index: 1;
        position: fixed;
        bottom: 10%;
        right: 5%;
    }

    input {
        margin-bottom: 20px;
    }

    select {
        margin-bottom: 20px;
    }

    footer {
        background-color: #8493A6;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
    }

    @media screen and (max-width: 480px) {
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

    <?php  navBar_b();?>

    <div class="container mt-4">
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">名字</th>
                    <th scope="col" class='mb'>信箱</th>
                    <th scope="col" class='mb'>電話</th>
                    <th scope="col">權限</th>
                    <th scope="col">狀態</th>
                    <th scope="col">更動</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $sql="SELECT * FROM `user`";
    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($result)){
        if($row['state']==0){
            $row['state']='on';
        }else{
            $row['state']='off';
        }

        if($row['type']==1){
            $row['type']='教授';
        }elseif($row['type']==2){
            $row['type']='研究生';
        }else{
            $row['type']='工讀生';
        }

        echo "<tr>
            <td>$row[name]</td>
            <td class='mb'>".$row['e-mail']."</td>
            <td class='mb'>$row[phone]</td>
            <td>$row[type]</td>
            <td>$row[state]</td>
            <td>
                <form action='modify.php' method='post'>
                    <input type='hidden' name='userID' value='$row[id]'/>
                    <input type='submit' class='btn btn-secondary' value='修改'/>
                </form>
                <form action='delUser.php' method='post' onSubmit='return delAccount(this)'>
                    <input type='hidden' name='userID' value='$row[id]'/>
                    <input type='submit' class='btn btn-danger' value='刪除'/>
                </form>
            </td>
            </tr>
        ";
    }

    mysqli_free_result($result);
    ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="addUser.php" method="post">
                        <input class="form-control" type="text" name="userName" placeholder="Name" required="required">
                        <input class="form-control" type="text" name="userEmail" placeholder="User Account" required="required">
                        <input class="form-control" type="password" name="userPasswd" placeholder="PassWord" required="required">
                        <select class="form-control form-control-sm" name="type">
                            <option value="1">教授</option>
                            <option value="2">研究生</option>
                            <option value="3">工讀生</option>
                        </select>
                        <input class="form-control" type="tel" name="userPhone" placeholder="Phone" required="required">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-info addUser" data-toggle="modal" data-target="#exampleModal"><i
            class="fas fa-user-plus"></i></button>
    <!-- Footer -->
    <footer>
        <p>Footer</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    function myFunction() {
        document.location.href = "http://210.70.80.21/~k107021027/logout.php";
    }

    function goModify() {
        document.location.href = "modify.php";
    }

    function delAccount(userEmail) {
        if (confirm("確定刪除此筆資料?")) {
            return true;
        } else {
            return false;
        }
    }
    </script>
</body>

</html>
<!-- http://210.70.80.21/~k107021027/ -->
<?php
}else{
    echo "<h1>You have no permission !</h1>";
}
?>