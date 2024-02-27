<?php
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans">

    <header class="bg-blue-500 text-white py-4 text-center">
        <h1 class="text-2xl">Admin Dashboard</h1>
    </header>

   

    <section class="p-4">
        <!-- Display admin dashboard content here -->

        <!-- Flex container for cards -->
        <div class="flex justify-around mt-8">
            <?php
            // Connect to the database and fetch the count of patient IDs
            include "../includes/db_conn.inc.php";

            // Query to get the count of patient IDs
            $sql = "SELECT COUNT(patient_id) AS patient_count FROM patient_data";
            $result = $db_conn->query($sql);

            // Check if the query was successful
            if ($result !== false) {
                $row = $result->fetch_assoc();

                // Card 1
                echo '<a href="../pages/getAllPatients.php" class="text-black-500 hover:underline">';
                echo '<div class="bg-blue-300 p-8 rounded-md shadow-md text-center">';
                echo '<p class="text-5xl font-bold mb-1">' . $row["patient_count"] . '</p>';
                echo '<h2 class="text-lg font-semibold">Total Patients</h2>';
                echo '</div>';
                echo '</a>';
            } else {
                echo "Query failed: " . $db_conn->error;
            }

            // Repeat for Card 2
            $sql = "SELECT COUNT(record_id) AS record_count FROM medical_records";
            $result = $db_conn->query($sql);

            if ($result !== false) {
                $row = $result->fetch_assoc();

                echo '<a href="../pages/getAllRecords.php" class="text-black-500 hover:underline">';
                echo '<div class="bg-green-300 p-8 rounded-md shadow-md text-center">';
                echo '<p class="text-5xl font-bold mb-1">' . $row["record_count"] . '</p>';
                echo '<h2 class="text-lg font-semibold">Total Records</h2>';
                echo '</div>';
                echo '</a>';
            } else {
                echo "Query failed: " . $db_conn->error;
            }

            // Repeat for Card 3
            $sql = "SELECT COUNT(staff_id) AS staff_count FROM staff_data";
            $result = $db_conn->query($sql);

            if ($result !== false) {
                $row = $result->fetch_assoc();

                echo '<a href="view_staff.php" class="text-black-500 hover:underline">';
                echo '<div class="bg-yellow-300 p-8 rounded-md shadow-md text-center">';
                echo '<p class="text-5xl font-bold mb-1">' . $row["staff_count"] . '</p>';
                echo '<h2 class="text-lg font-semibold">Total Staff</h2>';
                echo '</div>';
                echo '</a>';
            } else {
                echo "Query failed: " . $db_conn->error;
            }

            $db_conn->close();
            ?>
        </div>
        <!-- End of flex container for cards -->
    </section>

</body>

</html>
