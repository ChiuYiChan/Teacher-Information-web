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
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
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
    $sql="SELECT * FROM `personal_list` WHERE `id`= $userID";
    //echo "$sql";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="container center">
        <h3>修改資料</h3>

        <form action='modifyTcher.php' method='post'>
            <input type='hidden' name='userID' value='<?php echo$row['id'];?>'>
            <div class='row'>
                <div class="form-group col-6">
                    <label for="name_c">中文姓名</label>
                    <input class="form-control" type="text" id="name_c" name="tcherName_c" required="required"
                        value=<?php echo$row['name_c'];?>>
                </div>
                <div class="form-group col-6">
                    <label for="name_e">英文姓名</label>
                    <input class="form-control" type="text" id="name_e" name="tcherName_e" required="required"
                        value="<?php echo$row['name_e'];?>">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-6">
                    <label for="phone">私人電話</label>
                    <input class="form-control" type="text" id="phone" name="tcherPhone" required="required"
                        value=<?php echo$row['cell_phone'];?>>
                    <div class='custom-control custom-switch'>
                        <input type="checkbox" class="custom-control-input" id='state_phone' name="show_tcherPhone"
                            <?php if($row['is_show_cell_phone']==0) echo"checked";?>>
                        <label class="custom-control-label" for="state_phone">display</label>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="phoneOf">公用電話</label>
                    <input class="form-control" type="text" id="phoneOf" name="tcherOfPhone" required="required"
                        value=<?php echo"$row[office_phone]";?>>
                    <div class='custom-control custom-switch'>
                        <input type="checkbox" class="custom-control-input" id='state_ofphone' name="show_tcherOfPhone"
                            <?php if($row['is_show_office_phone']==0) echo"checked";?>>
                        <label class="custom-control-label" for="state_ofphone">display</label>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="form-group  col-6">
                    <label for="fax">傳真</label>
                    <input class="form-control" type="text" name="tcherFax" id="fax" value=<?php echo"$row[fax]";?> required="required">
                </div>
                <div class="form-group col-6">
                    <label for="room">研究室</label>
                    <input class="form-control" type="text" name="tcherRoom" id="room" required="required"
                        value=<?php echo$row['room_no'];?>>
                    <div class='custom-control custom-switch'>
                        <input type="checkbox" class="custom-control-input" id='state_tcherRoom' name="show_tcherRoom"
                            <?php if($row['is_show_room_no']==0) echo"checked";?>>
                        <label class="custom-control-label" for="state_tcherRoom">display</label>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-6">
                    <label for="tcherOfMail">工作信箱</label>
                    <input class="form-control" type="email" id="tcherOfMail" name="tcherOfMail" required="required"
                        value="<?php echo"$row[email_work]";?>">
                </div>
                <div class="form-group col-6">
                    <label for="mail">私人信箱</label>
                    <input class="form-control" type="email" id="mail" name="tcherMail" required="required"
                        value="<?php echo"$row[email_home]";?>">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-6">
                    <label for="department_c">職位</label>
                    <select class="form-control form-control-sm" id="department_c" name="tcherDep_c">
                        <option <?php if("$row[department_c]"=="榮譽講座教授") echo"selected";?> value="榮譽講座教授">榮譽講座教授</option>
                        <option <?php if("$row[department_c]"=="系主任") echo"selected";?> value="系主任">系主任</option>
                        <option <?php if("$row[department_c]"=="專任教授") echo"selected";?> value="專任教授">專任教授</option>
                        <option <?php if("$row[department_c]"=="專任副教授") echo"selected";?> value="專任副教授">專任副教授</option>
                        <option <?php if("$row[department_c]"=="專任助理教授") echo"selected";?> value="專任助理教授">專任助理教授</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="department_e">department</label>
                    <input class="form-control" type="text" id="department_e" name="tcherDep_e" required="required"
                        value="<?php echo"$row[department_e]";?>">
                </div>
            </div>
            <div class="form-group">
                <label for="address_c">郵件地址</label>
                <input class="form-control" type="text" id="address_c" name="tcherPostAd_c" required="required"
                    value="<?php echo"$row[post_address_c]";?>">
            </div>
            <div class="form-group">
                <label for="address_e">Post address</label>
                <input class="form-control" type="text" id="address_e" name="tcherPostAd_e" required="required"
                    value="<?php echo"$row[post_address_e]";?>">
            </div>
            <!-- <div class="form-group">
                <input type='file' name='file' required="required" />
            </div> -->

            <label for="research_c">研究領域</label>
            <textarea class="editor" id="research_c" name='research_c'
                rows="5"><?php echo"$row[research_c]";?></textarea>

            <label for="research_e">Research areas</label>
            <textarea class="editor" id="research_e" name='research_e'
                rows="5"><?php echo"$row[research_e]";?></textarea>

            <img src='<?php echo $row['image']; ?>'>
            <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-clipboard-check"></i>Submit</button>
            </div>
        </form>
    </div>


    <script>
    var allEditors = document.querySelectorAll('.editor');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(allEditors[i]);
    }
    </script>
</body>

</html>

<?php
}else{
    echo "<h1>You have no permission !</h1>";
}

?>