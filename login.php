<?php
 include 'config.php';

 if(isset($_COOKIE['user_id'])){
     $user_id = $_COOKIE['user_id'];
 }else{
     $user_id = '';
 }
 if(isset($_POST['submit'])){
     $email = $_POST['email'];
     $email = fileter_var($email, FILTER_SANITEZ_STRING);
     $pass = sha1($_POST['pass']);
     $pass = fileter_var($pass, FILTER_SANITEZ_STRING);
     
     $verify_user = $conn->prepare("SELECT * FROM `form` WHERE email = ? AND password = ? LIMIT 1 ");
     $verify_user->execute([$email, $pass]);
     $fecth = $verify_user->$fecth(PDO::FETCH_ASSOC);
     
     if($verify_user->rowCount() > 0){
        setcookie('user_id', $fecth["unique_id"], time() + 60*60*24*30, '/' );
        header(' location: index.php?id='.$fecth["unique_id"].' ');
    }else{
        $error[] = "incorrect password or email";

    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./styles/app.css">
    <link rel="icon" type="image/png" href="./images/app-logo.png">

</head>
<body class="login__body">
    <form action="" method="post" class="login__form">
        <h1 class="login__title">login in the account</h1>
        <?php
            if(isset($error)){
                foreach($error as $error){

                  echo '<div class="error"> '.$error.' </div>';
                }
            }
        ?>
        <div class="wrapper">
            <p class="wrapper__text">your email</p>
            <input type="email" name="email" require>
        </div>
        <div class="wrapper">
            <p class="wrapper__text">your password</p>
            <input type="password" name="password" require>
        </div>
        <p class="login__question">not yet registered?<a href="signup.php">register now</a></p>
        <button type="submit" class="login__btn">login now</button>
    </form>
</body>
</html>
