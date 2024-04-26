<?php

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WA. | SignIn</title>
    <link rel="icon" type="image/png" href="../images/app-logo.png">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary-color: #0ABEAD;

}

body {
    display: flex;
    justify-content: center;
    background-color: #222;
    align-items: center;
    overflow: hidden;
    height: 100vh;
    font-family: poppins;
    font-size: 62.5%;
}

h1.nav__logo {
    color: var(--primary-color);
    font-family: "Poppins Black";
    font-size: 6rem;
    margin: 0;
    justify-content: center;
    display: flex;
}
h2{
    font-size: 2.5rem;
    margin: -2rem auto 4rem auto;
    font-family: "Poppins Black";
    color: var(--primary-color);

}

form {
    display: flex;
    padding: 2rem 4rem 8rem 4rem;
    border-radius: 2rem;
    flex-direction: column;
    background-color: rgba(255, 255, 255, .1);
    border: 1px solid rgba(255, 255, 255, .3);
}

input {
    font-size: 2rem;
    color: var(--primary-color);
    padding: 1rem;
    border-radius: .5rem;
    outline: none;
    border: none;
}

label {
    margin-bottom: .5rem;
    font-size: 1.5rem;
    color: #fff;
    
}

#text {
    margin-bottom: 2rem;
}

a,.submit{
    text-decoration: none;
    color: #fff;
    font-size: 1.3rem;
    display: flex;
    justify-content: end;
    margin-top: 2rem;
    background:var(--primary-color);
    padding: 1rem 4rem;
    border-radius:.5rem;
    text-transform: capitalize;
    height:100%;

}
a:last-child{
    background-color: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}
a:last-child:hover{
    background-color: var(--primary-color);
    color: #fff;
}

div{
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
}

    </style>

</head>
<body>
    <form method="post" class="form">

        <h1 class="nav__logo">WA.</h1>    
        <h2 >SignUp</h2>    
        <label for="text">username</label>
        <input type="text" name="user_name" id="text" autocomplete="off"  autofocus>
        <label for="password">password</label>
        <input type="password" name="password" id="password" autocomplete="off" >
        <div>
            <input class="submit" type="submit" value="register">
            <a  href="login.php">login</a>
        </div>
    </form>
</body>
</html>