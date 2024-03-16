<?php
// Підключення до бази даних
$servername = "localhost";
$username_db = "Roman"; // Встановіть своє ім'я користувача
$password_db = "1111"; // Встановіть свій пароль
$dbname = "business_card"; // Встановіть свою базу даних

// Перевірка відправлення POST-запиту
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Підключення до бази даних
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Перевірка з'єднання
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Оновлення даних профілю користувача
    $sql = "UPDATE users SET lastname='$lastname', firstname='$firstname', email='$email', phone='$phone' WHERE username='$username'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    // Закриття з'єднання
    $conn->close();
}
?>
