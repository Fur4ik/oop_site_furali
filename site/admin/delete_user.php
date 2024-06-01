<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost:3306";
$username = "root";
$password = "furali2024";
$dbname = "site";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
}

$id = intval($_GET['id']);

if ($id > 0) {
    // Удаляем пользователя
    $sql = "DELETE FROM users WHERE idUsers = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Пользователь успешно удален.";

        // Проверяем, пуста ли таблица
        $result = $conn->query("SELECT COUNT(*) AS count FROM users");
        $row = $result->fetch_assoc();

        if ($row['count'] == 0) {
            // Сбрасываем автоинкрементное значение
            if ($conn->query("ALTER TABLE users AUTO_INCREMENT = 1") === TRUE) {
                echo " Автоинкрементное значение сброшено.";
            } else {
                echo "Ошибка при сбросе автоинкрементного значения: " . $conn->error;
            }
        }
    } else {
        echo "Ошибка при удалении пользователя: " . $stmt->error;
    }

    // Получаем имя таблицы для удаления
    $tableToDelete = $id . "Cart";

    // Формируем SQL-запрос для удаления таблицы
    $deleteTableSql = "DROP TABLE IF EXISTS $tableToDelete";

    // Выполняем SQL-запрос
    if ($conn->query($deleteTableSql) === TRUE) {
        echo "Таблица успешно удалена.";
    } else {
        echo "Ошибка при удалении таблицы: " . $conn->error;
    }


    $stmt->close();
} else {
    echo "Неверный ID пользователя.";
}

$conn->close();
?>
