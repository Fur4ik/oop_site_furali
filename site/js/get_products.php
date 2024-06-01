<?php
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

// SQL запрос для получения данных
$sql = "SELECT idProducts, articleProducts, nameProducts, descriptionProducts, priceProducts, imageProducts, tocartProducts FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    // Вывод данных каждой строки
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

// Преобразуем данные в формат JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
