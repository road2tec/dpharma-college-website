<!-- Contact Form Processing and backend -->
<?php include 'includes/db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    $errors = [];

    if (empty($name))
        $errors[] = "Name is required";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "Invalid email";
    if (!preg_match('/^[0-9]{10}$/', $phone))
        $errors[] = "Phone must be 10 digits";
    if (empty($message))
        $errors[] = "Message cannot be empty";

    if (!empty($errors)) {
        $err_str = implode(" | ", $errors);
        header("Location: contact.php?status=error&msg=" . urlencode($err_str));
        exit;
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    if ($stmt->execute()) {
        header("Location: contact.php?status=success");
    } else {
        header("Location: contact.php?status=error&msg=Database Error");
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/meta.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidya Institute of Pharmacy</title>
</head>

<body data-theme="corporate">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/header.php'; ?>
    <!-- Toaster -->
    <section class="bg-base-200 py-12 text-base-content">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">🌟 Contact Us 🌟</h1>
            <p class="text-lg">🎓
                If you have any questions or need assistance, feel free to reach out to us. We're here to help!
            </p>
        </div>
    </section>
    <?php
    if (isset($_GET['status'])) {
        $toastClass = $_GET['status'] === 'success' ? 'alert-success' : 'alert-error';
        $toastMsg = $_GET['status'] === 'success' ? 'Your message was sent successfully!' : htmlspecialchars($_GET['msg']);
        echo "
    <div class='toast toast-center toast-top z-50'>
        <div class='alert $toastClass text-white font-semibold'>
            <span>$toastMsg</span>
        </div>
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.toast')?.remove();
        }, 5000);
    </script>
    ";
    }
    ?>
    <!-- Contact Form Section -->
    <div class="bg-white text-gray-800 lg:px-14 py-6 shadow-lg">
        <form action="contact.php" method="POST" class="space-y-6 shadow-lg p-8 bg-base-100 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-base font-medium text-base-content" for="name">Name</legend>
                    <input type="text" id="name" name="name" required
                        class="input input-neutral w-full bg-white input-lg text-base"
                        placeholder="What is Your Name ?" />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-base font-medium text-base-content" for="email">Email</legend>
                    <input type="email" id="email" name="email" required
                        class="input input-neutral w-full bg-white input-lg text-base"
                        placeholder="What is Your Email ?" />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-base font-medium text-base-content" for="phone">Phone Number
                    </legend>
                    <input type="tel" id="phone" name="phone" required
                        class="input input-neutral w-full bg-white input-lg text-base"
                        placeholder="What is Your Phone Number ?" />
                </fieldset>
            </div>
            <fieldset class="fieldset">
                <legend class="fieldset-legend text-base font-medium text-base-content" for="message">Message</legend>
                <textarea id="message" name="message" rows="4" required
                    class="textarea textarea-neutral w-full bg-white text-base" placeholder="What is Your Name ?">
                    </textarea>
            </fieldset>
            <button type="submit" class="btn btn-primary btn-outline w-full btn-lg">Send
                Message</button>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>