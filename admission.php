<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/meta.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D. Pharmacy Admission – Vidya Institute of Pharmacy</title>
</head>

<body data-theme="corporate" class="text-gray-700 bg-white">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/db.php'; ?>
    <section class="bg-base-200 py-12 text-base-content">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">🌟 D. Pharmacy – Admission Process 🌟</h1>
            <p class="text-lg">🎓 Start your journey in healthcare with our D. Pharmacy program!</p>
        </div>
    </section>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Overview -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">1. Overview</h2>
            <ul class="list-disc ml-6">
                <li><strong>Level:</strong> Diploma</li>
                <li><strong>Intake:</strong> 60 Seats</li>
                <li><strong>Duration:</strong> 2 Years</li>
                <li><strong>Study Mode:</strong> Full Time</li>
                <li><strong>Affiliation:</strong> MSBTE, Mumbai</li>
            </ul>
        </section>

        <!-- Eligibility -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">2. Eligibility</h2>
            <p class="mb-2">To be eligible for a Diploma in Pharmacy (D.Pharm), students must have completed 10+2 with a
                science background including:</p>
            <ul class="list-disc ml-6 mb-4">
                <li>Physics, Chemistry, and Biology or Mathematics</li>
            </ul>
            <p class="font-semibold mb-2">Educational Qualification:</p>
            <ul class="list-disc ml-6 mb-2">
                <li><strong>10+2 Level:</strong> Must have completed 10+2 or equivalent.</li>
                <li><strong>Science Stream:</strong> Physics, Chemistry and Biology/Mathematics are compulsory.</li>
            </ul>
            <p class="font-semibold mb-2">Other Requirements:</p>
            <ul class="list-disc ml-6">
                <li>Entrance exams (if applicable)</li>
                <li>Age limit (optional)</li>
                <li>Check specific college criteria</li>
            </ul>

            <p class="font-semibold mt-4 mb-2">Application Process:</p>
            <ul class="list-disc ml-6">
                <li>Online/Offline Application submission</li>
                <li>Document submission (see below)</li>
                <li>Merit-based selection</li>
            </ul>
        </section>

        <!-- Documents Required -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">3. Documents Required For Admission</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border border-gray-300">
                    <thead class="bg-gray-100 text-gray-800">
                        <tr>
                            <th class="border px-4 py-2">Sr. No.</th>
                            <th class="border px-4 py-2">Name of Document</th>
                            <th class="border px-4 py-2">OBC/NT/SBC/SEBC</th>
                            <th class="border px-4 py-2">SC/ST</th>
                            <th class="border px-4 py-2">OPEN</th>
                            <th class="border px-4 py-2">EWS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $documents = [
                            ["12th Marksheet", "✔", "✔", "✔", "✔"],
                            ["10th Marksheet", "✔", "✔", "✔", "✔"],
                            ["Leaving Certificate", "✔", "✔", "✔", "✔"],
                            ["Domicile / Birth Certificate", "✔", "✔", "✔", "✔"],
                            ["Nationality Certificate", "✔", "✔", "✔", "✔"],
                            ["Caste Certificate", "✔", "✔", "✘", "✘"],
                            ["Caste Validity Certificate", "✔", "✔", "✘", "✘"],
                            ["Non-creamy Layer Certificate", "✔", "✘", "✘", "✘"],
                            ["Annual Income Certificate", "✔", "✔", "✔", "✔"],
                            ["Aadhar Card", "✔", "✔", "✔", "✔"],
                            ["EWS Certificate", "✘", "✘", "✘", "✔"],
                            ["Photo", "✔", "✔", "✔", "✔"],
                        ];

                        $i = 1;
                        foreach ($documents as $doc) {
                            echo "<tr>";
                            echo "<td class='border px-4 py-2 text-center'>{$i}</td>";
                            echo "<td class='border px-4 py-2'>{$doc[0]}</td>";
                            echo "<td class='border px-4 py-2 text-center'>{$doc[1]}</td>";
                            echo "<td class='border px-4 py-2 text-center'>{$doc[2]}</td>";
                            echo "<td class='border px-4 py-2 text-center'>{$doc[3]}</td>";
                            echo "<td class='border px-4 py-2 text-center'>{$doc[4]}</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Call to Action -->
        <div class="bg-blue-100 p-6 rounded-lg shadow-md mt-6 text-center">
            <h3 class="text-xl font-bold mb-2">🎉 Admissions Open – Apply Now!</h3>
            <p class="mb-2">🌿 Your healthcare journey starts here with our D. Pharmacy program.</p>
            <a href="contact.php"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block mt-2">Contact Us Now</a>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>