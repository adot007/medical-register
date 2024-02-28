<?php
session_start();
$pageTitle = "Add Clinical";


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
            <h2 class="text-2xl font-semibold mb-4">Clinical Data</h2>
            <form action="./add_clinical_process.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="document_name" class="block text-gray-600">Document Name:</label>
                    <input type="text" name="document_name" id="document_name" class="form-control form-control-user mt-1" required>
                </div>

                <div class="form-group">
                    <label for="document_description" class="block text-gray-600">Document Description:</label>
                    <textarea name="document_description" id="document_description" class="form-control form-control-user mt-1" required></textarea>
                </div>

                <div class="form-group">
                    <label for="files" class="block text-gray-600">Files:</label>
                    <input type="file" name="files[]" id="files" class="form-control form-control-user mt-1" multiple>
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
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


</body>

</html>
