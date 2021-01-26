<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('fun_inc.php');
    include("db_conn.inc.php");

    $sql="SELECT * FROM `personal_list`";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);

    htmlHead();?>
    <title>Document</title>
    <style>
        html,
        body {
            height: 100%;
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
            body {
                background-repeat: no-repeat fixed;
                background-position: center;
            }
        }
    </style>
</head>

<body>
    
    <?php  navBar(1);?>
    <?php  loginBox();?>
    
    <div class="container" id="discrib">
        <div class="row my-4">
            <div class="col-sm-4">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./imgs/hacker.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./imgs/code--illu.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div>
                    <h3><?php echo$row['name_c'];?> (<?php echo$row['name_e'];?>) <?php echo$row['department_c'];?></h3>
                    <p><?php echo"$row[research_c]";?></p>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">電子郵件信箱</th>
                            <td><?php echo$row['email_work'];?><br> <?php if($row[type]==0) echo$row['email_home'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">聯絡電話</th>
                            <td><?php if($row['is_show_office_phone']==0) echo"+886-".$row['office_phone'];?><br><?php if($row['is_cell_phone']==0) echo"+886-".$row['cell_phone'];?></td></td>
                        </tr>
                        <tr>
                            <th scope="row">傳真</th>
                            <td><?php echo$row['fax'];?></td>
                        </tr>
                        <tr>
                            <th scope="row">郵寄地址</th>
                            <td><?php echo$row['post_address_c'];?></td>
                        </tr>
                        <?php 
                            if($row['is_show_room_no']==0) {
                                echo"<tr>
                                <th scope='row'>研究室</th>
                                <td>".$row['room_no']."</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <p>Footer</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>
<!-- http://210.70.80.21/~k107021027/ -->