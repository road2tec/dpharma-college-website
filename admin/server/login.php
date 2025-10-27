<?php include '../../includes/db.php'; ?>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['identifier']);
    $password = $_POST['password'];

    if (empty($identifier) || empty($password)) {
        http_response_code(400);
        echo "Please fill all fields.";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        http_response_code(401);
        echo "Invalid username/email or password.";
        exit;
    }

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_username'] = $user['username'];
        // Redirect to admin dashboard
        header("Location: ../index.php");
    } else {
        http_response_code(401);
        echo "Invalid username/email or password.";
    }
}
