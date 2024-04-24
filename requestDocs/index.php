<?php
session_start();
$pageTitle = "Additional Docs Request";
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

    <div class="col-lg-7 mx-auto mb-4">
    <div class="card border-primary shadow h-100 py-2">
        <div class="card-body">
            <h2 class="text-2xl font-semibold mb-4">Request Additional Documents</h2>
            <form action='generate_referral.php' method="post" enctype="multipart/form-data">

                <div class="form-group">
                    
                    <div class="mt-6">
                        <input type="checkbox" name="options[]" value="Medical History" id="">
                        <label for="">Medical History</label>
                    </div>
                    <div class="mt-6">
                        <input type="checkbox" name="options[]" value="Physical Exam" id="">
                        <label for="">Physical Examination</label>
                    </div>
                    <div class="mt-6">
                        <input type="checkbox" name="options[]" value="Immunization Records" id="">
                        <label for="">Immunization Records</label>
                    </div>
                    <div class="mt-6">
                        <input type="checkbox" name="options[]" value="Blood Tests" id="">
                        <label for="">Blood Tests</label>
                    </div>
                    <div class="mt-6">
                        <input type="checkbox" name="options[]" value="Urine Analysis" id="">
                        <label for="">Urine Analysis</label>
                    </div>
                    <div class="mt-6">
                        <input type="checkbox" name="options[]" value="Chest X-Ray" id="">
                        <label for="">Chest X-ray</label>
                    </div>
                    <div class="mt-6">
                        <input type="checkbox" name="options[]" value="ECG" id="">
                        <label for="">Electrocardiogram (ECG)</label>
                    </div>                    
                    
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn btn-primary btn-user btn-block">Print Request Form</button>
                </div>

            </form>
        </div>
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

<?php print_r ($_SESSION); ?>
</body>

</html>
