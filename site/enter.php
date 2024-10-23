<?php
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "furali2024";
$dbname = "site";

// Включаем вывод ошибок для отладки
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Ошибка: Не удалось подключиться к базе данных.'
    ]);
    exit();
}

// Получаем данные из формы
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($login) || empty($password)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Ошибка: Все поля должны быть заполнены.'
    ]);
    exit();
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
        echo json_encode([
            'status' => 'success',
            'message' => 'Успешный вход.'
        ]);
        exit();
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Ошибка: Неверный пароль.'
        ]);
        exit();
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Ошибка: Пользователь не найден.'
    ]);
}

$sql->close();
$conn->close();
?>
