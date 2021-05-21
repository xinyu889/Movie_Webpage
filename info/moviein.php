<?php
  function moviein_intro()
  {
    header('Content-Type:text/html; charset=utf-8');
    include("connect.php");

    if(@$_GET['name_movie']!=' ')
          {
            @$x=@$_GET['name_movie'];
            $sql="SELECT Name_movie,Information_movie,pic from movie WHERE Name_movie ='$x'";
            mysqli_query($conn,$sql);
            $result=mysqli_query($conn,$sql);  
            //$row =mysqli_fetch_array($result) ;
          }


    while($content = mysqli_fetch_array($result))
    {
      echo"
      
            <div class='flex'>
              <div class='item'>
                <img src=$content[2] alt= '' height='70%' ' >
            </div>";
      echo" <div class='item1'>
              <h1>$content[0]</h1>
              <h4>$content[1]</h4>
              </div>
            </div>
         ";
    }      
    
    
  }          
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <title>電影介紹</title>
            <script src="https://kit.fontawesome.com/a9287cef39.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="css/resets.css">
            <link rel="stylesheet" type="text/css" href="css/flexslider.css">
            <link rel="stylesheet" type="text/css" href="css/電影.css">
            <!-- <script src="js/jquery.min.js"></script>
            <script src="js/jquery.flexslider.js"></script>
            <script type="text/javascript" charset="utf-8">
                // Can also be used with $(document).ready()
              $(window).load(function() {
                $('.flexslider').flexslider({
                  animation: "slide",
                  controlsContainer: $(".custom-controls-container"),
                  customDirectionNav: $(".custom-navigation a")
                });
              });
            </script> -->
            
  </head>
  <body style="background-color: cornflowerblue;">
        
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
                        echo"<li><a href='../login.htm'>會員登入</a></li>";
                    }
                ?>
          <li><a href="../signup.htm">註冊會員</a></li>
          <li><a href="info.php">電影資訊瀏覽</a></li>
          <li><a href="../booking/訂票.php">訂票</a></li>
          <li><a href="../bookrecord/訂票紀錄.htm">訂票紀錄/退票</a></li>
            </ul>
        </div>
        <?php
          moviein_intro();
        ?>
  </body>
</html>