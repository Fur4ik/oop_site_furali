<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Проверяем, что пользователь авторизован
if (!isset($_SESSION['login'])) {
    die(json_encode(['success' => false, 'message' => 'Пользователь не авторизован']));
}

$servername = "localhost:3306";
$username = "root";
$password = "furali2024";
$dbname = "site";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Ошибка соединения: ' . $conn->connect_error]));
}

// Получаем данные из запроса
$data = json_decode(file_get_contents('php://input'), true);
$articleProducts = $data['articleProducts'] ?? null;

// Проверяем, что все данные присутствуют
if ($articleProducts === null) {
    die(json_encode(['success' => false, 'message' => 'Неверные данные']));
}

// Получаем логин пользователя из сессии
$userLogin = $_SESSION['login'];

// Находим ID пользователя по его логину
$sql = $conn->prepare("SELECT idUsers FROM users WHERE loginUsers = ?");
$sql->bind_param("s", $userLogin);
$sql->execute();
$sql->bind_result($userId);
$sql->fetch();
$sql->close();

// Проверяем, что ID пользователя найден
if (!$userId) {
    die(json_encode(['success' => false, 'message' => 'Пользователь не найден']));
}

// Имя таблицы корзины пользователя
$userTable = $userId . "Cart";

// Проверяем, существует ли таблица корзины, и создаем ее при необходимости
$createTableSql = "CREATE TABLE IF NOT EXISTS `$userTable` (
    idProd INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    articleProd VARCHAR(100) NOT NULL,
    countProd INT(11) NOT NULL,
    UNIQUE KEY unique_article (articleProd)
)";
if (!$conn->query($createTableSql)) {
    die(json_encode(['success' => false, 'message' => 'Ошибка при создании таблицы корзины: ' . $conn->error]));
}

// Проверяем, существует ли продукт в корзине
$sql = $conn->prepare("SELECT countProd FROM `$userTable` WHERE articleProd = ?");
$sql->bind_param("s", $articleProducts);
$sql->execute();
$sql->bind_result($currentCount);
$sql->fetch();
$sql->close();

if ($currentCount !== null) {
    // Продукт уже существует, увеличиваем количество
    $newCount = $currentCount + 1;
    $sql = $conn->prepare("UPDATE `$userTable` SET countProd = ? WHERE articleProd = ?");
    $sql->bind_param("is", $newCount, $articleProducts);
} else {
    // Продукта нет, добавляем новую запись
    $count = 1; // Количество по умолчанию
    $sql = $conn->prepare("INSERT INTO `$userTable` (articleProd, countProd) VALUES (?, ?)");
    $sql->bind_param("si", $articleProducts, $count);
}

if ($sql->execute()) {
    // Получаем текущее количество товаров в корзине
    $sql = $conn->prepare("SELECT SUM(countProd) FROM `$userTable`");
    $sql->execute();
    $sql->bind_result($cartCount);
    $sql->fetch();
    $sql->close();

    // Обновляем количество товаров в сессии
    $_SESSION['cart_count'] = $cartCount;
    
    echo json_encode(['success' => true, 'message' => 'Товар добавлен в корзину', 'cart_count' => $_SESSION['cart_count']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Ошибка: ' . $sql->error]);
}

$conn->close();
?>
