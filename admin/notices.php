<?php include '../includes/db.php'; ?>
<?php ob_start();
$page_title = "📤 Manage Notices";
?>

<div class="p-6 max-w-6xl mx-auto space-y-8">
    <!-- Upload Form -->
    <form method="POST" enctype="multipart/form-data" class="space-x-4 flex flex-row">
        <input type="text" name="title" placeholder="Notice Title"
            class="input input-primary bg-white text-black input-bordered w-full" required />

        <input type="file" name="pdf" accept="application/pdf"
            class="file-input file-input-primary bg-white text-black file-input-bordered w-full" required />

        <button type="submit" name="upload" class="btn btn-primary">Upload Notice</button>
    </form>

    <div class="divider my-6 text-black divider-neutral">📑 Uploaded Notices</div>

    <!-- Notice Table -->
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full bg-base-300">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Download</th>
                    <th>Posted On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Handle deletion
                if (isset($_GET['delete'])) {
                    $id = intval($_GET['delete']);
                    $getFile = $conn->query("SELECT pdf_path FROM notices WHERE id = $id");
                    if ($getFile && $getFile->num_rows > 0) {
                        $file = $getFile->fetch_assoc()['pdf_path'];
                        if (file_exists($file)) {
                            unlink($file); // Delete from server
                        }
                    }
                    $conn->query("DELETE FROM notices WHERE id = $id");
                    header("Location: admin_notices.php");
                    exit();
                }

                // Fetch and display notices
                $result = $conn->query("SELECT * FROM notices ORDER BY posted_on DESC");
                $count = 1;
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td class="max-w-xs truncate"><?= htmlspecialchars($row['title']) ?></td>
                        <td><a href="../<?= $row['pdf_path'] ?>" target="_blank" class="link link-primary">View</a></td>
                        <td><?= date('d M Y, h:i A', strtotime($row['posted_on'])) ?></td>
                        <td>
                            <a href="?delete=<?= $row['id'] ?>" class="btn btn-error btn-sm"
                                onclick="return confirm('Are you sure you want to delete this notice?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Handle upload
if (isset($_POST['upload']) && isset($_FILES['pdf'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $pdf = $_FILES['pdf'];

    if ($pdf['error'] === 0 && $pdf['type'] === 'application/pdf') {
        $upload_dir = '../assets/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $filename = time() . '_' . basename($pdf['name']);
        $filepath = $upload_dir . $filename;
        $relative_path = 'assets/uploads/' . $filename;

        if (move_uploaded_file($pdf['tmp_name'], $filepath)) {
            $conn->query("INSERT INTO notices (title, pdf_path) VALUES ('$title', '$relative_path')");
            header("Location: notices.php");
            exit();
        }
    }
}

$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>