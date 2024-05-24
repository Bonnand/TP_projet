<?php 
session_start();
include("../bdd/config.inc.php");

if(isset($_POST["email_register"])){
    $email_register=QuoteStr($_POST["email_register"]);
    $password_register=hash('sha256',$_POST["password_register"]);
    $pseudo_register=QuoteStr($_POST["pseudo_register"]);

    $requet="INSERT INTO `account` (`Pseudo`, `Email`, `Password`) VALUES ($pseudo_register,$email_register,'$password_register')";
    ExecuteSQL($requet);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../stylesheet/register.css?1" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="global">
        <div class="title">
            <h1>Register</h1>
        </div>
        <form method="POST">
            <p>Pseudo</p>
            <input type="pseudo_register" name="pseudo_register">
            <p>Email</p>
            <input type="email_register" name="email_register">
            <p>Password</p>
            <input type="password_register" name="password_register">
            <br>
            <input type="submit" value="Send">
        </form>
        <div class="connection">
            <p>Comeback to authentification</p>
            <a href="authentification.php">Click here<a>
        </div>
    </div>
</body>
</html>
