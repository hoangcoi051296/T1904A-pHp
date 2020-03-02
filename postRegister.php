<?php
session_start();
$email=$_POST["email"];
$password= $_POST["password"];
$confirmPassword =$_POST["confirmPassword"];

//server info
$servername = "localhost";
$serverUser="root";
$severPassword="";
$database = "c2h5oh";

//connect database
$conn = new mysqli($servername, $serverUser, $serverPassword, $database);
//check connection
if ($conn->connect_error) {
    die("Connection False");
}
//echo "Connect successfully";
//Query spl

if($password==$confirmPassword){
    $sql = "INSERT INTO users (email, password) VALUES ('{$_POST['email']}', '{$_POST['password']}') ";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"]=[
            'message'=>"Create account successfully",
            'type'=>'success'
        ];
        header("Location: function/views/login.php");
    } else {
        $_SESSION["message"]=[
            'message'=>$conn->error,
            'type'=>'error'
        ];

        header("Location: function/views/Create-account.php");
    }
}else{
    $_SESSION["message"]=[
        'message'=>"Password and Confirm password do not match",
        'type'=>'error'
    ];
    header("Location: function/views/Create-account.php");
}
$conn->close();