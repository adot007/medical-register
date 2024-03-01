<?php
    session_start();
    $pageTitle = "Patient Visit Details";
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
        

            <?php
            


                //This ID is the id of the patient record selected in the getPatientMedicalRecord page.
                // echo $_GET['id'];
               $selected_patient_record = !isset($_GET['id']) ? '': $_GET['id'];

                //If the selected patient record has been selected/exists, fetch its details from the database
                 if($selected_patient_record){
                    $sqlQuery = "SELECT patient_data.first_name, patient_data.surname, patient_data.other_names, 
                                        medical_records.visit_date, medical_records.diagnosis, medical_records.prescription,
                                        patient_vitals.temperature, patient_vitals.bp_upper, patient_vitals.bp_lower,
                                        staff_data.first_name AS staff_first_name, staff_data.last_name AS staff_last_name        
                                FROM `medical_records`
                                LEFT JOIN `patient_data`
                                ON medical_records.patient_id = patient_data.patient_id
                                LEFT JOIN `patient_vitals`
                                ON medical_records.vitals_id = patient_vitals.vitals_id
                                LEFT JOIN `staff_data`
                                ON medical_records.staff_id = staff_data.staff_id
                                WHERE record_id = {$selected_patient_record}";

                    $sqlResult = mysqli_query($conn, $sqlQuery) ;

                    if($sqlResult -> num_rows > 0){

                        echo "<div class='col-lg-12'>";
                        echo "<div class='card shadow mb-4'>";
                        echo "<div class='card-header py-3'>";
                        echo "<h6 class='m-0 font-weight-bold text-primary'>Search Results</h6>";
                        echo "</div>";
                        echo "<div class='card-body'>";
                        echo "<div class='table-responsive'>";
                        

                        while($row = mysqli_fetch_assoc($sqlResult)) {
                            var_dump ($row);
                        }
                    } else {
                        echo "<div class='col-lg-12'>";
                        echo "<div class='card shadow mb-4'>";
                        echo "<div class='card-header py-3'>";
                        echo "<h6 class='m-0 font-weight-bold text-primary'>Search Results</h6>";
                        echo "</div>";
                        echo "<div class='card-body'>";
                        echo "<div class='table-responsive'>";
                        echo "<h6 class='m-0 font-weight-bold '>No results found for this user!</h6>";
                        echo "</div>";
                        echo "</div>";

                    }
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