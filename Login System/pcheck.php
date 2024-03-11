<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

// Open a new connection to MySQL Server
$mysqli = new mysqli("localhost", "root", "", "Members");

// Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

// Use prepared statement to prevent SQL injection
$query = "SELECT * FROM Members WHERE email = ?"; 
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Verify password using password_verify function
    if(password_verify($password, $row["password"])) {
        $_SESSION["login"] = $row["id"];
        $_SESSION["name"] = $row['name'];
        $_SESSION['email'] = $row['email'];
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}

$stmt->close();
$mysqli->close();
?>
