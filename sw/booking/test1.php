<?php

header('Content-Type:text/html; charset=utf-8');
include("connect.php");
session_start();
$record=$_SESSION['Id_record'];
$theater=$_SESSION['Id_theater'];
$movie=$_SESSION['Id_movie'];
$date=$_SESSION['Date'];
$time=$_SESSION['Id_time'];


if(!empty($_POST['seat'])) {
    foreach($_POST['seat'] as $check) 
    {
        $q="INSERT INTO record_seat(Id_record,Id_theater,Id_movie,Date,Id_time,Id_seat) VALUES ('$record','$theater','$movie','$date','$time','$check')";    
        $reslut=mysqli_query($conn,$q);//執行sql
        if (!$reslut)
        {
            die('Error: ' . mysqli_error($conn));//如果sql執行失敗輸出錯誤
        }
        else
        {
            header("Location: ../bookrecord/訂票紀錄.php");
        }
    }
}

?>


