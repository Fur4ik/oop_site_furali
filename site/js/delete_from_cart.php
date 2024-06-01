<?php
session_start();

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

$data = json_decode(file_get_contents('php://input'), true);
$idProd = $data['idProd'] ?? null;

if (!$idProd) {
    echo json_encode(['success' => false, 'message' => 'Неверные данные']);
    exit;
}

$userLogin = $_SESSION['login'];
$sql = $conn->prepare("SELECT idUsers FROM users WHERE loginUsers = ?");
$sql->bind_param("s", $userLogin);
$sql->execute();
$sql->bind_result($userId);
$sql->fetch();
$sql->close();

if (!$userId) {
    echo json_encode(['success' => false, 'message' => 'Пользователь не найден']);
    exit;
}

$userTable = $userId . "Cart";
$sql = $conn->prepare("DELETE FROM `$userTable` WHERE idProd = ?");
$sql->bind_param("i", $idProd);

if ($sql->execute()) {
    echo json_encode(['success' => true, 'message' => 'Товар удален из корзины']);
} else {
    echo json_encode(['success' => false, 'message' => 'Ошибка удаления товара из корзины']);
}

$sql->close();
$conn->close();
?>