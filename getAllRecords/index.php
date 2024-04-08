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
    <?php 
       // include "../includes/conn.inc.php";

        $query = "SELECT patient_data.first_name, patient_data.surname, patient_data.first_visit,
                 medical_records.visit_date, medical_records.diagnosis, medical_records.prescription 
                 FROM patient_data 
                 LEFT JOIN medical_records ON patient_data.patient_id = medical_records.patient_id 
                 ORDER BY medical_records.visit_date DESC;"; 

        $result = $conn->query($query);

        if($result){

            echo "<h2 class='mt-6 text-xl font-bold mb-4'>Medical Records:</h2>";
            echo "<div class='mx-auto w-3/4 bg-white p-4 shadow-md rounded mt-4'>";
            echo "<table class='table-auto mb-8'>";
            echo "<thead><tr><th class='border px-4 py-2'>First Name</th>
                    <th class='border px-4 py-2'>Last Name</th>
                    <th class='border px-4 py-2'>First Visit</th>
                    <th class='border px-4 py-2'>Visit Date</th>
                    <th class='border px-4 py-2'>Diagnosis</th>
                    <th class='border px-4 py-2'>Prescription</th></tr></thead>";
            echo "<tbody>";

                while ($row = $result->fetch_assoc()){
                    //var_dump($row);
                    echo "<tr><td class='border px-4 py-2'>". $row['first_name']."</td>
                    <td class='border px-4 py-2'>". $row['surname']."</td>
                    <td class='border px-4 py-2'>". $row['first_visit']."</td>
                    <td class='border px-4 py-2'>". $row['visit_date']."</td>
                    <td class='border px-4 py-2'>". $row['diagnosis']."</td>
                    <td class='border px-4 py-2'>". $row['prescription']."</td></tr>";
                 }

         echo "</div>";
            
        }
    ?>
    
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