<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php
$current_page = basename($_SERVER['PHP_SELF']);

// Define admin links with icons
$admin_links = [
    [
        'title' => 'Dashboard Overview',
        "dock_title" => 'Home',
        'icon' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>',
        'link' => 'index.php'
    ],
    [
        'title' => 'Manage Faculty',
        "dock_title" => 'Faculty',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>',
        'link' => 'faculty.php'
    ],
    [
        'title' => 'Manage Gallery',
        "dock_title" => 'Gallery',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-library-photo">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                        <path
                            d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                        <path d="M17 7h.01" />
                        <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                        <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644" />
                    </svg>',
        'link' => 'gallery.php'
    ],
    [
        'title' => 'Manage Notices',
        'dock_title' => 'Notices',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-speakerphone">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 8a3 3 0 0 1 0 6" />
                        <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5" />
                        <path
                            d="M12 8h0l4.524 -3.77a.9 .9 0 0 1 1.476 .692v12.156a.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8" />
                    </svg>',
        'link' => 'notices.php'
    ],
    [
        'title' => 'Manage Documents',
        'dock_title' => 'Documents',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-folder">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M9 3a1 1 0 0 1 .608 .206l.1 .087l2.706 2.707h6.586a3 3 0 0 1 2.995 2.824l.005 .176v8a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-11a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" />
                    </svg>',
        'link' => 'documents.php'
    ],
    [
        'title' => 'View Contact Submissions',
        'dock_title' => 'Contacts',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-message">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M18 3a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-4.724l-4.762 2.857a1 1 0 0 1 -1.508 -.743l-.006 -.114v-2h-1a4 4 0 0 1 -3.995 -3.8l-.005 -.2v-8a4 4 0 0 1 4 -4zm-4 9h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0 -2m2 -4h-8a1 1 0 1 0 0 2h8a1 1 0 0 0 0 -2" />
                    </svg>',
        'link' => 'contact-submissions.php'
    ],
    [
        'title' => 'Change Password',
        'dock_title' => 'Password',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-key">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M14.52 2c1.029 0 2.015 .409 2.742 1.136l3.602 3.602a3.877 3.877 0 0 1 0 5.483l-2.643 2.643a3.88 3.88 0 0 1 -4.941 .452l-.105 -.078l-5.882 5.883a3 3 0 0 1 -1.68 .843l-.22 .027l-.221 .009h-1.172c-1.014 0 -1.867 -.759 -1.991 -1.823l-.009 -.177v-1.172c0 -.704 .248 -1.386 .73 -1.96l.149 -.161l.414 -.414a1 1 0 0 1 .707 -.293h1v-1a1 1 0 0 1 .883 -.993l.117 -.007h1v-1a1 1 0 0 1 .206 -.608l.087 -.1l1.468 -1.469l-.076 -.103a3.9 3.9 0 0 1 -.678 -1.963l-.007 -.236c0 -1.029 .409 -2.015 1.136 -2.742l2.643 -2.643a3.88 3.88 0 0 1 2.741 -1.136m.495 5h-.02a2 2 0 1 0 0 4h.02a2 2 0 1 0 0 -4" />
                    </svg>',
        'link' => 'change-password.php'
    ],
    [
        'title' => 'Logout',
        'dock_title' => 'Logout',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M9 12h12l-3 -3" />
                        <path d="M18 15l3 -3" />
                    </svg>',
        'link' => 'logout.php'
    ]
];
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidya Institute of Pharmacy | Admin Page</title>
    <?php include 'meta.php'; ?>
</head>

<body data-theme="corporate" class="min-h-screen">
    <div class="drawer h-screen">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col h-screen">
            <!-- Navbar -->
            <div class="navbar bg-base-300 w-full px-10">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-6 w-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="mx-2 flex-1 px-2 text-xl lg:text-2xl font-bold">🔐 Vidya Institute of Pharmacy | Admin Panel
                </div>
            </div>

            <div class="dock hidden lg:flex text-base bg-primary/10 text-primary-content">
                <?php foreach ($admin_links as $item):
                    $is_active = $current_page === basename($item['link']);
                    $color_class = $is_active ? 'text-primary font-semibold' : 'text-base-content hover:text-primary';
                    ?>
                    <a href="../admin/<?= $item['link'] ?>"
                        class="dock-item <?= $color_class ?> hover:scale-110 transition flex flex-col items-center">
                        <?= $item['icon'] ?>
                        <span class="dock-label text-sm"><?= $item['dock_title'] ?></span>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Page content here -->
            <section class="bg-base-200 py-6 text-base-content">
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
            <div class="p-6 bg-white min-h-[70vh] mb-12 overflow-y-auto">
                <?= $page_content ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 min-h-full w-80 p-4 text-base-content space-y-2">
                <div class="mx-2 px-2 py-4 text-xl lg:text-2xl font-bold border-b">🔐 Admin Panel</div>
                <?php foreach ($admin_links as $item):
                    $is_active = $current_page === basename($item['link']);
                    $active_class = $is_active ? 'bg-primary/20 text-primary font-semibold' : 'hover:bg-base-300 py-2';
                    ?>
                    <li>
                        <a href="../admin/<?= $item['link'] ?>"
                            class="flex items-center gap-3 py-2 px-3 rounded-md <?= $active_class ?>">
                            <?= $item['icon'] ?>
                            <span><?= $item['title'] ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</body>

</html>