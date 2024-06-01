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

// SQL запрос для получения данных из таблицы корзины и таблицы продуктов
$sql = "
    SELECT cart.idProd, cart.articleProd, cart.countProd, products.imageProducts, products.priceProducts,
    products.nameProducts 
    FROM `{$userTable}` AS cart 
    JOIN products ON cart.articleProd = products.articleProducts
";

$result = $conn->query($sql);

$cartprod = [];

if ($result->num_rows > 0) {
    // Вывод данных каждой строки
    while($row = $result->fetch_assoc()) {
        $cartprod[] = $row;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Корзина пуста']);
    exit;
}

$conn->close();

// Преобразуем данные в формат JSON
header('Content-Type: application/json');
echo json_encode(['success' => true, 'data' => $cartprod]);
?>
