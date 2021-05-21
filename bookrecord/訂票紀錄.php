<?php
    function user_main_bookingrecord()
    {
        header('Content-Type:text/html; charset=utf-8');
        include("connect.php");
        @$ro=$_SESSION['user'];
        @$password=$_SESSION['password'];
        $user= "SELECT `Id_user` FROM `user` WHERE `Name_user`='$ro' and `Password`='$password'";
        $user=mysqli_query($conn,$user);
        $user = mysqli_fetch_assoc($user);
        $user = implode($user);

        $sql="SELECT Name_movie,Name_user,Time,record.Date,Name_theater,Id_seat,record.Id_record FROM time,movie,user,record,theater,record_seat WHERE record.Id_user=$user and record.Id_movie=movie.Id_movie and record.Id_time=time.Id_time and record.Id_theater=theater.Id_theater and record.Id_record=record_seat.Id_record and user.Id_user=$user";
        mysqli_query($conn,$sql);
        $result=mysqli_query($conn,$sql); 

        while( $conten = mysqli_fetch_array($result) )
        {   
           
            echo"<div class=\"box\">
            <div class=\"info\">
            <p style=\"font-size: 20px;\">$conten[0]</p>";
            echo"<p> <i class=\"fas fa-map-marker-alt\"></i> 影城 $conten[4]</p>
            <p> <i class=\"far fa-clock\"></i> 場次 $conten[2]</p>
            <p><i class=\"fas fa-calendar-alt\"></i> 日期 $conten[3]</p>
            <p><i class=\"fas fa-chair\"></i> 座位 $conten[5]</p>
            
            <input type=\"button\" value=\"退票\"  onclick=\"location='test.php?id=$conten[6]', window.alert('退票成功');\" style=\"position: relative;left: 80%;width: 10%;padding: 2px;top: 20%;font-size: 20px;\">
            </div>
            </div>";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>訂退票紀錄</title>
        <script src="https://kit.fontawesome.com/a9287cef39.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/紀錄.css">
        <link rel="stylesheet" type="text/css" href="resets.css">
        <link rel="stylesheet" type="text/css" href="flexslider.css">
        <script src="jquery.min.js"></script>
            <script src="jquery.flexslider.js"></script>
            <script type="text/javascript" charset="utf-8">
                $(function() {
                    $(".flexslider").flexslider({
                      slideshowSpeed: 5000, //展示时间间隔ms
                      animationSpeed: 500, //滚动时间ms
                      touch: true //是否支持触屏滑动
                    });
                }); 
            </script>
    </head>

    <body>
<div class="menu" >
            <div style="text-align:left;color:white;">
            <?php 
		session_start();
                @$ro=$_SESSION['user'];
            ?>
            <h3>
                <?php 
                    if($ro)
                    {
                        echo"welcome!!";
                        echo $_SESSION['user'];
                    }
                ?>
            </h3>
            </div>
            <ul>
                <?php
                    if($ro)
                    {
                        echo"<li><a href='../logout.php'>登出</a></li>";
                    }
                    else
                    {
                        echo"<li><a href='../login.htm'>登入</a></li>";
                    }
                ?>
                
                <li><a href="../signup.htm">註冊</a></li>
         	<li><a href="../info/info.php">電影資訊瀏覽</a></li>
         	<li><a href="../booking/訂票.php">訂票</a></li>
         	<li><a href="訂票紀錄.php">訂票紀錄/退票</a></li>
            </ul>
        </div>


        <div class="trace">
          <p style="position: relative;left: 15%;">購票記錄查詢</p>
        </div>
        <?php 
            @$ro=$_SESSION['user'];
            if($ro){
                echo"<div class=\"word\">
                    訂票名稱";
                echo"<p>";
                echo$_SESSION['user'];
                echo"</p>";
                echo"<p style=\"color:#BEBEBE;font-size: 10px;\">若購票失敗您的付款授權稍後將被取消不會收取任何費用，可於 30 分後重新確認。</p>
                    </div>";
            }
        ?>
        <?php
        user_main_bookingrecord();
        ?>
        <script>
            var butt=document.getElementById("butt")
            butt.onclick=function(){
                console.log()
            }
        </script>

    </body>
</html>
