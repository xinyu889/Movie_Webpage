<!DOCTYPE html>
<html>

    <head>
		<meta charset ="utf-8">
		<title>訂票2</title>
		<link rel="stylesheet" href="css/訂票2.css">
        <link rel="stylesheet" href="css/all.css">

    </head>
    <body>
		<div class="menu" >
        <ul>
            <li><a href="../signup.htm">註冊會員</a></li>
			<li><a href="../login.htm">會員登入</a></li>
			<li><a href="../info/info.php">電影資訊瀏覽</a></li>
			<li><a href="訂票.php">訂票</a></li>
			<li><a href="../bookrecord/訂票紀錄.php">訂票紀錄/退票</a></li>
		</ul>  
        </div>
        <div class="nav">
            <h1>選擇座位</h1>
            <h>選擇您希望購買的座位，請注意系統將自動為您保留可訂的最佳座位</h>
        </div>
        <div class="number">
            
        </div>

        <?php

        header('Content-Type:text/html; charset=utf-8');
        include("connect.php");
        session_start();
        $theater=$_SESSION['Id_theater'];
        $movie=$_SESSION['Id_movie'];
        $date=$_SESSION['Date'];
        $time=$_SESSION['Id_time'];
        $ticketnum=$_SESSION['Ticket_num'];
        print$ticketnum;
        $sql = "SELECT `Id_seat` FROM `record_seat` WHERE `Id_theater`='$theater' and `Id_movie`='$movie' and `Date`='$date' and `Id_time`='$time' order by Id_seat";
        $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));
        echo"<div class='seating'>
            <form id='reservation' method='post' action='test1.php'>
                <section id='seats'>";        
                        for($i=0;$i<68;$i++)
                        {
                            while($content = mysqli_fetch_assoc($result))
                            {
                                $record=$content['Id_seat'];
        
                                for($j=$i;$j<68;$j++)
                                {
                                    if($j==$record)
                                    {

                                        echo "<input id=$j class='seat-select' type='checkbox' value='$j' name='seat[]' onclick='count()'/>";
                                        echo "<label for=$j class='onseat'></label>";
                                        $i=$j+1;
                                        break;
                                    }
                                    else
                                    {
                                        echo "<input id=$j class='seat-select' type='checkbox' value='$j' name='seat[]' onclick='count()'/>";
                                        echo "<label for=$j class='seat'></label>";  
                                    }
                                }
                            }  
                            echo "<input id=$i class='seat-select' type='checkbox' value='$i' name='seat[]' onclick='count()'/>";
                            echo "<label for=$i class='seat'></label>";   
                        }
                echo"<script type='text/javascript'>
                var i = 0;
                function count() 
                {
                    i++; 
                    if(i==$ticketnum)
                    {
                        alert('你已選了'+i+'個座位');  
                    }
                    else if(i>$ticketnum)
                    {
                        alert('超過該選座位數'); 
                        location.reload();
                    }
                }
 
                </script>";
               
                echo"</section>
                <div class=\"next\">
                <input type=\"submit\" value=\"下一步\" onclick=go()></input>
                </div>
            </form>
        </div>";
        ?>

        
  
	</body>
</html>