<?php
// Підключення до бази даних
$servername = "localhost";
$username_db = "Roman"; // Встановіть своє ім'я користувача
$password_db = "1111"; // Встановіть свій пароль
$dbname = "business_card"; // Встановіть свою базу даних

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

    // Підготовка та виконання запиту на вставку даних у базу даних
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        die("Error: " . $stmt->error);
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
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="menu.css">
    <style>
        .success-message, .error-message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #32CD32;
            color: #fff;
            border-radius: 8px;
            z-index: 999;
        }
        .error-message {
            background-color: #FF0000;
        }
    </style>
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
        <h2>Registration</h2>
        <form id="registrationForm" action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>


    <div id="successMessage" class="success-message">Registration successful</div>
    <div id="errorMessage" class="error-message">Registration failed</div>

    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('register.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
               
                document.getElementById("successMessage").style.display = "block";
               
                setTimeout(function() {
                    document.getElementById("successMessage").style.display = "none";
                }, 3000);
            })
            .catch(error => {
               
                document.getElementById("errorMessage").style.display = "block";
                
                setTimeout(function() {
                    document.getElementById("errorMessage").style.display = "none";
                }, 3000);
                console.error('There has been a problem with your fetch operation:', error);
            });
        });
    </script>
    
    <footer>
        <p>WEB2324</p>
    </footer>
</body>
</html>
