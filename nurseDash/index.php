<?php
    // Start the session if it's not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the session variable exists before unsetting it
    if (isset($_SESSION['search_made'])) {
        unset($_SESSION['search_made']);
    }
?>

<?php
    // Set the page title for Nurse Dashboard
    $pageTitle = "Nurse Dashboard";
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

        <!-- Content Wrapper -->
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="../addPatient/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Add Patient 
                        </a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example 
                        <div class="col-xl-3 col-md-6 mb-4">
                            ... Card content ...
                        </div>-->
                        <!-- More Card Examples -->

                    </div>

                    <!-- Content Row -->

                    <div class="col-lg-12">
                        <?php
                            // Check if a search has been made
                            if (isset($_GET['search']) && !empty($_GET['search'])) {
                                // Set the session flag to indicate that a search has been made
                                $_SESSION['search_made'] = true;

                                // Process the search
                                $search = $_GET['search'];
                                $sql = "SELECT * FROM patient_data WHERE first_name LIKE '%$search%' OR surname LIKE '%$search%' OR roll_num LIKE '%$search%'";
                                $result = $conn->query($sql);

                                // Display search results
                                if ($result->num_rows > 0) {
                                    echo "<div class='col-lg-12'>";
                                    echo "<div class='card shadow mb-4'>";
                                    echo "<div class='card-header py-3'>";
                                    echo "<h6 class='m-0 font-weight-bold text-primary'>Search Results</h6>";
                                    echo "</div>";
                                    echo "<div class='card-body'>";
                                    echo "<div class='table-responsive'>";
                                    echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>First Name</th>";
                                    echo "<th>Last Name</th>";
                                    echo "<th>Other Names</th>";
                                    echo "<th>Faculty</th>";
                                    echo "<th>Roll Number</th>";
                                    echo "<th>View Records</th>";
                                    echo "<th>Add New Record</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['surname'] . "</td>";
                                        echo "<td>" . $row['other_names'] . "</td>";
                                        echo "<td>" . $row['faculty'] . "</td>";
                                        echo "<td>" . $row['roll_num'] . "</td>";
                                        echo "<td><button class='btn btn-primary btn-sm' onclick=\"window.location.href='../getPatientMedicalRecord/index.php?id={$row['patient_id']}'\">View Records</button></td>";
                                        echo "<td><button class='btn btn-success btn-sm' onclick=\"window.location.href='../addVitals/'\">Add New Record</button></td>";
                                        echo "</tr>";
                                    }

                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                } else {
                                    echo "<p class='col-lg-12 mt-4 text-red-500'>No patients found for this search.</p>";
                                }
                            } else {
                                // Check if a search has been made in previous sessions
                                if (isset($_SESSION['search_made']) && $_SESSION['search_made'] === true) {
                                    echo "<p class='col-lg-12 mt-4 text-red-500'>No patients found for this search.</p>";
                                }
                            }
                        ?>
                    </div>

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; RMU</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            ... <!-- Modal content for logout -->
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../assets/js/demo/chart-area-demo.js"></script>
        <script src="../assets/js/demo/chart-pie-demo.js"></script>
        
        <?php
            // Clear the session flag after displaying the search results
            unset($_SESSION['search_made']);
        ?>
    </body>

</html>
