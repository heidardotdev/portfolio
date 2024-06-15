<?php

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
    <form  method="post" class="login__form">
        <h1 class="login__title">login in the account</h1>

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
