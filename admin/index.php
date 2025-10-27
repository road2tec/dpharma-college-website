<?php include '../includes/db.php'; ?>
<?php ob_start();
$page_title = "Admin Dashboard";

// Fetch counts
$faculty_count = $conn->query("SELECT COUNT(*) as count FROM faculty")->fetch_assoc()['count'];
$gallery_count = $conn->query("SELECT COUNT(*) as count FROM gallery")->fetch_assoc()['count'];
$notices_count = $conn->query("SELECT COUNT(*) as count FROM notices")->fetch_assoc()['count'];
$downloads_count = $conn->query("SELECT COUNT(*) as count FROM downloads")->fetch_assoc()['count'];
$contacts_count = $conn->query("SELECT COUNT(*) as count FROM contact_submissions")->fetch_assoc()['count'];
$admins_count = $conn->query("SELECT COUNT(*) as count FROM admins")->fetch_assoc()['count'];
?>

<div class="p-6 max-w-7xl mx-auto">

    <div class="stats stats-vertical lg:stats-horizontal shadow w-full bg-base-300">
        <!-- Faculty -->
        <div class="stat">
            <div class="stat-figure text-primary text-3xl">👩‍🏫</div>
            <div class="stat-title">Faculty Members</div>
            <div class="stat-value text-primary"><?= $faculty_count ?></div>
            <div class="stat-desc">Academic Team</div>
        </div>

        <!-- Gallery -->
        <div class="stat">
            <div class="stat-figure text-secondary text-3xl">🖼️</div>
            <div class="stat-title">Gallery Items</div>
            <div class="stat-value text-secondary"><?= $gallery_count ?></div>
            <div class="stat-desc">Images & Videos</div>
        </div>

        <!-- Notices -->
        <div class="stat">
            <div class="stat-figure text-accent text-3xl">📢</div>
            <div class="stat-title">Notices</div>
            <div class="stat-value text-accent"><?= $notices_count ?></div>
            <div class="stat-desc">Announcements Posted</div>
        </div>
    </div>

    <div class="stats stats-vertical lg:stats-horizontal shadow w-full bg-base-300 mt-6">
        <!-- Downloads -->
        <div class="stat">
            <div class="stat-figure text-info text-3xl">📄</div>
            <div class="stat-title">Download Files</div>
            <div class="stat-value text-info"><?= $downloads_count ?></div>
            <div class="stat-desc">Student Resources</div>
        </div>

        <!-- Contact Submissions -->
        <div class="stat">
            <div class="stat-figure text-warning text-3xl">📬</div>
            <div class="stat-title">Messages</div>
            <div class="stat-value text-warning"><?= $contacts_count ?></div>
            <div class="stat-desc">Contact Form Entries</div>
        </div>

        <!-- Admins -->
        <div class="stat">
            <div class="stat-figure text-error text-3xl">👨‍💼</div>
            <div class="stat-title">Admins</div>
            <div class="stat-value text-error"><?= $admins_count ?></div>
            <div class="stat-desc">Panel Users</div>
        </div>
    </div>

</div>

<?php
$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>