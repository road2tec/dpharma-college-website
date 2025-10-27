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

<div class="p-6">

    <div class="stats stats-vertical lg:stats-horizontal shadow w-full bg-base-300">
        <!-- Faculty -->
        <div class="stat">
            <div class="stat-figure text-primary text-3xl"><svg xmlns="http://www.w3.org/2000/svg" width="36"
                    height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                </svg></div>
            <div class="stat-title">Faculty Members</div>
            <div class="stat-value text-primary"><?= $faculty_count ?></div>
            <div class="stat-desc">Academic Team</div>
        </div>

        <!-- Gallery -->
        <div class="stat">
            <div class="stat-figure text-secondary text-3xl"><svg xmlns="http://www.w3.org/2000/svg" width="36"
                    height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-library-photo">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                    <path
                        d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                    <path d="M17 7h.01" />
                    <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                    <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644" />
                </svg></div>
            <div class="stat-title">Gallery Items</div>
            <div class="stat-value text-secondary"><?= $gallery_count ?></div>
            <div class="stat-desc">Images & Videos</div>
        </div>

        <!-- Notices -->
        <div class="stat">
            <div class="stat-figure text-accent text-3xl"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speakerphone">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 8a3 3 0 0 1 0 6" />
                    <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5" />
                    <path
                        d="M12 8h0l4.524 -3.77a.9 .9 0 0 1 1.476 .692v12.156a.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8" />
                </svg></div>
            <div class="stat-title">Notices</div>
            <div class="stat-value text-accent"><?= $notices_count ?></div>
            <div class="stat-desc">Announcements Posted</div>
        </div>
        <!-- Downloads -->
        <div class="stat">
            <div class="stat-figure text-info text-3xl"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                    viewBox="0 0 24 24" fill="currentColor"
                    class="icon icon-tabler icons-tabler-filled icon-tabler-folder">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M9 3a1 1 0 0 1 .608 .206l.1 .087l2.706 2.707h6.586a3 3 0 0 1 2.995 2.824l.005 .176v8a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-11a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" />
                </svg></div>
            <div class="stat-title">Download Files</div>
            <div class="stat-value text-info"><?= $downloads_count ?></div>
            <div class="stat-desc">Student Resources</div>
        </div>

        <!-- Contact Submissions -->
        <div class="stat">
            <div class="stat-figure text-warning text-3xl"><svg xmlns="http://www.w3.org/2000/svg" width="36"
                    height="36" viewBox="0 0 24 24" fill="currentColor"
                    class="icon icon-tabler icons-tabler-filled icon-tabler-message">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M18 3a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-4.724l-4.762 2.857a1 1 0 0 1 -1.508 -.743l-.006 -.114v-2h-1a4 4 0 0 1 -3.995 -3.8l-.005 -.2v-8a4 4 0 0 1 4 -4zm-4 9h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0 -2m2 -4h-8a1 1 0 1 0 0 2h8a1 1 0 0 0 0 -2" />
                </svg></div>
            <div class="stat-title">Messages</div>
            <div class="stat-value text-warning"><?= $contacts_count ?></div>
            <div class="stat-desc">Contact Form Entries</div>
        </div>

        <!-- Admins -->
        <div class="stat">
            <div class="stat-figure text-error text-3xl"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg></div>
            <div class="stat-title">Admins</div>
            <div class="stat-value text-error"><?= $admins_count ?></div>
            <div class="stat-desc">Panel Users</div>
        </div>
    </div>
    <!-- charts -->
    <div class="mt-8 bg-base-200 p-6 rounded-lg shadow-lg">
        <canvas id="dashboardChart" width="400" height="100"></canvas>
    </div>
</div>
<script>
    var ctx = document.getElementById('dashboardChart').getContext('2d');
    var dashboardChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Faculty', 'Gallery', 'Notices', 'Downloads', 'Messages', 'Admins'],
            datasets: [{
                label: 'Item Counts',
                data: [<?= $faculty_count ?>, <?= $gallery_count ?>, <?= $notices_count ?>, <?= $downloads_count ?>, <?= $contacts_count ?>, <?= $admins_count ?>],
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3', '#9C27B0', '#FF5722', '#795548'],
                borderColor: ['#388E3C', '#F57C00', '#1976D2', '#7B1FA2', '#D32F2F', '#5D4037'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php
$conn->close();
$page_content = ob_get_clean();
include "./includes/layout.php";
?>