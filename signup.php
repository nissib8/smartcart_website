<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = "";     // Replace with your DB password
$dbname = "user_authentication";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Check if email already exists in the database
    $emailCheckSql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($emailCheckSql);

    if ($result->num_rows > 0) {
        // If the email exists, show an alert and stop the signup
        echo "<script>alert('Email already exists!');</script>";
        exit();
    }

    // Validate if passwords match
    if ($password !== $confirmPassword) {
        // If passwords don't match, show an alert and stop the signup
        echo "<script>alert('Passwords do not match!');</script>";
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        // After successful signup, redirect to indexlog.php
        echo "<script>window.location.href='http://localhost/miniproject/indexlog.html';</script>";
    } else {
        // If there is an error inserting data
        echo "<script>alert('Error: Unable to sign up. Please try again later.');</script>";
    }
}

// Close the database connection
$conn->close();
?>
