<?php include '../includes/db.php'; ?>
<?php ob_start();
$page_title = "📥 Manage Downloadable Documents";
?>

<div class="p-6 max-w-6xl mx-auto space-y-8">
    <!-- Upload Form -->
    <form method="POST" enctype="multipart/form-data" class="space-x-4 flex flex-row">
        <input type="text" name="title" placeholder="Download Title"
            class="input input-primary bg-white text-black input-bordered w-full" required />
        <input type="file" name="pdf" accept="application/pdf"
            class="file-input file-input-primary bg-white text-black file-input-bordered w-full" required />
        <button type="submit" name="upload" class="btn btn-primary">Upload PDF</button>
    </form>

    <div class="divider my-6 text-black divider-neutral">📂 Uploaded Files</div>

    <!-- Downloads Table -->
    <div class="overflow-x-auto">
        <table class="table table-zebra bg-base-300 w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Download</th>
                    <th>Uploaded On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Handle Deletion
                if (isset($_GET['delete'])) {
                    $id = intval($_GET['delete']);
                    $getFile = $conn->query("SELECT pdf_path FROM downloads WHERE id = $id");
                    if ($getFile && $getFile->num_rows > 0) {
                        $file = $getFile->fetch_assoc()['pdf_path'];
                        if (file_exists($file)) {
                            unlink($file); // Delete from server
                        }
                    }
                    $conn->query("DELETE FROM downloads WHERE id = $id");
                    header("Location: admin_downloads.php");
                    exit();
                }

                // Fetch and list downloads
                $downloads = [];
                $result = $conn->query("SELECT * FROM downloads ORDER BY uploaded_on DESC");
                while ($row = $result->fetch_assoc()) {
                    $downloads[] = $row;
                }
                ?>

                <?php foreach ($downloads as $index => $file): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td class="max-w-sm truncate"><?= htmlspecialchars($file['title']) ?></td>
                        <td>
                            <a href="../<?= $file['pdf_path'] ?>" class="link link-primary" target="_blank">View</a>
                        </td>
                        <td><?= date('d M Y, h:i A', strtotime($file['uploaded_on'])) ?></td>
                        <td>
                            <a href="?delete=<?= $file['id'] ?>" class="btn btn-error btn-sm"
                                onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Handle Upload
if (isset($_POST['upload']) && isset($_FILES['pdf'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $pdf = $_FILES['pdf'];

    if ($pdf['error'] === 0 && $pdf['type'] === 'application/pdf') {
        $upload_dir = '../assets/downloads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $filename = time() . '_' . basename($pdf['name']);
        $filepath = $upload_dir . $filename;
        $relative_path = 'assets/downloads/' . $filename;

        if (move_uploaded_file($pdf['tmp_name'], $filepath)) {
            $conn->query("INSERT INTO downloads (title, pdf_path) VALUES ('$title', '$relative_path')");
            header("Location: downloads.php");
            exit();
        }
    }
}

$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>