<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
    <h1>Добро пожаловать, пользователь!</h1>
    <?php
        session_start();
        if(isset($_SESSION['user'])){
            echo "<p>Вы вошли как ".$_SESSION['user']['nick']."</p>";
        }else{
           echo "<p>Вы не авторизованы</p>";
        }

    ?>
   
</body>
</html>