<?php

$id=$_GET["id"];
echo $id;

header('Content-Type:text/html; charset=utf-8');
        include("connect.php");

        $sql="DELETE FROM record_seat WHERE `Id_record`=$id";
        mysqli_query($conn,$sql);
        $result=mysqli_query($conn,$sql); 

        $sql1="DELETE FROM record WHERE `Id_record`=$id";
        mysqli_query($conn,$sql1);
        $result=mysqli_query($conn,$sql1); 

        $sql2="DELETE FROM record_ticket WHERE `Id_record`=$id";
        mysqli_query($conn,$sql2);
        $result=mysqli_query($conn,$sql2); 

        header("Location:訂票紀錄.php");
        die();
?>