<?php
    function booking_main_inputTheater(){
      
        header('Content-Type:text/html; charset=utf-8');
        include("connect.php");
        # 建立SQL連線

        $sql = "SELECT DISTINCT `Name_theater` FROM `theater`";
        $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));

        while($content = mysqli_fetch_assoc($result)) 
        {
            $theater = $content['Name_theater'];
            echo "<option value='$theater'>$theater</option>";     
        }
    }

    function booking_main_inputMovie(){
        header('Content-Type:text/html; charset=utf-8');
        include("connect.php");
  
          $sql = "SELECT DISTINCT `Name_movie` FROM `movie`";
          $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));
  
          while($content = mysqli_fetch_assoc($result)) 
          {
              $movie = $content['Name_movie'];
              echo "<option value='$movie'>$movie</option>";     
          }

      }
      function booking_main_inputTime(){
      
          header('Content-Type:text/html; charset=utf-8');
          include("connect.php");
  
          $sql = "SELECT DISTINCT `Time` FROM `time`";
          $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));
  
          while($content = mysqli_fetch_assoc($result)) 
          {
              
                $time = $content['Time'];
                echo "<option value='$time'>$time</option>";         
          }
          
      }
      function booking_main_inputTicket1(){
          include("connect.php");
          $sql = "SELECT `Name_ticket`,`Price_ticket` FROM `ticket` WHERE `Id_ticket`=1";
          $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));
  
          if($content = mysqli_fetch_assoc($result)) 
          {
                $ticket1 = $content['Name_ticket'];
                $price1= $content['Price_ticket'];
                echo "<p><label>$ticket1 $price1;
                        <input type='number' name='1' min='0' max='3' step='1' value='0'>(Enter a number between 0 and 3)</input>
                        </label></p>";
                echo "<br>";    
          }
      }

      function booking_main_inputTicket2(){

          include("connect.php");
  
          $sql = "SELECT `Name_ticket`,`Price_ticket` FROM `ticket` WHERE `Id_ticket`=2";
          $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));
  
          if($content = mysqli_fetch_assoc($result)) 
          {
                $ticket2 = $content['Name_ticket'];
                $price2= $content['Price_ticket'];
                echo "<p><label>$ticket2 $price2;
                <input type='number' name='2' min='0' max='3' step='1' value='0'>(Enter a number between 0 and 3)</input>
                </label></p>";
                echo "<br>";  
          }
      }
      function booking_main_inputTicket3(){
          include("connect.php");
  
          $sql = "SELECT `Name_ticket`,`Price_ticket` FROM `ticket` WHERE `Id_ticket`=3";
          $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));
  
          if($content = mysqli_fetch_assoc($result)) 
          {
                $ticket3 = $content['Name_ticket'];
                $price3= $content['Price_ticket'];
                echo "<p><label>$ticket3 $price3;
                <input type='number' name='3' min='0' max='3' step='1' value='0'>(Enter a number between 0 and 3)</input>
                </label></p>";    
                echo "<br>";    
          }
      }
      function booking_main_inputTicket4(){
      
          include("connect.php");
  
          $sql = "SELECT `Name_ticket`,`Price_ticket` FROM `ticket` WHERE `Id_ticket`=4";
          $result = mysqli_query($conn, $sql) or die("無法送出" . mysqli_error( ));
  
          if($content = mysqli_fetch_assoc($result)) 
          {
                $ticket4 = $content['Name_ticket'];
                $price4= $content['Price_ticket'];
                echo "<p><label>$ticket4 $price4;
                <input type='number' name='4' min='0' max='3' step='1' value='0'>(Enter a number between 0 and 3)</input>
                </label></p>";
                echo "<br>";    
          }
      }
  

