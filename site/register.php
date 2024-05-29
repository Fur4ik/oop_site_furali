<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost:3306";
$username = "root";
$password = "furali2024";
$dbname = "site";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из формы
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];

if (empty($login) || empty($email) || empty($password) || empty($repeat_password)) {
    die("Ошибка: Все поля должны быть заполнены.");
}

// Проверка совпадения паролей
if ($password !== $repeat_password) {
    die("Ошибка: Пароли не совпадают.");
}

// Хешируем пароль
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Проверяем уникальность логина
$sql = $conn->prepare("SELECT idUsers FROM users WHERE loginUsers = ?");
$sql->bind_param("s", $login);
$sql->execute();
$sql->store_result();
if ($sql->num_rows > 0) {
    die("Ошибка: Логин уже существует.");
}

// Проверяем уникальность email
$sql = $conn->prepare("SELECT idUsers FROM users WHERE emailUsers = ?");
$sql->bind_param("s", $email);
$sql->execute();
$sql->store_result();
if ($sql->num_rows > 0) {
    die("Ошибка: Email уже существует.");
}

// Вставляем данные в базу данных
$sql = $conn->prepare("INSERT INTO users (loginUsers, passwordUsers, emailUsers) VALUES (?, ?, ?)");
$sql->bind_param("sss", $login, $hashed_password, $email);
if ($sql->execute()) {
    echo "Регистрация прошла успешно!";
} else {
    echo "Ошибка: " . $sql->error;
}

$sql->close();
$conn->close();
?>
