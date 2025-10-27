<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/meta.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Vidya Institute of Pharmacy</title>
</head>

<body data-theme="corporate">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/db.php'; ?>

    <section class="bg-base-200 py-12 text-base-content">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">🌟 Latest Notices 🌟</h1>
            <p class="text-lg">🎓
                Stay updated with the latest announcements and important information from Vidya Institute of Pharmacy.
            </p>
        </div>
    </section>

    <section class="w-full bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <?php
            $notices = [];
            $result = $conn->query("SELECT title, pdf_path, posted_on FROM notices ORDER BY posted_on DESC");
            while ($row = $result->fetch_assoc()) {
                $notices[] = $row;
            }
            ?>

            <?php if (empty($notices)): ?>
                <p class="text-center text-lg text-base-content/60">No notices available at the moment.</p>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach ($notices as $index => $notice): ?>
                        <div class="collapse collapse-arrow bg-base-100 border border-base-300 rounded-box">
                            <input type="checkbox" id="notice<?= $index ?>" />
                            <div class="collapse-title font-semibold text-lg text-base-content">
                                📄 <?= htmlspecialchars($notice['title']) ?>
                                <span
                                    class="text-sm text-base-content/60 ml-2">(<?= date('d M Y', strtotime($notice['posted_on'])) ?>)</span>
                            </div>
                            <div class="collapse-content">
                                <iframe src="<?= htmlspecialchars($notice['pdf_path']) ?>" class="w-full h-96 rounded border"
                                    frameborder="0"></iframe>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>