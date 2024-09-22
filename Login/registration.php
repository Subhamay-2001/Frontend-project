<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){

$name=$_POST["name"];
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$confirmpassword=$_POST["confirmpassword"];
$duplicate=mysqli_query($conn, "SELECT * FROM  tb_user2 WHERE username='$username' or email='$email'");
if(mysqli_num_rows($duplicate)>0){
    echo "<script> alert ('username and email has already taken'); </script>";
}

else{
    if($password == $confirmpassword){
    $query="INSERT INTO  tb_user2 VALUES('','$name','$username','$email','$password')";
    mysqli_query($conn,$query);
    echo
    "<script> alert ('Registration Successfully');</script>";
    }

    else{ 

        echo
        "<script> alert ('Password Does not match');</script>";
    }
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
    <div class="student">
        <div class="overlay">
            <div class="TitleDiv">
        <h1 class="Title">Student Registration</h1>
        <span class="SubTitle">Welcome Sudent</span>
            </div>
            <div class="row_grid">
                <div class="rows">
                    <form class="" action="" method="POST" autocomplete="off">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your name" required>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Enter your user Name" required>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email" required>
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" placeholder="Enter your password" required>
                        <label for="confirmpassword">Confirm_password</label>
                        <input type="text" name="confirmpassword" id="confirmpassword" placeholder="Enter your Confirm_password" required >
                        <button type="submit" name="submit">Regiser</button>
                        <div class="login">
                            <a href="login.php">login</a>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>