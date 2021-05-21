<?php 
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['submit'])){
    exit("錯誤執行");
    }//判斷是否有submit操作
    $name=$_POST['name'];//post獲取表單裡的name
    $password=$_POST['password'];//post獲取表單裡的password
    include('connect.php');//連結資料庫
    $q="INSERT INTO user(Id_user,Name_user,Password) VALUES (null,'$name','$password')";//向資料庫插入表單傳來的值的sql
    $reslut=mysqli_query($conn,$q);//執行sql
    if (!$reslut){
    die('Error: ' . mysqli_error($conn));//如果sql執行失敗輸出錯誤
    }else
    {
        echo"
        <body style='background-color: cornflowerblue;'>
            <h1 style='text-align: center;'>註冊成功!畫面將跳至登入頁面</h1>
            <div style='display: flex;align-items: center;justify-content:center;'>
                <img src='pic/pic2.png' width='400px' height='400px' />
            </div>
            
        </body>";//成功輸出註冊成功
        echo "
        <script>
        setTimeout(function(){window.location.href='login.htm';},2000);
        </script>
        ";
    }
    mysqli_close($conn);//關閉資料庫
?>