<?php
function htmlHead(){
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<script src="https://kit.fontawesome.com/886d5eda3b.js" crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<link rel="stylesheet" href='./bootstrap-4.5.3/css/bootstrap.min.css' />
<script src='./bootstrap-4.5.3/js/bootstrap.bundle.min.js'></script>

<?php
}

function htmlHead_b(){
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<script src="https://kit.fontawesome.com/886d5eda3b.js" crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<link rel="stylesheet" href='../bootstrap-4.5.3/css/bootstrap.min.css' />
<script src='../bootstrap-4.5.3/js/bootstrap.bundle.min.js'></script>

<?php
}

function navBar($flag){
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-brand">
        <img src="./imgs/teacher_login.png" width="30" height="30" class="d-inline-block align-top" alt=""
            loading="lazy"> 教師資訊網
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link 
                    <?php

                        if($flag==1){
                            echo"text-white";
                        }else{
                            echo"text-white-75";
                        }

                    ?>
                    " href="./index.php">首頁</a>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                    <?php

                        if($flag==2){
                            echo"text-white";
                        }else{
                            echo"text-white-75";
                        }

                    ?>
                    " href="#">使用者</a>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                    <?php

                        if($flag==3){
                            echo"text-white";
                        }else{
                            echo"text-white-75";
                        }

                    ?>
                    " href="#">教師</a>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                    <?php

                        if($flag==4){
                            echo"text-white";
                        }else{
                            echo"text-white-75";
                        }

                    ?>
                    " href="./resume.php">簡歷</a>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                    <?php

                        if($flag==5){
                            echo"text-white";
                        }else{
                            echo"text-white-75";
                        }

                    ?>
                    " href="./literary.php">著作</a>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                    <?php

                        if($flag==6){
                            echo"text-white";
                        }else{
                            echo"text-white-75";
                        }

                    ?>
                    " href="#">教學</a>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                    <?php

                        if($flag==7){
                            echo"text-white";
                        }else{
                            echo"text-white-75";
                        }

                    ?>
                    " href="#">徒弟</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-left">
            <li class="nav-item active">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo">Login</button>
            </li>
        </ul>
    </div>
</nav>

<?php
}


function navBar_b(){
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-brand">
        <img src="http://210.70.80.21/~k107021027/imgs/teacher_login.png" width="30" height="30" class="d-inline-block align-top" alt=""
            loading="lazy"> 教師資訊網
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="http://210.70.80.21/~k107021027/mainPage.php">首頁</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://210.70.80.21/~k107021027/user/user_info.php">使用者</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://210.70.80.21/~k107021027/teacher/teacher_info.php">教師一覽</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">簡歷</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://210.70.80.21/~k107021027/pubList/pubList.php">著作</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">教學</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">徒弟</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-left">
            <li class="nav-item active">
                <button type="button" class="btn btn-primary" onclick="myFunction()">Logout</button>
            </li>
        </ul>
    </div>
</nav>
<?php
}


function loginBox(){
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="loginCheck.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="userName" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="userPasswd" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-clipboard-check"></i>
                        Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}
?>