<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }
        input{
            display: block;
        }
    </style>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="username" placeholder="username" class="username">
        <input type="text" name="email" placeholder="email" class="email">
        <input type="password" placeholder="password" name="password">
        <input type="file" placeholder="select the image" name="image">
        <input type="button" value="signup">
        <input type="button" value="login">
    </form>
</body>
</html>