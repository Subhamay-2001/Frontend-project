<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){

    $usernameemail=$_POST["usernameemail"];
    $password=$_POST["password"];
    $result=mysqli_query($conn, "SELECT * FROM  tb_user2 WHERE username='$usernameemail' OR email='$usernameemail'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
       if($password==$row["password"]){
         if($password == $row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            header("Location: index.php");
         }
       }
       else{
        echo
        "<script> alert ('wrong password');</script>";
       }
    }
    else{
        echo
        "<script> alert ('User not Registered');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <div class="student1">
        <div class="overlay">
            <div class="TitleDiv1">
                <h1 class="Title">Login</h1>
                <span class="SubTitle">Welcome</span>
            </div>
            <form class="" action="" method="POST" autocomplete="off">
                <div class="row_grid">
                    <div class="row">
                        <label for="usernameemail">Username or Email</label>
                        <input type="text" id="usernameemail" name="usernameemail" placeholder="Enter your Username or Email" required>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter you Password" required>
                        <button type="submit" name="submit">Login</button>
                        <div class="login">
                            <a href="registration.php">registration</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>