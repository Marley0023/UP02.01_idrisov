<?php
$servername = "127.0.0.1"; // Адрес сервера
$username = "root"; // Имя пользователя базы данных
$password = "";
$dbname = "bd_enroxes"; // Имя базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
