<?php
    session_start();
    $pageTitle = "Records";
?>

<!DOCTYPE html>
<html lang="en">
<?php  
    include("../partials/head.php") ;
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php  
        include("../partials/sidebar.php") ;
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
            include("../partials/search.php") ;
        ?>

        <!-- Topbar Navbar -->
        <?php  
            include("../partials/navbar.php") ;
        ?>
       
    </nav>

            <!-- Logout Button
            <div class="absolute bottom-4 left-4">
            <button onclick="window.location.href= '../logout/' " 
                class="bg-red-500 text-white px-4 py-2 rounded">
                Logout
            </button>
            </div> -->
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

                //include "../includes/conn.inc.php";
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

                $sqlQuery = "SELECT * FROM medical_records WHERE patient_id = '$searched_patient_id' ORDER BY visit_date DESC LIMIT $limit";
                $sqlResult = $conn -> query($sqlQuery);

                // Display search results
                if($sqlResult-> num_rows > 0) {
                    echo "<table class='table-auto mb-8'>";
                    echo "<thead><tr><th class='border px-4 py-2'>Visit Date</th>
                            <th class='border px-4 py-2'>Diagnosis</th>
                            <th class='border px-4 py-2'>Prescription</th>
                            <th class='border px-4 py-2'>View Details</th>
                            </tr></thead>";
                    echo "<tbody>";

                    while($row = $sqlResult->fetch_assoc()) {
                        //print_r($row);
                        echo "<tr class='hover:bg-gray-100 ' id =". $row['record_id'] .
                        "><td class='border px-4 py-2'>" . date('d-m-Y', strtotime($row['visit_date'])) .
                        "</td><td class='border px-4 py-2'>" . $row['diagnosis'] .
                        "</td><td class='border px-4 py-2'>" . $row['prescription'] .
                        "</td><td class='border px-4 py-2'><button onclick=\"window.location.href='../getPatientVisitDetails/index.php?id={$row['record_id']}'\">View Details</button>".
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