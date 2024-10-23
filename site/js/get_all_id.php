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
$sql = $conn->prepare("SELECT idProd FROM `$userTable`");
$sql->execute();
$sql->bind_result($idProd);

$idProds = array();
while ($sql->fetch()) {
    $idProds[] = $idProd;
}

echo json_encode(['success' => true, 'idProds' => $idProds]);

$sql->close();
$conn->close();
?>
