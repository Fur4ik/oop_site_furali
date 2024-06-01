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

// Проверяем, что пользователь авторизован
if (isset($_SESSION['login'])) {
    // Получаем логин пользователя из сессии
    $userLogin = $_SESSION['login'];

    // Находим ID пользователя по его логину
    $sql = $conn->prepare("SELECT idUsers FROM users WHERE loginUsers = ?");
    $sql->bind_param("s", $userLogin);
    $sql->execute();
    $sql->bind_result($userId);
    $sql->fetch();
    $sql->close();

    if ($userId) {
        // Имя таблицы корзины пользователя
        $userTable = $userId . "Cart";

        // Получаем текущее количество товаров в корзине
        $sql = $conn->prepare("SELECT SUM(countProd) FROM `$userTable`");
        $sql->execute();
        $sql->bind_result($cartCount);
        $sql->fetch();
        $sql->close();

        // Получаем общую сумму корзины
        $sql = $conn->prepare("SELECT SUM(cart.countProd * products.priceProducts)
        FROM `$userTable` AS cart 
        JOIN products ON cart.articleProd = products.articleProducts");
        $sql->execute();
        $sql->bind_result($cartProdSumm);
        $sql->fetch();
        $sql->close();
        

        // Получаем общую сумму корзины
        $sql = $conn->prepare("SELECT SUM(cart.countProd * phoneprod.pricePhoneprod)
        FROM `$userTable` AS cart 
        JOIN phoneprod ON cart.articleProd = phoneprod.articlePhoneprod");
        $sql->execute();
        $sql->bind_result($cartPhoneSumm);
        $sql->fetch();
        $sql->close();

        $cartSumm=$cartProdSumm+$cartPhoneSumm;

        // Обновляем количество товаров в сессии
        $_SESSION['cart_count'] = $cartCount ? $cartCount : 0;
        $_SESSION['cart_summ'] = $cartSumm ? $cartSumm : 0;


        // Возвращаем данные в формате JSON
        echo json_encode([
            'success' => true,
            'cart_count' => $_SESSION['cart_count'],
            'cart_summ' => $_SESSION['cart_summ']
        ]);
    }
}

$conn->close();
?>
