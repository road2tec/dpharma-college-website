<?php include '../includes/db.php'; ?>
<?php ob_start();
$page_title = "Manage Faculty";

// Initialize form variables
$edit_mode = false;
$edit_id = null;
$edit_name = "";
$edit_qualification = "";
$edit_designation = "";

if (isset($_GET['edit'])) {
    $edit_mode = true;
    $edit_id = intval($_GET['edit']);
    $res = $conn->query("SELECT * FROM faculty WHERE id = $edit_id LIMIT 1");
    if ($res && $res->num_rows > 0) {
        $edit_row = $res->fetch_assoc();
        $edit_name = $edit_row['name'];
        $edit_qualification = $edit_row['qualification'];
        $edit_designation = $edit_row['designation'];
    } else {
        header("Location: admin_faculty.php");
        exit();
    }
}
?>

<div class="p-6 max-w-6xl mx-auto">
    <form method="POST" enctype="multipart/form-data" class="space-x-4 flex flex-col sm:flex-row gap-4 mb-6">
        <input type="text" name="name" placeholder="Faculty Name" value="<?= htmlspecialchars($edit_name) ?>"
            class="input input-primary bg-white text-black input-bordered w-full" required />

        <input type="text" name="qualification" placeholder="Qualification"
            value="<?= htmlspecialchars($edit_qualification) ?>"
            class="input input-primary bg-white text-black input-bordered w-full" />

        <input type="text" name="designation" placeholder="Designation"
            value="<?= htmlspecialchars($edit_designation) ?>"
            class="input input-primary bg-white text-black input-bordered w-full" />

        <input type="file" name="photo" accept="image/*"
            class="file-input file-input-primary bg-white text-black file-input-bordered w-full <?= $edit_mode ? '' : 'required' ?>" />

        <?php if ($edit_mode): ?>
            <input type="hidden" name="edit_id" value="<?= $edit_id ?>" />
            <button type="submit" name="update" class="btn btn-warning w-full sm:w-auto">Update Faculty</button>
            <a href="admin_faculty.php" class="btn btn-neutral w-full sm:w-auto">Cancel</a>
        <?php else: ?>
            <button type="submit" name="upload" class="btn btn-primary w-full sm:w-auto">Add Faculty</button>
        <?php endif; ?>
    </form>

    <div class="divider my-6 text-black divider-neutral">👩‍🏫 Faculty Members</div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        if (isset($_GET['delete'])) {
            $delete_id = intval($_GET['delete']);
            $conn->query("DELETE FROM faculty WHERE id = $delete_id");
            header("Location: admin_faculty.php");
            exit();
        }

        $result = $conn->query("SELECT * FROM faculty ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()):
            ?>
            <div class="card bg-base-300 text-center shadow-xl">
                <?php if (!empty($row['photo'])): ?>
                    <img src="data:<?= $row['photo_type'] ?>;base64,<?= base64_encode($row['photo']) ?>"
                        alt="<?= htmlspecialchars($row['name']) ?>" class="w-full h-60 object-contain rounded-lg" />
                <?php endif; ?>

                <div class="card-body">
                    <h2 class="card-title uppercase"><?= htmlspecialchars($row['name']) ?></h2>
                    <?php if (!empty($row['designation'])): ?>
                        <p class="text-sm text-gray-300"><?= htmlspecialchars($row['designation']) ?></p>
                    <?php endif; ?>
                    <?php if (!empty($row['qualification'])): ?>
                        <p class="text-xs text-gray-400"><?= htmlspecialchars($row['qualification']) ?></p>
                    <?php endif; ?>
                    <div class="flex justify-center gap-2 mt-2">
                        <a href="?edit=<?= $row['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="?delete=<?= $row['id'] ?>"
                            onclick="return confirm('Are you sure you want to delete this faculty?')"
                            class="btn btn-sm btn-error">Delete</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php if ($result->num_rows === 0): ?>
            <p class="text-center text-gray-500 text-lg">No faculty records found.</p>
        <?php endif; ?>
    </div>
</div>

<?php
// Handle upload
if (isset($_POST['upload']) && isset($_FILES['photo'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $qualification = $conn->real_escape_string($_POST['qualification'] ?? '');
    $designation = $conn->real_escape_string($_POST['designation'] ?? '');
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_type = mime_content_type($photo_tmp);
    $photo_data = addslashes(file_get_contents($photo_tmp));

    $query = "INSERT INTO faculty (name, qualification, designation, photo, photo_type)
              VALUES ('$name', '$qualification', '$designation', '$photo_data', '$photo_type')";
    $conn->query($query);

    header("Location: faculty.php");
    exit();
}

// Handle update
if (isset($_POST['update'])) {
    $edit_id = intval($_POST['edit_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $qualification = $conn->real_escape_string($_POST['qualification'] ?? '');
    $designation = $conn->real_escape_string($_POST['designation'] ?? '');

    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_type = mime_content_type($photo_tmp);
        $photo_data = addslashes(file_get_contents($photo_tmp));

        $query = "UPDATE faculty SET name = '$name', qualification = '$qualification',
                  designation = '$designation', photo = '$photo_data', photo_type = '$photo_type'
                  WHERE id = $edit_id";
    } else {
        // No new photo uploaded
        $query = "UPDATE faculty SET name = '$name', qualification = '$qualification',
                  designation = '$designation' WHERE id = $edit_id";
    }

    $conn->query($query);
    header("Location: faculty.php");
    exit();
}

$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>