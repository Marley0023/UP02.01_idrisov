<?php
include('bd.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $date_birthday = $_POST['date_birthday'];
    $mail = $_POST['mail'];
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO registration (Фамилия, Имя, `Дата рождения`, Почта, Логин, Пароль) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $surname, $name, $date_birthday, $mail, $login, $password);

    if ($stmt->execute()) {
        echo "Регистрация прошла успешно!";
        header("Location: login.html");
        exit();
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
