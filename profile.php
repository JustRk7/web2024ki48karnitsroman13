<?php
session_start();

// Підключення до бази даних
$servername = "localhost";
$username_db = "Roman"; 
$password_db = "1111"; 
$dbname = "business_card"; 

// Змінні для зберігання значень полів
$lastname = "";
$firstname = "";
$email = "";
$phone = "";

// Перевірка відправлення POST-запиту
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Отримання username з сесії
    $username = $_SESSION['username'];

    // Підключення до бази даних
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Перевірка з'єднання
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Оновлення даних профілю користувача
    $sql = "UPDATE profile SET lastname='$lastname', firstname='$firstname', email='$email', phone='$phone' WHERE username='$username'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    // Закриття з'єднання
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style_profile.css">
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <div class="image-preview">
            <img id="uploaded-image" src="#" alt="Uploaded Image" width="200" height="200">
        </div>
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo">
            <br>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" required value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>">
            <br>
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" required value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <br>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" required value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
            <br>
            <button type="submit">Save</button>
        </form>
        <form action="index.php">
            <button type="submit" class="logout-button">Log out</button>
        </form>
    </div>
   
    <footer>
        <p>WEB2324</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var fileInput = document.getElementById('photo');
            var uploadedImage = document.getElementById('uploaded-image');

            fileInput.addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>
