<?php
$dbServer="localhost";
$dbUser="pig";
$dbPass="qwer1234";
$dbName="movie";


//連線資料庫
$conn=@mysqli_connect($dbServer,$dbUser,$dbPass,$dbName);
if(mysqli_connect_error($conn))
{
    die("無法連線資料庫");
}
mysqli_set_charset($conn,"utf-8");
?>