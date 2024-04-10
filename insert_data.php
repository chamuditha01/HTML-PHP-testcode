<?php
// Establish database connection
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$database = "randula";  // Your database name
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from form
    $role = $_POST["role"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $password = $_POST["password"]; // Note: In a real-world scenario, hash the password before storing it
    $phone_number = $_POST["phone_number"];

    // Prepare SQL statement
    $sql = "INSERT INTO users (role, first_name, last_name, username, password, phone_number) 
            VALUES ('$role', '$first_name', '$last_name', '$username', '$password', '$phone_number')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
