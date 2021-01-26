<?php
//SESSION_START();
session_start();
if(isset($_SESSION['userID'])){
    include('fun_inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://kit.fontawesome.com/886d5eda3b.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./bootstrap-4.5.3/css/bootstrap.min.css" />
    <script src="./bootstrap-4.5.3/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        body{
            height:100%;
            background-color:#1C1C1C;
            color:#33A6B8;
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

    </style>
</head>

<body>

    <?php  navBar_b();?>

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
                One of three columns
                <button onclick="location.href='sendMail.php'">寄信</button>
                <!-- <button onclick="location.href='pdfCreate.php'">PDF</button> -->
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <p>Footer</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>

    <script>
    function myFunction() {
        document.location.href="logout.php";
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