?>

      <!DOCTYPE html>
      <html>
      
          <head>
              <meta charset ="utf-8">
              <title>訂票</title>
              <link rel="stylesheet" href="css/訂票.css">
              <link rel="stylesheet" href="css/all.css">
      
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
                    if(!empty($ro))
                    {
                        echo"welcome!!";
                        echo $_SESSION['user'];
                    }
                    else{
                      header("Location:../login.htm");
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
                  <li><a href="../info/info.php">電影資訊瀏覽</a></li>
                  <li><a href="訂票.php">訂票</a></li>
                  <li><a href="../bookrecord/訂票紀錄.php">訂票紀錄/退票</a></li>
              </ul>  
              </div>
              
              <div class="theater">
                  <form name="form" method="post" action="test.php">
                  <i class="fas fa-map-marker-alt fa-2x"></i>
                  &ensp;
                  <select name="theater">
                      <option>請選擇影城</option>
                      <?php booking_main_inputTheater(); ?>
                  </select>
                  <br>
                  <i class="fas fa-video fa-2x"></i>
                  <select name="movie">
                      <option>請選擇影片</option>
                      <?php booking_main_inputMovie(); ?>
                  </select>
                  <br>
                  <i class="fas fa-calendar fa-2x"></i>
                  &thinsp; 
                  <select name="date">
                      <option>請選擇日期</option>
                      <option>
                          <script language="javascript">
                            var today=new Date();
                            document.write(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate());
                          </script>
                      </option>
                      <option>
                          <script language="javascript">
                            var today=new Date();
                            document.write(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+1));
                          </script>
                      </option>
                      <option>
                          <script language="javascript">
                            var today=new Date();
                            document.write(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+2));
                          </script>
                      </option>
                      <option>
                          <script language="javascript">
                            var today=new Date();
                            document.write(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+3));
                          </script>
                      </option>
                      <option>
                          <script language="javascript">
                            var today=new Date();
                            document.write(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+4));
                          </script>
                      </option>
                      <option>
                          <script language="javascript">
                            var today=new Date();
                            document.write(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+5));
                          </script>
                      </option>
                      <option>
                          <script language="javascript">
                            var today=new Date();
                            document.write(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+6));
                          </script>
                      </option>
                  </select>
                  
                  <br>
                  <i class="fas fa-clock fa-2x"></i>
                  &thinsp; 
                  <select name="time">
                      <option>請選擇場次</option>
                      <?php booking_main_inputTime(); ?>
                  </select>
                  <br>
                <div class="movie" >
                    <?php booking_main_inputTicket1(); ?>  
                    <?php booking_main_inputTicket2(); ?>
                    <?php booking_main_inputTicket3(); ?>
                    <?php booking_main_inputTicket4(); ?>
                </div>

                <input type="submit" name='submit' value="下一步">
            </form>
        
            </div>
            <div class="notice">
            <h1>訂票注意事項</h1>
            <h> 1.「團體優待票券/愛心票/敬老票」無法與「一般/銀行優惠/iShow會員票種」同時訂票，請分次訂購。
                <br>EX：要訂1張團體優待票券與1張全票。須於『團體優待票券/愛心票/敬老票』訂票系統先訂團體優待票券後，再使用『一般/銀行優惠/iShow會員票種.線上即時付款』訂票系統訂全票，唯兩筆訂票無法保證座位。
                <br>2.銀行優惠票種與iShow會員票種無法於同筆訂單中，請分次訂購，唯兩筆訂票無法保證座位。
                <br>3.銀行購票優惠即日起可於網路訂票系統進行預訂。網路預訂以電影播放日期為準，而非以刷卡日計算，每卡每日購買張數限制依影片類型、單日購票張數相關規定限制。
                <br>4.未滿２歲且不佔位之兒童無需購票可免費入場觀賞【普遍級】影片，每位兒童需由至少一位已購票之成人陪伴。
                <br>5.需佔位或２歲以上未滿１２歲之兒童；需購買優待票。
                <br>6.購票完成可至超商進行取票，若交易內含餐飲品項，須至購票影城臨櫃領取電影票與餐點。
                <br>7.網路訂票每張票需加收 NT$20 手續費。
                <br>8.片長 150分鐘(含)以上之電影需加價NT$10，每增加30分鐘需另再加價NT$10。
                <br>9.為維護顧客權益，惡意佔位或影響他人正常訂位使用者，威秀影城保有調整或取消訂位之權利。
            </h>
            </div>
    
            
        </body>
    </html>
