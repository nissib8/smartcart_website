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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Start a session and redirect to the welcome page
            session_start();
            $_SESSION['users'] = $email;
            header("Location: welcome.php");
            exit();
        } else {
            echo "<script>alert('Wrong password!'); window.location.href='http://localhost/miniproject/index.php';</script>";
        }
    } else {
        echo "<script>alert('Email ID does not exist!'); window.location.href='http://localhost/miniproject/indexlog.html';</script>";
    }
}

// Close the database connection
$conn->close();
?>
