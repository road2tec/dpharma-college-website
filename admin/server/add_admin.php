<?php
include '../../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    $errors = [];

    if (empty($username))
        $errors[] = "Username is required";
    if (empty($password))
        $errors[] = "Password is required";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "Invalid email";

    if (count($errors) > 0) {
        // Output or handle validation errors
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    } else {
        // Hash password using bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO admins (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $email);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Admin account created successfully.</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    $conn->close();
}
?>