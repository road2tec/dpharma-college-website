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
            <h1 class="text-4xl font-bold mb-4">🌟 Our Precious Faculties 🌟</h1>
            <p class="text-lg">🎓
                Our dedicated faculty members are the backbone of Vidya Institute of Pharmacy, guiding students towards
                excellence in pharmaceutical education and practice.
            </p>
        </div>
    </section>
    <!-- Faculties Section -->
    <div class="bg-white text-gray-800 p-14 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-6">
            <?php
            $query = "SELECT * FROM faculty ORDER BY name ASC";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()):
                $imageData = base64_encode($row['photo']);
                $imageType = $row['photo_type'];
                $imageSrc = "data:$imageType;base64,$imageData";
                ?>
                <div
                    class="card lg:card-side bg-base-300 shadow-md text-base-content hover:shadow-xl transition-all duration-200 overflow-hidden">
                    <img src="<?= $imageSrc ?>" alt="<?= htmlspecialchars($row['name']) ?>"
                        class="rounded-lg object-cover w-56 h-56 mx-auto" />
                    <div class="card-body flex justify-around items-start">
                        <h2 class="card-title text-xl font-semibold lg:text-center">

                            <?= htmlspecialchars($row['name']) ?>
                        </h2>
                        <span class="text-sm">🎓 <strong>Qualification:</strong>
                            <?= htmlspecialchars($row['qualification']) ?>
                        </span>
                        <span class="text-sm">📌 <strong>Designation:</strong>
                            <?= htmlspecialchars($row['designation']) ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>