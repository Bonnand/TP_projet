<?php 
session_start();

include("../bdd/config.inc.php");

//Test to disconnect the user
if(isset($_POST["disconnected"])){
    $_SESSION["connected"]=false;
}

//Saving user's informations
if(isset($_POST["email"])){
    $email=QuoteStr($_POST["email"]);
    $password_user=hash('sha256',$_POST["password"]);
    
    $request="select * from `account` where Email=$email";

    if(GetSQL($request,$account)){

        $length_table=GetSQL($request,$account);
    
        $password_bdd=$account[0][2];
        $pseudo=$account[0][0];
    
        if (hash_equals($password_user,$password_bdd)) {
            $_SESSION["email_user"]=$email;
            $_SESSION["pseudo_user"]=$pseudo;
            $_SESSION["connected"]=true;
            header("Location: grid.php");    
        }
        else{
            $display="<h2>Wrong password</h2>";
        }

    }
    else{
        $display='<h2>Email doesnt exist</h2>';
    }
      
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../stylesheet/authentification.css?1" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
        <div class="global">
            <div class="title">
                <h1>Authentification</h1>
                <?php     if(isset($display)){echo $display;}; ?>
            </div>
            <form method="POST">
                <p>Email</p>
                <input type="email" name="email">
                <p>Password</p>
                <input type="password" name="password">
                <br>
                <input type="submit" value="Send">
            </form>
            <div class="register">
                <p>You forgot your password ?</p>
                <a href="forgetPassword.php">Click here</a>
                <p>You don't have an account ?</p>
                <a href="register.php">Click here</a>
            </div>
        </div>
</body>
</html>

