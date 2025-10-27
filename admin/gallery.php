<?php include '../includes/db.php'; ?>
<?php ob_start();
$page_title = "Upload Image or Video";
?>

<div class="p-6">
    <form method="POST" enctype="multipart/form-data" class="space-x-4 flex flex-row">
        <input type="text" name="title" placeholder="Enter Image Title"
            class="input input-primary bg-white text-black input-bordered w-full" required />
        <input type="file" name="media" accept="image/*,video/*"
            class="file-input file-input-primary bg-white text-black file-input-bordered w-full" required />
        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
    </form>

    <div class="divider my-6 text-black divider-neutral">📁 Gallery</div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        if (isset($_GET['delete'])) {
            $delete_id = intval($_GET['delete']);
            $conn->query("DELETE FROM gallery WHERE id = $delete_id");
            header("Location: admin_gallery.php");
            exit();
        }

        // Show all items
        $result = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
        while ($row = $result->fetch_assoc()):
            ?>
            <div class="card bg-base-300 uppercase text-center shadow-xl">
                <?php if (str_starts_with($row['media_type'], 'image')): ?>
                    <figure>
                        <img src="data:<?= $row['media_type'] ?>;base64,<?= base64_encode($row['media']) ?>"
                            alt="<?= htmlspecialchars($row['title']) ?>" class="w-full h-60 object-cover" />
                    </figure>
                <?php elseif (str_starts_with($row['media_type'], 'video')): ?>
                    <figure>
                        <video controls class="w-full h-60 object-cover">
                            <source src="data:<?= $row['media_type'] ?>;base64,<?= base64_encode($row['media']) ?>"
                                type="<?= $row['media_type'] ?>">
                        </video>
                    </figure>
                <?php endif; ?>

                <div class="card-body">
                    <h2 class="card-title truncate"><?= htmlspecialchars($row['title']) ?></h2>
                    <a href="?delete=<?= $row['id'] ?>"
                        onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-sm btn-error">
                        Delete
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
        <?php if ($result->num_rows === 0): ?>
            <p class="text-center text-gray-500">No items found in the gallery.</p>
        <?php endif; ?>
    </div>
</div>

<?php
// Handle upload
if (isset($_POST['upload']) && isset($_FILES['media'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $media = $_FILES['media']['tmp_name'];
    $media_type = mime_content_type($media);
    $media_data = addslashes(file_get_contents($media));
    $file_type = str_starts_with($media_type, 'video') ? 'video' : 'image';

    $query = "INSERT INTO gallery (title, media, media_type, file_type) VALUES ('$title', '$media_data', '$media_type', '$file_type')";
    $conn->query($query);

    header("Location: gallery.php");
    exit();
}

$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>