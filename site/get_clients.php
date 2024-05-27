<?php
$servername = "localhost";
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
$sql = "SELECT id, firstname, lastname, email FROM clients";
$result = $conn->query($sql);

$clients = [];

if ($result->num_rows > 0) {
    // Вывод данных каждой строки
    while($row = $result->fetch_assoc()) {
        $clients[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

// Преобразуем данные в формат JSON
echo json_encode($clients);
?>
