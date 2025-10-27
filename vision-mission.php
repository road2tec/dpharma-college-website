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
    <section class="bg-base-200 py-12 text-base-content">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">🌟 Our Vision & Mission 🌟</h1>
            <p class="text-lg">🎓 Empowering future pharmacists through quality education and innovative practices.</p>
        </div>
    </section>
    <section class="w-full bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Vision -->
                <div class="bg-blue-50 rounded-lg shadow-md p-6 flex flex-col justify-between">
                    <div>
                        <img src="./assets/images/vision.png" alt="Vision"
                            class="w-full h-48 object-contain rounded-md mb-4">
                        <h2 class="text-2xl font-bold text-blue-900 mb-3">Our Vision</h2>
                        <p class="text-gray-700 leading-relaxed">
                            To inspire and develop future pharmacists who improve healthcare through education,
                            innovation, and service
                        </p>
                    </div>
                </div>

                <!-- Mission -->
                <div class="bg-green-50 rounded-lg shadow-md p-6 flex flex-col justify-between">
                    <div>
                        <img src="./assets/images/mission.png" alt="Mission"
                            class="w-full h-48 object-contain rounded-md mb-4">
                        <h2 class="text-2xl font-bold text-green-900 mb-3">Our Mission</h2>
                        <p class="text-gray-700 leading-relaxed">
                            M1: To provide high-quality education that prepares students for successful
                            careers in pharmacy.
                            <br><br>
                            M2: To foster innovation and research that contributes to advancements in healthcare.
                            <br><br>
                            M3: To promote community service and ethical practices in the pharmacy profession.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>