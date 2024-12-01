<?php
$con = mysqli_connect("localhost", "root", "", "has1");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Collect form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Check for empty fields
    if (empty($name) || empty($email) || empty($phone_number) || empty($message)) {
        echo "<script>alert('Please enter all required information.')</script>";
        echo "<script>window.open('contact.html', '_self')</script>";
        exit();
    }

    // Insert data into the database
    $query = "INSERT INTO submissions (name, email, phone_number, message) VALUES ('$name', '$email', '$phone_number', '$message')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Data has been registered successfully.')</script>";
        echo "<script>window.open('contact.html', '_self')</script>";
    } else {
        echo "<script>alert('Error: Could not register data.')</script>";
    }
}

mysqli_close($con);
?>
