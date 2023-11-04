<?php 
    include("connection.php");
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from user where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count >= 1){ 
            echo  
            '<script>
                alert("Đăng nhập thành công");
            </script>'; 
            header("Location: welcome.php");
        }  
        else{  
            echo  
            '<script>
                window.location.href = "login.php";
                alert("Login failed. Invalid username or password!!")
            </script>';
        }     
    }
?>    
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="database.css">
    </head>
    <body>
        <div class="login">
          <div class="login__container">
              <h1>Đăng Nhập</h1>
              <form name="form" onsubmit="return isvalid()" method="POST">
                <h5>Email</h5>
                <input type="text" class="input-login-username" name="username" required/>
                <h5>Password</h5>
                <input type="password" class="input-login-password" name="password" required/>
                <button type="submit" class="login__signInButton" name="submit">Đăng Nhập</button>
              </form>
              <a href="./signup.php" class="login__registerButton" name="signup">Tạo tài khoản mới</a>
          </div>
      </div>
        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>
    </body>
</html>