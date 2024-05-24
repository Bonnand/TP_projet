<?php 
session_start();
include("../bdd/config.inc.php");

if(isset($_POST["email"])){
    $email=QuoteStr($_POST["email"]);
    $password=hash('sha256',$_POST["password"]);

    $request_test="select * from `account` where Email=$email";

    if(GetSQL($request_test,$unused)){
        $request="UPDATE `account` SET `Password` = '$password' WHERE `Email` = $email";
        ExecuteSQL($request);
        $display= "<h2>Successfully completed</h2>";
    }
    else{
        $display= "<h2>Email doesnt exist</h2>";
    }
    
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../stylesheet/forgetPassword.css?1" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class=global>
        <div class="title">
            <h1>Change password</h1>
            <?php     if(isset($display)){echo $display;}; ?>
        </div>
        <form method="POST">
            <p>Email</p>
            <input type="email" name="email">
            <p>New password</p>
            <input type="password" name="password">
            <br>
            <input type="submit" value="Send">
        </form>
        <div class="changePassword">
            <p>Comeback to authentification</p>
            <a href="authentification.php">Click here<a>
        </div>
        
    </div>
</body>
</html>
