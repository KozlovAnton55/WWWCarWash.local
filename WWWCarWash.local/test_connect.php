<?php

    require_once 'bdconnect.php'; 

    $user = fetchRow($conn, "SELECT * FROM users");

    if ($user) {
    echo "Подключение к базе данных успешно!<br><br>";
    echo "Первый пользователь в таблице users:<br>";
    echo "ID: " . $user['id'] . "<br>";
    echo "Логин: " . $user['login'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";

    } else {
        echo "Подключение к базе данных успешно, но таблица users пуста<br>";
    }
    $conn->close();
    ?>