<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/meta.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloads - Vidya Institute of Pharmacy</title>
</head>

<body data-theme="corporate">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/db.php'; ?>

    <!-- Hero Section -->
    <section class="bg-base-200 py-12 text-base-content">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">🌟 Download Documents 🌟</h1>
            <p class="text-lg">🎓 Explore and download important documents related to the D. Pharmacy course at Vidya
                Institute of Pharmacy.</p>
        </div>
    </section>

    <!-- Accordion Download Section -->
    <section class="w-full bg-white min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <?php
            $result = $conn->query("SELECT * FROM downloads ORDER BY uploaded_on DESC");
            if ($result && $result->num_rows > 0):
                ?>
                <div class="space-y-4">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div tabindex="0" class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box">
                            <input type="checkbox" class="peer" />
                            <div class="collapse-title text-lg font-medium">
                                <?= htmlspecialchars($row['title']) ?>
                                <span
                                    class="text-sm text-gray-400 ml-2">(<?= date('d M Y', strtotime($row['uploaded_on'])) ?>)</span>
                            </div>
                            <div class="collapse-content">
                                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                                    <iframe src="<?= $row['pdf_path'] ?>" class="w-full sm:w-[300px] h-48 border rounded"
                                        loading="lazy"></iframe>
                                    <div class="flex gap-4">
                                        <a href="<?= $row['pdf_path'] ?>" target="_blank"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="<?= $row['pdf_path'] ?>" download class="btn btn-outline btn-sm">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="text-center text-gray-500">No downloads available at the moment.</p>
            <?php endif; ?>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>