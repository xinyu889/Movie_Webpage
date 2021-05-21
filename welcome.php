<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
            echo "<link rel='stylesheet' type='text/css' href='css/home.css'>";
        ?>
        <link rel="stylesheet" type="text/css" href="css/resets.css">
        <link rel="stylesheet" type="text/css" href="css/flexslider.css">
        <script src="js/jquery.min.js"></script>
            <script src="js/jquery.flexslider.js"></script>
                <script type="text/javascript" charset="utf-8">
                // Can also be used with $(document).ready()
                    $(window).load(function() {
                    $('.flexslider').flexslider({
                    animation: "slide"
                    });
                });
                </script>
            <title>歡迎登入</title>
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
                        echo"<li><a href='logout.php'>登出</a></li>";
                    }
                    else
                    {
                        echo"<li><a href='login.htm'>登入</a></li>";
                    }
                ?>
                
                <li><a href="signup.htm">註冊</a></li>
                <li><a href="info/info.php">電影資訊瀏覽</a></li>
                <li><a href="booking/訂票.php">訂票</a></li>
                <li><a href="bookrecord/訂票紀錄.php">訂票紀錄/退票</a></li>
            </ul>
        </div>
        
        <div class="flex">
          <div class="item">
            <div class="flexslider">
              <ul class="slides">
                <li>
                  <img src="pic/1.png"alt="" width="65px" height="52px" />
                </li>
                <li>
                  <img src="pic/2.png" />
                </li>
                <li>
                  <img src="pic/3.png" />
                </li>
                <li>
                  <img src="pic/4.png" />
                </li>
              </ul>
            </div>
          </div>
        
    </body>
</html>