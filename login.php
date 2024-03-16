<?php
// Підключення до бази даних
$servername = "localhost";
$username_db = "Roman"; 
$password_db = "1111"; 
$dbname = "business_card"; 

// Перевірка відправлення POST-запиту
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Підключення до бази даних
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Перевірка з'єднання
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Підготовка та виконання запиту на перевірку користувача в базі даних
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Якщо користувач існує, перенаправлення на сторінку index.php
        header("Location: profile.php");
        exit();
    } else {
        // Якщо користувач не існує, виведення повідомлення про помилку через спливаюче вікно
        echo "<script>alert('Invalid username or password.'); window.location='login.php';</script>";
    }

    // Закриття з'єднання
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="menu.css">
   
</head>
<body>
    <nav class="navbar">
        <ul class="menu">
            <li><a href="index.php">My Card</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="university.php">University</a></li>
            <li><a href="login.php">Log in</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account yet? <a href="register.php">Register here</a>.</p>
    </div>
     
      <footer>
        <p>WEB2324</p>
    </footer>
</body>
</html>
