<?php     $pageTitle = "Records";
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
                // Include the search bar
                include("../partials/search.php");
            ?>
        <!-- Topbar Navbar -->
        <?php  
include("../partials/navbar.php") ;
?>
       
    </nav>

            <!-- Logout Button -->
           <!-- <div class="absolute bottom-4 left-4">
            <button onclick="window.location.href= '../logout/' " 
                class="bg-red-500 text-white px-4 py-2 rounded"">
                Logout
            </button>
            </div>-->
        </aside>

        <main class="flex-1 p-4">
                    <h2 class='mt-6 text-xl font-bold mb-4'>Patient Records:</h2>

                    <?php
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $query = "SELECT patient_id, first_name, surname, first_visit, roll_num, faculty, relation from patient_data";

                    $result = $conn->query($query);

                    if ($result && $result->num_rows > 0) {
                        // Display the search results if available
                        echo "<div class='h-full overflow-y-scroll mx-auto w-3/4 bg-white p-4 shadow-md rounded mt-4'>";
                        echo "<table class='table-auto mb-8'>";
                        echo "<thead><tr><th class='border px-4 py-2'>First Name</th>
                                <th class='border px-4 py-2'>Last Name</th>
                                <th class='border px-4 py-2'>First Visit</th>
                                <th class='border px-4 py-2'>Roll Number</th>
                                <th class='border px-4 py-2'>Faculty</th>
                                <th class='border px-4 py-2'>Relation</th></tr></thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr id=" . $row['patient_id'] . " ><td class='border px-4 py-2'>" . $row['first_name'] . "</td>
                                    <td class='border px-4 py-2'>" . $row['surname'] . "</td>
                                    <td class='border px-4 py-2'>" . $row['first_visit'] . "</td>
                                    <td class='border px-4 py-2'>" . $row['roll_num'] . "</td>
                                    <td class='border px-4 py-2'>" . $row['faculty'] . "</td>
                                    <td class='border px-4 py-2'>" . $row['relation'] . "</td></tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";

        // Free the result set
        $result->free();
        } else {
        // Display the error message
        echo "Error executing query: " . $conn->error;
        }

        ?>
    </main>

    </div>
        </div>
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

     <!-- Custom script for modal -->
     <!-- <script>
        $(document).ready(function () {
            // Show modal on search button click
            $('#searchButton').click(function () {
                $('#searchModal').modal('show');
            });
        });
    </script>

    
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Results</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                  
                    <p>No records found.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->


</body>
</html>