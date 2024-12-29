<?php
session_start();
require_once 'bdconnect.php';

// Проверка на пустые поля

if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email'])) {
    die("Ошибка: Пожалуйста, заполните все поля.");
}

$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

// Хэширование пароля

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Проверка, существует ли пользователь с таким логином

$sql = "SELECT * FROM users WHERE login = ?";
$user = fetchRow($conn, $sql, [$login]);

if (!$user) {
    // Если пользователя нет, то он добавляется в БД

    $insertSQL = "INSERT INTO users (login, password, email) VALUES (?, ?, ?)";
    execute($conn, $insertSQL, [$login, $hashedPassword, $email]);
    $_SESSION['user'] = ['nick' => $login];

    // Перенаправление на index.php

    header("Location: index.php");
    exit;
} else {
    die("Ошибка: Данный логин занят другим пользователем.");
}

$conn->close();
?>