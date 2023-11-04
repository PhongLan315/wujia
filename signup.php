<?php 
  include("connection.php");
  if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    
    if($password == $cpassword) {             
      // Password Hashing is used here. 
      $sql = "INSERT INTO user(username, email, password) VALUES('$username', '$email','$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo  
        '<script>
            alert("Đăng ký thành công")
        </script>';
          header("Location: login.php");
      }
  } 
  else { 
      $em = "Full name is required";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
      /*echo  
      '<script>
          alert("Passwords do not match")
      </script>';*/
  }      

  /*$sql = "Select * from user where username='$username'";
  $result = mysqli_query($conn, $sql);        
  $count_user = mysqli_num_rows($result);  

  $sql = "Select * from user where email='$email'";
  $result = mysqli_query($conn, $sql);        
  $count_email = mysqli_num_rows($result);  
  
  if($count_user == 0 && $count_email == 0){   
      if($password == $cpassword) {
          $hash = password_hash($password, PASSWORD_DEFAULT);               
          // Password Hashing is used here. 
          $sql = "INSERT INTO user(username, email, password) VALUES('$username', '$email','$hash')";
          $result = mysqli_query($conn, $sql);
          if ($result) {
              header("Location: login.php");
          }
      } 
      else { 
          echo  
          '<script>
              alert("Passwords do not match")
          </script>';
      }      
  }  
  else{  
    if($count_user>0){
        echo  
        '<script>                       
          alert("Username already exists!!")
        </script>';
    }
    if($count_email>0){
        echo  
        '<script>                     
          alert("Email already exists!!")
        </script>';
    }
    }*/
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="database.css">
  </head>
  <body>
      <div class="signup">
        <div class="signup__container">
          <h1>Đăng Ký</h1>
          <form name="form" method="POST">
            <h5>Username</h5>
            <input type="user" class="input-signup-email" name="username" placeholder="Enter Username" required/>
            <h5>Email</h5>
            <input type="email" class="input-signup-username" name="email" placeholder="Enter Email" required/>
            <h5>Password</h5>
            <input type="password" class="input-signup-password" name="password" placeholder="Enter Password" required/>
            <h5>Confirm Password</h5>
            <input type="password" class="input-signup-password" name="cpassword" placeholder="Enter Password" required/>
            <button type="submit" class="signup__signInButton" value="SignUp" name="submit">Đăng Ký</button>
          </form>
          <a href="./login.php" class="signup__registerButton" name="login">Bạn đã có tài khoản? Đăng nhập ngay</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>