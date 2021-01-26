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
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <title>Document</title>
    <style>
    body {
        height: 100%;
        background-color: #1C1C1C;
        color: #33A6B8;
    }

    .cp {
        display: none;
    }

    input {
        margin-bottom: 20px;
    }

    select {
        margin-bottom: 20px;
    }

    textarea{
        width:70%;
        margin:12px auto;
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

    .image-flip:hover .backside,
    .image-flip.hover .backside {
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        transform: rotateY(0deg);
        border-radius: .25rem;
    }

    .image-flip:hover .frontside,
    .image-flip.hover .frontside {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    .mainflip {
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -ms-transition: 1s;
        -moz-transition: 1s;
        -moz-transform: perspective(1000px);
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;
        position: relative;
    }

    .frontside {
        position: relative;
        -webkit-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        z-index: 2;
        margin-bottom: 30px;
    }

    .backside {
        position: absolute;
        top: 0;
        left: 0;
        background: white;
        -webkit-transform: rotateY(-180deg);
        -moz-transform: rotateY(-180deg);
        -o-transform: rotateY(-180deg);
        -ms-transform: rotateY(-180deg);
        transform: rotateY(-180deg);
        /* -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        box-shadow: 5px 7px 9px -4px rgb(158, 158, 158); */
    }

    .frontside,
    .backside {
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -moz-transition: 1s;
        -moz-transform-style: preserve-3d;
        -o-transition: 1s;
        -o-transform-style: preserve-3d;
        -ms-transition: 1s;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;
    }

    .frontside .card,
    .backside .card {
        background-color: #1C1C1C;
        color: #707C74;
        border: 5px #707C74 solid;
        min-height: 312px;
    }

    .backside .card a {
        font-size: 18px;
        color: #007b5e !important;
    }

    .frontside .card .card-title,
    .backside .card .card-title {
        color: #33A6B8 !important;
    }

    .frontside .card .card-body img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
    }

    @media screen and (max-width: 480px) {
        .cp {
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
        <?php 
        $sql="SELECT * FROM `personal_list`";
        //echo $sql;
        $result=mysqli_query($link,$sql);
        $val= $result->num_rows;
        if( $val > 0){
    ?>
        <!-- <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">名字</th>
                    <th scope="col">電話</th>
                    <th scope="col">信箱</th>
                    <th scope="col">研究室</th>
                    <th scope="col">職位</th>
                    <th scope="col">郵寄位置</th>
                    <th scope="col">創建時間</th>
                    <th scope="col">上次更動</th>
                </tr>
            </thead>
            <tbody> -->
        <?php
    $sql="SELECT * FROM `personal_list`";
    //echo"$sql";
    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($result)){
        // echo "<tr>
        //     <td>".$row['name_c']."</td>
        //     <td>$row[cell_phone]</td>
        //     <td>".$row['email_work']."</td>
        //     <td>".$row['room_no']."</td>
        //     <td>".$row['department_c']."</td>
        //     <td>".$row['post_address_c']."</td>
        //     <td>".$row['create_time']."</td>
        //     <td>".$row['update_time']."</td>
        //     <td>
        //         <form action='modify_t.php' method='post'>
        //             <input type='hidden' name='userID' value='$row[id]'/>
        //             <input type='submit' class='btn btn-secondary' value='修改'/>
        //         </form>
        //         <form action='delTcher.php' method='post' onSubmit='return delAccount(this)'>
        //             <input type='hidden' name='userID' value='$row[id]'/>
        //             <input type='submit' class='btn btn-danger' value='刪除'/>
        //         </form>
        //     </td>
        //     </tr>
        // ";

        echo"
        <div class='col-xs-12 col-sm-6 col-md-4'>
            <div class='image-flip' ontouchstart='this.classList.toggle('hover');'>
                <div class='mainflip'>
                    <div class='frontside'>
                        <div class='card'>
                            <div class='card-body text-center'>
                                <p><img class='img-fluid'
                                        src=".$row['image']."
                                        alt='card image'></p>
                                <h4 class='card-title'>".$row['name_c']."</h4>
                                <p class='card-text'>".$row['email_work']."<br> ".$row['email_home']."
                                </p>
                                <p class='card-text'>TEL:".$row['office_phone']."</p>
                                <p class='card-text'>Fax:".$row['fax']."</p>
                            </div>
                        </div>
                    </div>
                    <div class='backside'>
                        <div class='card'>
                            <div class='card-body text-center mt-4'>
                                <h4 class='card-title'>Modify</h4>
                                <p class='card-text'>Please be careful to change the information!</p>
                                <ul class='list-inline'>
                                    <li class='list-inline-item'>
                                        <form action='modify_t.php' method='post'>
                                            <input type='hidden' name='userID' value='$row[id]' />
                                            <input type='submit' class='btn btn-secondary' value='修改' />
                                        </form>
                                    </li>
                                    <li class='list-inline-item'>
                                        <form action='delTcher.php' method='post' onSubmit='return delAccount(this)'>
                                            <input type='hidden' name='userID' value='$row[id]' />
                                            <input type='submit' class='btn btn-danger' value='刪除' />
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }

    mysqli_free_result($result);
    ?>
        <!-- </tbody>
        </table> -->
    </div>

    <?php 
    }else{
        //若教師資料庫為空
    ?>
    <div class="text-center">
        <p>目前教師資料為空，請點選下方新增按紐</p>
        <p>The current teacher profile is empty, please click the button below</p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-user-plus"></i></button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增教師</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action='addTcher.php' method='post' enctype="multipart/form-data">
                        <div class='row'>
                            <div class="form-group col-6">
                                <label for="name_c">中文姓名</label>
                                <input class="form-control" type="text" id="name_c" name="tcherName_c">
                            </div>
                            <div class="form-group col-6">
                                <label for="name_e">英文姓名</label>
                                <input class="form-control" type="text" id="name_e" name="tcherName_e">
                            </div>
                        </div>
                        <div class='row'>
                            <div class="form-group col-6">
                                <label for="phone">私人電話</label>
                                <input class="form-control" type="text" id="phone" name="tcherPhone" maxlength="10">
                                <div class='custom-control custom-switch'>
                                    <input type="checkbox" class="custom-control-input" id='state_phone'
                                        name="show_tcherPhone" value='0'>
                                    <label class="custom-control-label" for="state_phone">display</label>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="phoneOf">公用電話</label>
                                <input class="form-control" type="text" id="phoneOf" name="tcherOfPhone" maxlength="10">
                                <div class='custom-control custom-switch'>
                                    <input type="checkbox" class="custom-control-input" id='state_ofphone'
                                        name="show_tcherOfPhone" value='0'>
                                    <label class="custom-control-label" for="state_ofphone">display</label>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="form-group  col-6">
                                <label for="fax">傳真</label>
                                <input class="form-control" type="text" name="tcherFax" id="fax">
                            </div>
                            <div class="form-group col-6">
                                <label for="room">研究室</label>
                                <input class="form-control" type="text" name="tcherRoom" id="room">
                                <div class='custom-control custom-switch'>
                                    <input type="checkbox" class="custom-control-input" id='state_tcherRoom'
                                        name="show_tcherRoom" value='0'>
                                    <label class="custom-control-label" for="state_tcherRoom">display</label>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="form-group col-6">
                                <label for="tcherOfMail">工作信箱</label>
                                <input class="form-control" type="email" id="tcherOfMail" name="tcherOfMail">
                            </div>
                            <div class="form-group col-6">
                                <label for="mail">私人信箱</label>
                                <input class="form-control" type="email" id="mail" name="tcherMail">
                            </div>
                        </div>
                        <div class='row'>
                            <div class="form-group col-6">
                                <label for="department_c">職位</label>
                                <!-- <input class="form-control" type="text" id="department_c" name="tcherDep_c"> -->
                                <select class="form-control form-control-sm" id="department_c" name="tcherDep_c">
                                    <option value="榮譽講座教授">榮譽講座教授</option>
                                    <option value="系主任">系主任</option>
                                    <option value="專任教授">專任教授</option>
                                    <option value="專任副教授">專任副教授</option>
                                    <option value="專任助理教授">專任助理教授</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="department_e">department</label>
                                <input class="form-control" type="text" id="department_e" name="tcherDep_e">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address_c">郵件地址</label>
                            <input class="form-control" type="text" id="address_c" name="tcherPostAd_c">
                        </div>
                        <div class="form-group">
                            <label for="address_e">Post address</label>
                            <input class="form-control" type="text" id="address_e" name="tcherPostAd_e">
                        </div>
                        <div class="row">
                            <textarea class="editor" id="research_c" name='research_c'
                                rows="2" placeholder="研究領域(詳細請再新增後至修改處做更改)"></textarea>
                        </div>
                        <div class="row">
                            <textarea class="editor" id="research_e" name='research_e'
                                rows="2" placeholder="Research areas"></textarea>
                        </div>
                        <div class="form-group">
                            <input type='file' name='file' required="required" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fas fa-clipboard-check"></i>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }
    ?>

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
<!-- http://210.70.80.21/~k107021027/ -->
<?php
}else{
    echo "<h1>You have no permission !</h1>";
}
?>