<?php

    function user_main_movieIntro()
    {
        header('Content-Type:text/html; charset=utf-8');
        include("connect.php");
        $sql="SELECT Name_movie,pic FROM movie";
        mysqli_query($conn,$sql);
        $result=mysqli_query($conn,$sql); 

        //$row = mysqli_num_rows($result);    // 取得 Tuple 數
        //$col = mysqli_num_fields( $result); // 取得 Attribute 數
        echo"<div class='flexslider'style='width:auto; height:600px;'>";
        echo"<ul class='slides'>";
        while($content = mysqli_fetch_array($result))
        {
            
            
             echo"<li>
                <table border='0' margin='0'; cellspacing='4'>
                  <tr>
                    <td class='pic'>
                      <img src=$content[1] alt= ''>
                      <a href='moviein.php?name_movie={$content[0]}'><li><h4></i>$content[0]</h4></li></a>
                    </td>";

                    if($content =mysqli_fetch_array($result))
                    {
                      echo" <td class='text'>
                            <img src=$content[1] alt= ''>
                            <a href='moviein.php?name_movie={$content[0]}'><li><h4></i>$content[0]</h4></li></a>
                            </td>";
                    }

                    if($content =mysqli_fetch_array($result))
                    {
                      echo" <td class='text'>
                            <img src=$content[1] alt= '' >
                            <a href='moviein.php?name_movie={$content[0]}'><li><h4></i>$content[0]</h4></li></a>
                            </td>";
                    }

                    if($content =mysqli_fetch_array($result))
                    {
                      echo" <td class='text'>
                            <img src=$content[1] alt= '' >
                            <a href='moviein.php?name_movie={$content[0]}'><li><h4></i>$content[0]</h4></li></a>
                            </td>
                          </tr>";
                    }

            
            echo" </table>
                    </li>";

        }
        echo"</ul>
        </div>";
        # 釋放記憶體
	    mysqli_free_result($result);
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
            <link rel="stylesheet" type="text/css" href="css/介紹.css">
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.flexslider.js"></script>
            <!-- <script type="text/javascript" charset="utf-8">
                // Can also be used with $(document).ready()
              $(window).load(function() {
                $('.flexslider').flexslider({
                  animation: "slide",
                  controlsContainer: $(".custom-controls-container"),
                  customDirectionNav: $(".custom-navigation a")
                });
              });
            </script> -->
            <script type="text/javascript" charset="utf-8">
                // Can also be used with $(document).ready()
                $(function() {
                    $(".flexslider").flexslider({
                      slideshowSpeed: 3000, //展示時間間隔ms
                      animationSpeed: 500, //滾動時間ms
                      touch: true //是否支持觸屏滑動
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
                  <li><a href="../signup.htm">註冊會員</a></li>
                  <li><a href="../login.htm">會員登入</a></li>
                  <li><a href="info.php">電影資訊瀏覽</a></li>
                  <li><a href="../booking/訂票.php">訂票</a></li>
                  <li><a href="../bookrecord/訂票紀錄.php">訂票紀錄/退票</a></li>
            </ul>
     </div>
     
     <?php 
        user_main_movieIntro();
     ?>
     </body>
     <footer>
    <!-- <div class="custom-navigation"> -->
      <!-- <a href="#" class="flex-prev">Prev</a>
      <div class="custom-controls-container"></div>
      <a href="#" class="flex-next">Next</a> -->
      <p style="color:white;">XYZ 影城</p>
      <p style="color:white;">謝謝瀏覽</p>
    <!-- </div> -->
    </footer>
</html>