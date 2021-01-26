<?php
header("Access-contorl-Allow-Origin:*");
$link=mysqli_connect(
    "210.70.80.21",
    "k107021027",
    "gaef4aXe",
    "k107021027_test"
);
if(!$link){
    echo "Error: unable to connect to MySQL:" . PHP_EOL;
    echo "Debugging errno:" . Mysqli_connect_errno() . PHP_EOL;
    echo "Debugging errno:" . Mysqli_connect_error() . PHP_EOL;
    exit;
}
$link -> set_charset("utf8");