<?php
// Настройки подключения к базе данных

$host = 'localhost'; 
$user = 'root';      
$password = 'root';      
$database = 'carwash_db';

// Создание объекта подключения к базе данных MySQLi

$conn = new mysqli($host, $user, $password, $database);

// Проверка, удалось ли подключение

if ($conn->connect_error) {

    // Если подключение не удалось, вывод сообщения об ошибке и завершение скрипта

    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Функция для выполнения SQL-запросов с подготовленными выражениями

function execute($conn, $sql, $params = []) {

    // Подготовка SQL-запрос

    $stmt = $conn->prepare($sql);

    // Проверка, удалось ли подготовить запрос

    if (!$stmt) {
        die("Ошибка подготовки запроса: " . $conn->error);
    }

    if ($params) {
        $types = str_repeat('s', count($params)); 

        // Привязка параметров к запросу

        $stmt->bind_param($types, ...$params);
    }

    // Выполнение запроса

    if (!$stmt->execute()) {

         // Вывод ошибки SQL

         echo "Ошибка выполнения SQL: " . $stmt->error . "<br>";
          die("Ошибка выполнения запроса: " . $stmt->error);

    }
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}
// Функция для получения одной строки из результата запроса

function fetchRow($conn, $sql, $params = []) {
    $result = execute($conn, $sql, $params);
    return $result ? $result->fetch_assoc() : null;
}

// Функция для получения всех строк из результата запроса

function fetchAll($conn, $sql, $params = []) {
    $result = execute($conn, $sql, $params);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

?>