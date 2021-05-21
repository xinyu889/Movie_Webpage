<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
    exit("錯誤執行");
    }//檢測是否有submit操作 
    include('connect.php');//連結資料庫
    $name = $_POST['name'];//post獲得使用者名稱錶單值
    $passowrd = $_POST['password'];//post獲得使用者密碼單值
    if ($name && $passowrd){//如果使用者名稱和密碼都不為空
    $sql = "SELECT * from user where Name_user = '$name' and Password='$passowrd'";//檢測資料庫是否有對應的username和password的sql
    $result = mysqli_query($conn,$sql);//執行sql
    $user = mysqli_fetch_assoc($result);
    $rows=mysqli_num_rows($result);//返回一個數值
    if($rows){//0 false 1 true
    session_start();
    $_SESSION['user'] = $user['Name_user'];//name
    $_SESSION['password'] = $user['Password'];
    header("Location: welcome.php");//如果成功跳轉至welcome.php頁面
    exit;
    }else{
    echo "使用者名稱或密碼錯誤";
    echo "
    <script>
    setTimeout(function(){window.location.href='login.htm';},1000);
    </script>
    ";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
    }
    }else{//如果使用者名稱或密碼有空
    echo "表單填寫不完整";
    echo "
    <script>
    setTimeout(function(){window.location.href='login.htm';},1000);
    </script>";
    //如果錯誤使用js 1秒後跳轉到登入頁面重試;
    }
    mysqli_close($conn);//關閉資料庫
?>