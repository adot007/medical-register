<?php
    // Start a new session to manage user data
    session_start();

    // Set the page title
    $pageTitle = "Records";
?>

<!DOCTYPE html>
<html lang="en">

<?php  
    // Include the common head section
    include("../partials/head.php");
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php  
            // Include the sidebar navigation
            include("../partials/sidebar.php");
        ?>
   
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <?php  
                        // Include the search bar
                        include("../partials/search.php");
                    ?>

                    <!-- Topbar Navbar -->
                    <?php  
                        // Include the top navigation bar
                        include("../partials/navbar.php");
                    ?>
       
                </nav>

                <!-- Logout Button (optional) -->
                <!-- Uncomment the following lines to add a logout button -->
                <!--
                <div class="absolute bottom-4 left-4">
                    <button onclick="window.location.href= '../logout/' " 
                        class="bg-red-500 text-white px-4 py-2 rounded">
                        Logout
                    </button>
                </div>
                -->

            </aside>

            <main class="flex-1 p-4">
                <div class="max-w-fit mx-auto bg-white p-8 rounded-md shadow-md">

                    <!-- Add New Record Button -->
                    <button type="button" class="btn btn-primary text-white px-4 py-2 rounded-md hover:bg-blue-600"
                            onclick="window.location.href='../addVitals/'">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add New Record
                    </button><br /><br />

                    <?php 
                        // Get the searched patient ID from the URL
                        // $searched_patient_id = isset($_GET['id']) ? $_GET['id'] : "";
                        // $_SESSION['searched_patient_id'] = $searched_patient_id;
                        // $current_patient_id = $searched_patient_id;
                        // $_SESSION['current_patient_id'] = $current_patient_id;

                        if (isset($_GET['id'])){
                            $_SESSION['current_patient_id'] = $current_patient_id = $_GET['id'];
                        }

                        // Number of records to display initially
                        $limit = 10;

                        // Determine the current page number
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                        // Calculate the offset for pagination
                        $offset = ($page - 1) * $limit;

                        // SQL query to retrieve medical records for the specified patient ID
                        $sqlQuery = "SELECT * FROM medical_records WHERE patient_id = '$current_patient_id' ORDER BY visit_date DESC LIMIT $limit";
                        $sqlResult = $conn->query($sqlQuery);

                        // Display search results
                        if ($sqlResult->num_rows > 0) {
                            // Display a table with medical records
                            echo "<table class='table-auto mb-8'>";
                            echo "<thead><tr><th class='border px-4 py-2'>Visit Date</th>
                                    <th class='border px-4 py-2'>Diagnosis</th>
                                    <th class='border px-4 py-2'>Prescription</th>
                                    <th class='border px-4 py-2'>View Details</th>
                                    </tr></thead>";
                            echo "<tbody>";

                            // Loop through each record and display its details
                            while ($row = $sqlResult->fetch_assoc()) {
                                echo "<tr class='hover:bg-gray-100 ' id =" . $row['record_id'] . ">
                                        <td class='border px-4 py-2'>" . date('d-m-Y', strtotime($row['visit_date'])) . "</td>
                                        <td class='border px-4 py-2'>" . $row['diagnosis'] . "</td>
                                        <td class='border px-4 py-2'>" . $row['prescription'] . "</td>
                                        <td class='border px-4 py-2'>
                                            <button class='btn btn-success' onclick=\"window.location.href='../getPatientVisitDetails/index.php?id={$row['record_id']}'\">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>";
                            }

                            echo "</tbody></table>";

                            // Show Previous Page button if applicable
                            if ($page > 1) {
                                echo "<a href='../getMedicalRecord/index.php?page=" . ($page - 1) . "'>Previous Page</a>";
                            }

                            // Show Next Page button
                            echo "<a href='../getMedicalRecord/index.php?page=" . ($page + 1) . "'>Next Page</a>";

                        } else {
                            // Display a message if no records found for the patient
                            echo "<p>No records found for this patient.</p>";
                        }
                    ?>

                </div>
            </main>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>
</html>
