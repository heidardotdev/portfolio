<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, image FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, so start a new session
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['image'] = $user['image']; // Store image name in session
        header("location: index.php"); // Redirect user to welcome page
    } else {
        echo "Invalid email or password";
    }
    $stmt->close();
    $conn->close();
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
