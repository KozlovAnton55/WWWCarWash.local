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

// Получение пользователя из базы данных

$sql = "SELECT * FROM users WHERE login = ?";
$user = fetchRow($conn, $sql, [$login]);

// Проверка, найден ли пользователь

if ($user) {

    // Проверка email

    if ($email !== $user['email']){
        die("Ошибка: Неверный email.");
    }

    // Проверка пароля

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = ['nick' => $login];

        // Перенаправление на index.php

        header("Location: index.php");
        exit;
    } else {
        die("Ошибка: Неверный пароль.");
    }
} else {
    die("Ошибка: Пользователь с таким логином не найден.");
}

$conn->close();
?>