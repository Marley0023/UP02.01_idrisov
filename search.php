<?php
include('bd.php'); 

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM books WHERE `Фамилия автора` LIKE ? OR `Название произведения` LIKE ?");
    $search_param = "%" . $search . "%";
    $stmt->bind_param("ss", $search_param, $search_param);
    $stmt->execute();

    $result = $stmt->get_result();

    echo '<link rel="stylesheet" href="styles.css">';
    echo '<div class="form-container">';
    echo '<h2>Результаты поиска:</h2>';
    if ($result->num_rows > 0) {
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li><strong>' . htmlspecialchars($row['Название произведения']) . '</strong> - Автор: ' . htmlspecialchars($row['Фамилия автора']) . ' - Жанр: ' . htmlspecialchars($row['Жанр']) . ' - Год издания: ' . htmlspecialchars($row['Год издания']) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Книги не найдены.</p>';
    }
    echo '</div>';

    $stmt->close();
    $conn->close();
}
?>

