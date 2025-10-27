<?php include '../includes/db.php'; ?>
<?php ob_start(); ?>
<?php
$page_title = "Manage Admins and Change Password";

// Add Admin
if (isset($_POST['add_admin'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();
}

// Change Password
if (isset($_POST['change_password'])) {
    $id = $_POST['admin_id'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE admins SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $new_password, $id);
    $stmt->execute();
    $stmt->close();
}

// Delete Admin
if (isset($_POST['delete_admin'])) {
    $id = $_POST['admin_id'];
    $stmt = $conn->prepare("DELETE FROM admins WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Fetch admins
$admins = $conn->query("SELECT * FROM admins");
?>

<div class="p-6 max-w-6xl mx-auto space-y-8">

    <!-- Add Admin Form -->
    <form method="POST" class="space-x-4 flex flex-row">
        <input type="text" name="username" placeholder="Username" required
            class="input input-primary bg-white text-black input-bordered w-full" />
        <input type="email" name="email" placeholder="Email"
            class="input input-primary bg-white text-black input-bordered w-full" />
        <input type="password" name="password" placeholder="Password" required
            class="input input-primary bg-white text-black input-bordered w-full" />
        <button type="submit" name="add_admin" class="btn btn-primary">Add Admin</button>
    </form>

    <!-- Admin Table -->
    <div class="overflow-x-auto bg-base-200 p-4 rounded-xl">
        <table class="table table-zebra w-full">
            <thead class="text-white">
                <tr>
                    <th>#</th>
                    <th>👤 Username</th>
                    <th>📧 Email</th>
                    <th>🕒 Created At</th>
                    <th>🔧 Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                while ($row = $admins->fetch_assoc()): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td class="flex space-x-2">
                            <!-- Change Password Form -->
                            <form method="POST" class="flex space-x-2">
                                <input type="hidden" name="admin_id" value="<?= $row['id'] ?>">
                                <input type="password" name="new_password" placeholder="New Password" required
                                    class="input input-bordered input-sm" />
                                <button type="submit" name="change_password" class="btn btn-sm btn-warning">Change</button>
                            </form>

                            <!-- Delete Admin Form -->
                            <form method="POST" onsubmit="return confirm('Are you sure to delete?')">
                                <input type="hidden" name="admin_id" value="<?= $row['id'] ?>">
                                <button type="submit" name="delete_admin" class="btn btn-sm btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>