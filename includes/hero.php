<?php
include './includes/db.php';

$gallery_images = [];
$result = $conn->query("SELECT id, title, media, media_type FROM gallery WHERE file_type = 'image' ORDER BY uploaded_at DESC");
while ($row = $result->fetch_assoc()) {
    $gallery_images[] = $row;
}
$conn->close();
?>
<div class="hero min-h-[85vh] bg-base-100">
    <div class="hero-content grid lg:grid-cols-2 gap-8">
        <!-- Left Text Section -->
        <div class="text-center lg:text-left space-y-6">
            <h1 class="text-2xl lg:text-5xl font-bold uppercase text-primary">Vidya Institute of Pharmacy</h1>
            <p class="text-base lg:text-lg">Empowering the next generation of pharmacists with quality education and
                hands-on
                experience.</p>

            <ul class="list-disc list-inside text-left text-base text-base-content/70">
                <li>Approved by PCI, DTE, Govt. of Maharashtra, MSBTE</li>
                <li>D.Pharmacy - Course Duration: 2 Years</li>
                <li><strong>DTE Code:</strong> 5652 | <strong>MSBTE Code:</strong> 62391</li>
                <li>Experienced Faculty, Digital Library</li>
                <li>Well Equipped Labs, Hostel & Bus Facility</li>
                <li>Government Scholarship, Placement Support</li>
            </ul>
            <a href="admin/index.php" class="btn btn-primary mt-4" download>Download Brochure</a>
        </div>

        <!-- Right Image Carousel -->
        <div class="carousel w-full rounded-box shadow-lg border border-base-300 bg-base-100 h-[70vh]">
            <!-- Loop from 0-13 -->
            <div class="carousel w-full rounded-box shadow-lg border border-base-300 bg-base-100 h-[70vh]">
                <?php foreach ($gallery_images as $index => $img): ?>
                    <div id="slide<?= $index ?>" class="carousel-item relative w-full h-full">
                        <img src="data:<?= $img['media_type'] ?>;base64,<?= base64_encode($img['media']) ?>"
                            alt="<?= htmlspecialchars($img['title']) ?>" class="w-full object-contain h-full" />

                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#slide<?= $index === 0 ? count($gallery_images) - 1 : $index - 1 ?>"
                                class="btn btn-circle">❮</a>
                            <a href="#slide<?= $index === count($gallery_images) - 1 ? 0 : $index + 1 ?>"
                                class="btn btn-circle">❯</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>