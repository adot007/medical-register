<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Record</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <div class="flex h-screen bg-gray-200">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 h-screen text-white">
            <div class="p-4">
            <!--h1 class="text-2xl font-semibold">Sidebar</h1-->
            </div>

            <!-- Menu items with dropdowns -->
            <nav class="space-y-2 mt-6">
            <div class="pl-4">
                <a href="../nurseDash/" class="block text-gray-300 hover:text-white ">Dashboard</a>
            </div><br>

            <div class="pl-4">
                <a href="#" class="block text-gray-300 hover:text-white">Search Patient</a>
            </div><br>

            <div class="pl-4">
                <a href="../getAllPatients/" class="block text-gray-300 hover:text-white">View Patients</a>
            </div><br>

            <div class="pl-4">
                <a href="#" class="block text-gray-300 hover:text-white">Settings</a>
            </div>
            </nav>

            <!-- Logout Button -->
            <div class="absolute bottom-4 left-4">
            <button onclick="window.location.href= '../logout/' " 
                class="bg-red-500 text-white px-4 py-2 rounded">
                Logout
            </button>
            </div>
        </aside>

        <main class="flex-1 p-4">
            <div class="max-w-fit mx-auto bg-white p-8 rounded-md shadow-md">
        
            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                    onclick = "window.location.href='../addDiagnosis/'">
                    Add New Record
            </button><br /><br />

            <?php 
                //echo $_GET['id'];
                //include "../includes/sidebar.inc.php";

                include "../includes/db_conn.inc.php";
                $searched_patient_id = $_GET['id'];
                $_SESSION['searched_patient_id'] = $searched_patient_id;

                // Number of records to display initially
                $limit = 10;

                if (isset($_GET['page'])) {
                    $page = (int)$_GET['page'];
                } else {
                    $page = 1;
                }

                $offset = ($page - 1) * $limit;

                $sql = "SELECT * FROM medical_records WHERE patient_id = '$searched_patient_id' ORDER BY visit_date DESC LIMIT $limit";
                $result = $db_conn -> query($sql);

                // Display search results
                if($result->num_rows > 0) {
                    echo "<table class='table-auto mb-8'>";
                    echo "<thead><tr><th class='border px-4 py-2'>Visit Date</th><th class='border px-4 py-2'>Diagnosis</th><th class='border px-4 py-2'>Prescription</th><th class='border px-4 py-2'>View Details</th></tr></thead>";
                    echo "<tbody>";

                    while($row = $result->fetch_assoc()) {
                        //print_r($row);
                        echo "<tr class='hover:bg-gray-100 ' id =". $row['record_id'] .
                        "><td class='border px-4 py-2'>" . date('d-m-Y', strtotime($row['visit_date'])) .
                        "</td><td class='border px-4 py-2'>" . $row['diagnosis'] .
                        "</td><td class='border px-4 py-2'>" . $row['prescription'] .
                        "</td><td class='border px-4 py-2'><button>View Details</button>".
                        "</td></tr>";
                }
                    echo "</tbody></table>";

                    // Show More button
                    if ($page > 1) {
                        echo "<a href='../getMedicalRecord/index.php?page=" . ($page - 1) . "'>Previous Page</a>";
                    }

                    // Next page button
                    echo "<a href='../getMedicalRecord/index.php?page=" . ($page + 1) . "'>Next Page</a>";

                } else {
                    echo "<p>No records found for this patient.</p>";
                }
            ?>

            </div>
        </main>

    </div>

</body>
</html>