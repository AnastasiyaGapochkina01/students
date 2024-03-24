<?php
// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Данные для подключения к базе данных
    $host = 'localhost'; // Хост базы данных
    $username = 'php'; // Имя пользователя базы данных
    $password = 'phppasswd'; // Пароль базы данных
    $database = 'students'; // Имя базы данных

    // Подключение к базе данных
    $connection = mysqli_connect($host, $username, $password, $database);

    // Проверка на ошибку подключения
    if (!$connection) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    // Получение данных из формы
    $id = $_POST["id"];
    $uname = $_POST["uname"];
    $surname = $_POST["surname"];
    $avgscore = $_POST["avgscore"];

    // Подготовка SQL-запроса для добавления записи
    $insertQuery = "INSERT INTO classone (id, uname, surname, avgscore) VALUES ('$id', '$uname', '$surname', '$avgscore')";

    // Выполнение запроса
    if (mysqli_query($connection, $insertQuery)) {
	    echo "<p>Новая запись успешно добавлена в таблицу.</p>";
	    echo '<a href="view_records.php">View all records</a>';

    } else {
        echo "Ошибка при добавлении записи: " . mysqli_error($connection);
    }

    // Закрытие соединения с базой данных
    mysqli_close($connection);
} else {
    // Если форма не была отправлена, перенаправьте пользователя на страницу с формой
    header("Location: index.html");
    exit;
}
?>
