<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <style>
    html{
               background-color: #2A1541;
               font-family: serif; 
               background-image: url("https://i.pinimg.com/originals/08/c1/aa/08c1aab1bfc9302350967bcdcfe755fa.jpg");
               background-repeat: no-repeat;
                background-size: cover;
    }
    h2{
        margin:auto;
        margin-top:300px;
        background-color: #E8EEEB;
        border-radius:30px;
        color:red;
        width:430px;
        padding-left:50px;
        padding-top:25px;
        padding-bottom:25px;
    }
    </style>
</head>
<body>
<?php
$username = "Fatima";
$password = "Hello^_^World";

if(($_POST["username1"] != $username) || ($_POST["password1"] != $password)){
    echo "<h2> !! Wrong Password or User not found !!</h2>";
}
else{
    echo "<h2>Welcome $username!</h2>";
}
?>
</body>
</html>