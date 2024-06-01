<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start(); // Запускаем сессию

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
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($login) || empty($password)) {
    die("Ошибка: Все поля должны быть заполнены.");
}

// Проверяем существование пользователя
$sql = $conn->prepare("SELECT idUsers, passwordUsers FROM users WHERE loginUsers = ?");
$sql->bind_param("s", $login);
$sql->execute();
$sql->store_result();

// Если пользователь найден
if ($sql->num_rows > 0) {
    $sql->bind_result($idUsers, $hashed_password);
    $sql->fetch();

    // Проверяем пароль
    if (password_verify($password, $hashed_password)) {
        $_SESSION['login'] = $login;

        header("Location: index.php");
        exit();
    } else {
        die("Ошибка: Неверный пароль.");
    }
} else {
    die("Ошибка: Пользователь не найден.");
}

$sql->close();
$conn->close();
?>
