   

<?php

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page </title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *::after,
        *::before {
            box-sizing: inherit;
            margin: 0;
            padding: 0;
        }

        button {
            border: none;
            outline: none;
        }



        .profile {
            background-image: url(../images/about-us-man.jpg);
            overflow: hidden;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 10rem;
            height: 10rem;
            border-radius: 100%;
            margin: 0 auto;
        }

        .text {
            color: blue;
            font-size: 2rem;
            font-weight: bolder;
        }

        .username {
            color: #ffc400;
            font-size: 2rem;
            text-transform: capitalize;
        }

        .logout {
            background-color: #490000;
            padding: 1.5rem 3rem;
            color: white;
            font-weight: bolder;
            font-size: 1.3rem;
            transition: all 250ms ease-out;

        }

        .logout:hover {
            background-color: #c90000;
            cursor: pointer;
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    <div class="profile"></div>
    <p class="text">hello<span class="username">&nbsp;username&nbsp;</span>welcome to your page</p>
    <button class="logout">logout</button>
</body>

</html>