<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/meta.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidya Institute of Pharmacy</title>
</head>

<body data-theme="corporate">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/db.php'; ?>
    <?php
    $notices = [];
    $result = $conn->query("SELECT title, pdf_path FROM notices ORDER BY posted_on DESC LIMIT 5");
    while ($row = $result->fetch_assoc()) {
        $notices[] = $row;
    }
    ?>
    <!-- Modal Trigger -->
    <dialog id="banner_modal" class="modal sm:modal-middle">
        <div class="modal-box max-w-[44rem]">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <image src="assets/images/banner.jpg" alt="Banner Image"
                class="w-full lg:h-[70vh] object-contain rounded-lg mb-4" />
        </div>
    </dialog>
    <!-- Hero Section -->
    <?php include 'includes/hero.php'; ?>
    <!-- About Section -->
    <!-- Principal Message -->
    <section class="py-12 bg-base-200">
        <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="card lg:card-side bg-white shadow-sm text-black rounded-lg overflow-hidden">
                    <img src="./assets/images/president.jpg" alt="President Image" class="object-cover h-84" />
                    <div class="card-body p-6 h-content">
                        <h2 class="card-title uppercase">President’s Message</h2>
                        <p class="text-base">Welcome to Vidya Institute of Pharmacy, a premier
                            institution
                            dedicated to excellence in pharmaceutical education and research. Our goal is to equip
                            students with the knowledge, skills, and ethical foundation necessary for modern pharmacy
                            practice. We aim to nurture globally competent and socially responsible pharmacists
                            through....</p>
                        <div className="card-actions justify-end">
                            <a href="principal-message.php" class="btn btn-secondary cursor-pointer">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="card lg:card-side bg-white shadow-sm text-black rounded-lg overflow-hidden">
                    <img src="./assets/images/president.jpg" alt="Movie" class="object-cover h-84" />
                    <div class="card-body p-6 h-content">
                        <h2 class="card-title uppercase">Principal’s Message</h2>
                        <p class="text-base">Welcome to our D. Pharm program at Vidya Institute of
                            Pharmacy. Pharmacy is a noble profession, and we focus on providing high-quality education,
                            ethical values, and practical skills. Our curriculum aligns with Pharmacy Council of India
                            norms, combining theory with hands-on training. We emphasize personality development....</p>
                        <div className="card-actions justify-end">
                            <a href="principal-message.php" class="btn btn-secondary cursor-pointer">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white shadow text-gray-800 w-full mx-auto">
        <div class="max-w-7xl w-full mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 px-8 py-12">
            <div class="col-span-1">
                <h1 class="text-xl lg:text-3xl font-bold uppercase">About Vidya Institute of Pharmacy</h1>
                <span class="block border-b-3 border-primary mb-4"></span>
                <p class="lg:text-lg mb-6">Vidya Institute of Pharmacy, established in 2024, is dedicated to providing
                    quality
                    education in the field of pharmacy. Our mission is to foster a learning environment that encourages
                    innovation and excellence.</p>
                <p class="lg:text-lg">We offer a range of courses designed to equip students with the knowledge and
                    skills
                    needed
                    to excel in the pharmaceutical industry.</p>
                <h2 class="text-2xl font-semibold mt-8 uppercase">Our Vision</h2>
                <span class="block border-b-3 border-primary mb-4"></span>
                <p class="lg:text-lg">To inspire and develop future pharmacists who improve healthcare through
                    education, innovation, and service</p>
                <h2 class="text-2xl font-semibold mt-8 uppercase">Our Mission</h2>
                <span class="block border-b-3 border-primary mb-4"></span>
                <p class="lg:text-lg">M1: To provide high-quality education that prepares students for successful
                    careers in pharmacy.
                    <br><br>
                    M2: To foster innovation and research that contributes to advancements in healthcare.
                    <br><br>
                    M3: To promote community service and ethical practices in the pharmacy profession.
                </p>

                <a href="vision-mission.php" class="btn btn-primary btn-outline mt-4 w-full">Learn More</a>
            </div>
            <!-- Notices -->
            <div class="flex flex-col items-center justify-start">
                <h2 class="text-xl lg:text-3xl font-bold uppercase">Notices</h2>
                <span class="block border-b-3 border-primary mb-4"></span>

                <?php foreach ($notices as $notice): ?>
                    <div class="collapse collapse-arrow bg-base-100 border border-base-300 rounded-box mb-4">
                        <input type="checkbox" />
                        <div class="collapse-title font-semibold text-lg text-base-content">
                            📄 <?= htmlspecialchars($notice['title']) ?>
                        </div>
                        <div class="collapse-content">
                            <iframe src="<?= htmlspecialchars($notice['pdf_path']) ?>" class="w-full h-96 rounded border"
                                frameborder="0"></iframe>
                        </div>
                    </div>
                <?php endforeach; ?>
                <a href="notices.php" class="btn btn-secondary btn-outline mt-4 w-full">View All Notices</a>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>

</html>