<?php
$servername = "localhost";
$username = "Roman";
$password = "1111";
$dbname = "business_card";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contacts LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Name: " . $row["name"] . "</p>";
        echo "<p>Position: " . $row["position"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Phone: " . $row["phone"] . "</p>";
    }
} else {
    echo "No contacts found";
}

$conn->close();
?>
