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
$countProd = $data['countProd'] ?? null;

if (!$idProd || !$countProd) {
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
$sql = $conn->prepare("UPDATE `$userTable` SET countProd = ? WHERE idProd = ?");
$sql->bind_param("ii", $countProd, $idProd);

if ($sql->execute()) {
    echo json_encode(['success' => true, 'message' => 'Количество обновлено']);
} else {
    echo json_encode(['success' => false, 'message' => 'Ошибка обновления корзины']);
}

$sql->close();
$conn->close();
?>