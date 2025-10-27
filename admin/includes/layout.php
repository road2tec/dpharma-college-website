<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidya Institute of Pharmacy | Admin Page</title>
    <?php include 'meta.php'; ?>
</head>

<body data-theme="corporate" class="min-h-screen">
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar bg-base-300 w-full px-10 lg:px-20 py-4">
                <div class="flex-none ">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-6 w-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="mx-2 flex-1 px-2 text-xl lg:text-3xl font-bold">🔐 Admin Panel</div>
            </div>

            <div class="dock hidden lg:flex text-base">
                <a href="../admin/index.php" class="dock-item hover:scale-110 transition">
                    🏠
                    <span class="dock-label text-base">Home</span>
                </a>
                <a href="../admin/faculty.php" class="dock-item hover:scale-110 transition">
                    👨‍🏫
                    <span class="dock-label text-base">Faculty</span>
                </a>
                <a href="../admin/gallery.php" class="dock-item hover:scale-110 transition">
                    🖼️
                    <span class="dock-label text-base">Gallery</span>
                </a>
                <a href="../admin/notices.php" class="dock-item hover:scale-110 transition">
                    📢
                    <span class="dock-label text-base">Notices</span>
                </a>
                <a href="../admin/documents.php" class="dock-item hover:scale-110 transition">
                    📁
                    <span class="dock-label text-base">Documents</span>
                </a>
                <a href="../admin/contact-submissions.php" class="dock-item hover:scale-110 transition">
                    ✉️
                    <span class="dock-label text-base">Contacts</span>
                </a>
                <a href="../admin/change-password.php" class="dock-item hover:scale-110 transition">
                    🔑
                    <span class="dock-label text-base">Password</span>
                </a>
                <a href="../admin/logout.php" class="dock-item text-error font-semibold hover:scale-110 transition">
                    🚪
                    <span class="dock-label text-base">Logout</span>
                </a>
            </div>


            <!-- Page content here -->
            <section class="bg-base-200 py-12 text-base-content">
                <div class="max-w-6xl mx-auto px-4 text-center">
                    <h1 class="text-4xl font-bold mb-4">🌟
                        <?= isset($page_title) ? htmlspecialchars($page_title) : 'Admin Dashboard' ?> 🌟
                    </h1>
                    <p class="text-lg">
                        Welcome to the Vidya Institute of Pharmacy Admin Panel. Here you can manage faculty, gallery,
                        notices, documents, and more.
                    </p>
                </div>
            </section>
            <div class="p-6 bg-white min-h-[70vh] mb-12">
                <?= $page_content ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 min-h-full w-80 p-4 text-base-content space-y-4 text-base">
                <div class="mx-2 px-2 py-4 text-xl lg:text-3xl font-bold bg-base-300">🔐 Admin Panel</div>
                <li><a href="../admin/index.php">🏠 Dashboard Overview</a></li>
                <li><a href="../admin/faculty.php">👨‍🏫 Manage Faculty</a></li>
                <li><a href="../admin/gallery.php">🖼️ Manage Gallery</a></li>
                <li><a href="../admin/notices.php">📢 Manage Notices</a></li>
                <li><a href="../admin/documents.php">📁 Manage Documents</a></li>
                <li><a href="../admin/contact-submissions.php">✉️ View Contact Submissions</a></li>
                <li><a href="../admin/change-password.php">🔑 Change Password</a></li>
                <li><a href="../admin/logout.php">🚪 Logout</a></li>
            </ul>
        </div>
    </div>
</body>

</html>