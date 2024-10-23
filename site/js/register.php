<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost:3306";
$username = "root";
$password = "furali2024";
$dbname = "site";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка соединения: ' . $conn->connect_error]);
    exit;
}

// Получаем данные из формы
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$repeat_password = $_POST['repeat_password'] ?? '';

// Проверка на пустые поля
if (empty($login) || empty($email) || empty($password) || empty($repeat_password)) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: Все поля должны быть заполнены.']);
    exit;
}

// Проверка формата email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: Неверный формат email.']);
    exit;
}

// Проверка логина (не менее 5 символов латиницы)
if (strlen($login)<5) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: Логин должен содержать не менее 5 символов.']);
    exit;
}

// Проверка пароля (не менее 6 символов)
if (strlen($password) < 6) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: Пароль должен содержать не менее 6 символов.']);
    exit;
}

// Проверка совпадения паролей
if ($password !== $repeat_password) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: Пароли не совпадают.']);
    exit;
}

// Хешируем пароль
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Проверяем уникальность логина
$sql = $conn->prepare("SELECT idUsers FROM users WHERE loginUsers = ?");
$sql->bind_param("s", $login);
$sql->execute();
$sql->store_result();
if ($sql->num_rows > 0) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: Логин уже существует.']);
    exit;
}

// Проверяем уникальность email
$sql = $conn->prepare("SELECT idUsers FROM users WHERE emailUsers = ?");
$sql->bind_param("s", $email);
$sql->execute();
$sql->store_result();
if ($sql->num_rows > 0) {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: Email уже существует.']);
    exit;
}

// Вставляем данные в базу данных
$sql = $conn->prepare("INSERT INTO users (loginUsers, passwordUsers, emailUsers) VALUES (?, ?, ?)");
$sql->bind_param("sss", $login, $hashed_password, $email);
if ($sql->execute()) {
    $newUserId = $conn->insert_id;
    $newTableName = $newUserId . "Cart";
    $createTableSql = "CREATE TABLE $newTableName(
        idProd INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        articleProd VARCHAR(100) NOT NULL,
        countProd INT(6) NOT NULL
    )";

    if ($conn->query($createTableSql) === TRUE) {
        echo json_encode(['type' => 'success', 'message' => 'Регистрация прошла успешно.']);
    } else {
        echo json_encode(['type' => 'error', 'message' => 'Ошибка при попытке регистрации: ' . $conn->error]);
    }
} else {
    echo json_encode(['type' => 'error', 'message' => 'Ошибка: ' . $sql->error]);
}

$sql->close();
$conn->close();
?>
