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
            <h1 class="text-4xl font-bold mb-4">🌟 Our Gallery 🌟</h1>
            <p class="text-lg">🎓 Explore the vibrant campus life and activities at Vidya Institute of Pharmacy!</p>
        </div>
    </section>
    <section class="w-full bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <?php
            $gallery_images = [];
            $result = $conn->query("SELECT id, title, media, media_type FROM gallery WHERE file_type = 'image' ORDER BY uploaded_at DESC");
            while ($row = $result->fetch_assoc()) {
                $gallery_images[] = $row;
            }
            ?>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php foreach ($gallery_images as $index => $img): ?>
                    <div class="card shadow-md hover:shadow-xl transition duration-300 cursor-pointer hover:scale-105 overflow-hidden"
                        onclick="document.getElementById('modal<?= $index ?>').showModal()">
                        <figure>
                            <img src="data:<?= $img['media_type'] ?>;base64,<?= base64_encode($img['media']) ?>"
                                alt="<?= htmlspecialchars($img['title']) ?>"
                                class="w-full h-full object-cover animate-fade-in" />
                        </figure>

                    </div>

                    <!-- Modal for expanded view -->
                    <dialog id="modal<?= $index ?>" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <img src="data:<?= $img['media_type'] ?>;base64,<?= base64_encode($img['media']) ?>"
                                alt="<?= htmlspecialchars($img['title']) ?>"
                                class="w-full max-h-[80vh] object-contain rounded-lg" />
                        </div>
                    </dialog>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>