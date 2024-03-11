<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "Hackthon");
if ($mysqli->connect_error) {
    die("Error:" . $mysqli->connect_error);
}

$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
$sports = mysqli_real_escape_string($mysqli, $_POST['sports']);
$location = mysqli_real_escape_string($mysqli, $_POST['location']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);

// VALIDATION
if (strlen($name) < 2) {
    echo 'Name is too short';
} elseif (strlen($email) < 5) {
    echo 'Email is too short';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid Email';
} else {
    // HASH PASSWORD
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "SELECT * FROM Members where email='$email'";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    $num_row = mysqli_num_rows($result);

    if ($num_row < 1) {
        $insert_row = $mysqli->query("INSERT INTO MEMBERS (name , email , phone , gender , sports , location , password) VALUES ('$name','$email' ,'$phone' ,'$gender' ,'$sports','$location','$hashed_password')");

        if ($insert_row) {
            $_SESSION['login'] = $mysqli->insert_id;
            $_SESSION['name'] = $name; // Store name, not $mysqli->name
            $_SESSION['location'] = $location; // Store location, not $mysqli->location

            header("location:index.html");
            exit(); // Ensure script stops after redirect
        } else {
            echo 'false';
        }
    } else {
        echo 'Email already exists';
    }
}
?>
