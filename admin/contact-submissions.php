<?php include '../includes/db.php'; ?>
<?php ob_start();
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);

    $stmt = $conn->prepare("DELETE FROM contact_submissions WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();

    header("Location: contact-submissions.php");
    exit();
}
?>

<?php
$page_title = "Contact Submissions";
?>

<div class="overflow-x-auto mx-auto">
    <table class="table table-zebra w-full bg-base-300 text-base">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM contact_submissions ORDER BY submitted_on DESC";
            $result = $conn->query($sql);
            $sn = 1;
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $sn++ ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                        <td><?= htmlspecialchars($row['submitted_on']) ?></td>
                        <td>
                            <a href="?delete=<?= $row['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete this submission?')"
                                class="btn btn-sm btn-error">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="7" class="text-center text-base">No submissions found.</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>