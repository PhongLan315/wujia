<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db";  
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "";
    //Login
    /*if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from user where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: welcome.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "login.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    //Register
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        
        $sql = "Select * from user where username='$username'";
        $result = mysqli_query($conn, $sql);        
        $count_user = mysqli_num_rows($result);  

        $sql = "Select * from user where email='$email'";
        $result = mysqli_query($conn, $sql);        
        $count_email = mysqli_num_rows($result);  
        
        if($count_user == 0 && $count_email==0){          
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
        }     
    }
    //Create
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $q = " INSERT INTO `crud`(`name`, `email`, `phone`) VALUES ( '$name', '$email', '$phone' )";
        $query = mysqli_query($conn,$q);
    }
    //Edit
    include "connection.php";
    $id="";
    $name="";
    $email="";
    $phone="";

    $error="";
    $success="";

    if($_SERVER["REQUEST_METHOD"]=='GET'){
        if(!isset($_GET['id'])){
            header("location: welcome.php");
            exit;
        }
        $id = $_GET['id'];
        $sql = "select * from crud where id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        while(!$row){
            header("location: welcome.php");
            exit;
        }
        $name=$row["name"];
        $email=$row["email"];
        $phone=$row["phone"];

    }
    else{
        $id = $_POST["id"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];

        $sql = "update crud set name='$name', email='$email', phone='$phone' where id='$id'";
        $result = $conn->query($sql);  
    }
    //Delete
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `crud` where id=$id";
        $conn->query($sql);
    }
    header("Location: welcome.php");
    exit;*/
?>