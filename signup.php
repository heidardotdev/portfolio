<?php

include 'config.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = random_id().'.'.$ext;
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'img/'.$rename;

    $select_user = $conn->prepare("SELECT * FROM `form` WHERE email = ?");
    $select_user->execute([$email]);

    if($select_user->rowCount() > 0){
        $error[] = "email already taken";
    }else{
        if($pass != $cpass){
            $error[] = "password not matched!!!!"; 
        }else{      
            $insert =  $conn->prepare("INSERT INTO `form` (unique_id, name, email, password, img) VALUES(?,?,?,?,?)");
            $insert->execute([$id, $name, $email, $pass, $rename]);
            move_uploaded_file($image_tmp_name, $image_folder);

            $verify_user = $conn->prepare("SELECT * FROM `form` WHERE email = ? AND password = ? LIMIT 1 ");
            $verify_user->execute([$email, $pass]);
            $fetch = $verify_user->fetch(PDO::FETCH_ASSOC);

            if($verify_user->rowCount() > 0){
                setcookie('user_id', $fetch["unique_id"], time() + 60*60*24*30, '/' );
                header("location: login.php");
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="./styles/app.css">
    <link rel="icon" type="image/png" href="./images/app-logo.png">

</head>

<body class="signup__body">
    <form class="signup__form" action="" method="post"  enctype="multipart/form-data"> 
        <h2 class="signup__title">create account</h2>
        <?php
            if(isset($error)){
                foreach($error as $error){

                  echo '<div class="error"> '.$error.' </div>';
                }
            }
        ?>
        
        <div class="signup__box">
            <div class="singup__left-side">
                <div class="wrapper">
                    <p class="wrapper__text">enter your name</p>
                    <input type="text" name="name" require>
                </div>
                <div class="wrapper">
                    <p class="wrapper__text">enter your password</p>
                    <input type="password" name="pass" require>
                </div>
            </div>
            <div class="singup__right-side">
                <div class="wrapper">
                    <p class="wrapper__text">enter your email</p>
                    <input type="email" name="email" require>
                </div>
                <div class="wrapper">
                    <div class="wrapper__password-box">
                        <p class="wrapper__text">repeat your password</p>
                        <input type="password" name="cpass" require>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper__file">
            <p class="wrapper__text">select your profile picture</p>
            <div class="wrapper__image-wrapper">
                <div class="wrapper__image__file-name">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 11V10.4444C21 10.0317 21 9.82536 20.9848 9.65138C20.8156 7.71759 19.2824 6.18441 17.3486 6.01522C17.1746 6 16.9683 6 16.5556 6H16.3333C16.1492 6 16 5.85076 16 5.66667V5.66667C16 4.19391 14.8061 3 13.3333 3H10.6667C9.19391 3 8 4.19391 8 5.66667V5.66667C8 5.85076 7.85076 6 7.66667 6H7.44444C7.03172 6 6.82536 6 6.65138 6.01522C4.71759 6.18441 3.18441 7.71759 3.01522 9.65138C3 9.82536 3 10.0317 3 10.4444V13.8C3 16.7998 3 18.2997 3.76393 19.3511C4.01065 19.6907 4.30928 19.9893 4.64886 20.2361C5.70032 21 7.20021 21 10.2 21H15C16.8638 21 17.7956 21 18.5307 20.6955C19.5108 20.2895 20.2895 19.5108 20.6955 18.5307C21 17.7956 21 16.8638 21 15V15M12 16V16C13.6569 16 15 14.6569 15 13V13C15 11.3431 13.6569 10 12 10V10C10.3431 10 9 11.3431 9 13V13C9 14.6569 10.3431 16 12 16Z" stroke="#292556" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        file name 
                </div>
                <input type="file" name="image" require>
            </div>
        </div>
        <p class="signup__question">already register? <a href="login.php">login now</a></p>
        <button type="submit" class="signup__btn" name='submit'>register now</button>
    </form>

</body>

</html>
