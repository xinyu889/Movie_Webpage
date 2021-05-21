<?php 
        if(!isset($_POST['submit'])){
            exit("錯誤執行");
        }//判斷是否有submit操作
        session_start();
        @$ro=$_SESSION['user'];
        @$password=$_SESSION['password'];
        $theater=$_POST['theater'];
        $movie=$_POST['movie'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $ticket1=$_POST['1'];
        $ticket2=$_POST['2'];
        $ticket3=$_POST['3'];
        $ticket4=$_POST['4'];
	$ticketnum=$ticket1+$ticket2+$ticket3+$ticket4;
        header('Content-Type:text/html; charset=utf-8');
        include("connect.php");
        $user= "SELECT `Id_user` FROM `user` WHERE `Name_user`='$ro' and `Password`='$password'";
        $user=mysqli_query($conn,$user);
        $user = mysqli_fetch_assoc($user);
        $user = implode($user);
        $theater = "SELECT `Id_theater` FROM `theater` WHERE `Name_theater`='$theater'";
        $theater=mysqli_query($conn,$theater);
        $theater = mysqli_fetch_assoc($theater);
        $theater = implode($theater);
        $movie = "SELECT `Id_movie` FROM `movie` WHERE `Name_movie`='$movie'";
        $movie=mysqli_query($conn,$movie);
        $movie = mysqli_fetch_assoc($movie);
        $movie = implode($movie);
        $time = "SELECT `Id_time` FROM `time` WHERE `Time`='$time'";
        $time=mysqli_query($conn,$time);
        $time = mysqli_fetch_assoc($time);
        $time = implode($time);

        $q="INSERT INTO record(Id_user,Id_theater,Id_movie,Date,Id_time) VALUES ('$user','$theater','$movie','$date','$time')";//向資料庫插入表單傳來的值的sql
        $reslut=mysqli_query($conn,$q);

         $record_num = "SELECT `Id_record` FROM `record` WHERE `Id_user`='$user' and `Id_theater`='$theater' and `Id_movie`='$movie' and `Date`='$date' and `Id_time`='$time'";
         $result = mysqli_query($conn,$record_num) or die("無法送出" . mysqli_error( ));
         while($content = mysqli_fetch_assoc($result)) 
        {
                $record= $content['Id_record'];
        }
         if (!$record)
        {
            die('Error: ' . mysqli_error($conn));//如果sql執行失敗輸出錯誤
        }
        else{
            $_SESSION['Id_record'] = $record;            
            $_SESSION['Id_theater'] = $theater;
            $_SESSION['Id_movie'] = $movie;
            $_SESSION['Date'] = $date;
            $_SESSION['Id_time'] = $time;
	    $_SESSION['Ticket_num'] = $ticketnum;

            header("Location: booking2.php");//如果成功跳轉至welcome.php頁面
        }
         $ticket1="INSERT INTO record_ticket(Id_record,Id_ticket,Ticket_num) VALUES ('$record','1','$ticket1')";
         $ticket1=mysqli_query($conn,$ticket1);
         $ticket2="INSERT INTO record_ticket(Id_record,Id_ticket,Ticket_num) VALUES ('$record','2','$ticket2')";
         $ticket2=mysqli_query($conn,$ticket2);
         $ticket3="INSERT INTO record_ticket(Id_record,Id_ticket,Ticket_num) VALUES ('$record','3','$ticket3')";
         $ticket3=mysqli_query($conn,$ticket3);
         $ticket4="INSERT INTO record_ticket(Id_record,Id_ticket,Ticket_num) VALUES ('$record','4','$ticket4')";
         $ticket4=mysqli_query($conn,$ticket4);

         mysqli_close($conn);//關閉資料庫


?>