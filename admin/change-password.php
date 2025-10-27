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

<div class="p-6">
    <!-- Add Admin Form -->
    <form method="POST" class="space-x-4 flex flex-row">
        <input type="text" name="username" placeholder="Username" required
            class="input input-primary input-bordered w-full" />
        <input type="email" name="email" placeholder="Email" class="input input-primary input-bordered w-full" />
        <div class="join w-full">
            <input type="password" name="password" placeholder="Password" id="adminPassword" required
                class="input input-primary input-bordered w-full join-item" />
            <button type="button" id="togglePassword" class="btn btn-neutral join-item">
                <!-- Eye SVG (visible by default) -->
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                <!-- Eye Slash SVG (hidden by default) -->
                <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="w-6 h-6 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.98 8.223A10.477 10.477 0 0 0 1.5 12s3.75 7.5 10.5 7.5c1.806 0 3.48-.48 4.932-1.318M9.88 9.88A3 3 0 0 0 12 15a3 3 0 0 0 2.12-.88m-4.24 0L3 3m0 0l18 18" />
                </svg>
            </button>
        </div>
        <button type="submit" name="add_admin" class="btn btn-primary">Add Admin</button>
    </form>

    <div class="divider my-6 text-black divider-neutral">
        👩‍🏫 Manage Admins
    </div>

    <!-- Admin Table -->
    <div class="overflow-x-auto bg-base-200 p-4 rounded-xl">
        <table class="table table-zebra w-full">
            <thead class="text-base-content">
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
                            <form method="POST" class="flex space-x-2 w-full">
                                <input type="hidden" name="admin_id" value="<?= $row['id'] ?>">
                                <input type="password" name="new_password" placeholder="New Password" required
                                    class="input input-primary w-full" />
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

<script>
    // Toggle password visibility for Add Admin
    const toggleBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('adminPassword');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeSlashIcon = document.getElementById('eyeSlashIcon');

    toggleBtn.addEventListener('click', () => {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        eyeIcon.classList.toggle('hidden');
        eyeSlashIcon.classList.toggle('hidden');
    });

    // Toggle password visibility for Change Password fields in table
    document.querySelectorAll('.toggle-password').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.parentElement.querySelector('input');
            const eye = btn.querySelector('.eye');
            const eyeSlash = btn.querySelector('.eye-slash');
            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            eye.classList.toggle('hidden');
            eyeSlash.classList.toggle('hidden');
        });
    });
</script>

<?php
$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>