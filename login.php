<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/styles/index.css">
    <title>Login Page</title>
</head>

<body>
    <div>
        <div>
            <a style="color:white;" href="./index.php">Древо</a>
        </div>
        <div>
            <a style="color:white;" href="./registration.php">Регистрация</a>
        </div>
    </div>
    <form action="./services/validate.php" method="post">
        <div>
            <h1>Логин</h1>

            <div>
                <input type="text" placeholder="Adminname" name="adminname" value="">
            </div>

            <div>
                <input type="password" placeholder="Password" name="password" value="">
            </div>

            <input class="button" name="login" type="submit"" value=" Вход" />
        </div>
    </form>
</body>

</html>