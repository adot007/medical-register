<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<?php 
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Your Logo
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="../dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li >
            <a href="../../admin/addStaff/">
              <i class="nc-icon nc-single-02"></i>
              <p>Add Staff</p>
            </a>
          </li>
          <li>
            <a href="../../admin/viewStaff/">
              <i class="nc-icon nc-badge"></i>
              <p>View Staff Details</p>
            </a>
          </li>
          <li class="active">
            <a href="../../admin/updateStaff/">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Edit Staff Details</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Admin Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="../../pages/logout/">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <!--h3 class="description">Your content here</h3-->
            <section class="p-4">
                <?php
                // Fetch staff details from the database based on the staff_id parameter
                
                if(!isset($_GET['id'])){
                    $staff_id = NULL;
                } else {
                    $staff_id = $_GET['id'];
                }
               
                include ".././db_conn.inc.php";

                $sql = "SELECT * FROM staff_data WHERE staff_id = $staff_id";
                $result = $db_conn->query($sql);
            

                if ($result !== false && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    // Display the update form with current data
                    
                    echo "<form action='update_staff_process.php' method='post' class='max-w-md mx-auto p-6 bg-white rounded-md shadow-md'>";
                    echo "<input type='hidden' name='staff_id' value='" . $row['staff_id'] . "'>";
                    
                    // First Name
                    echo "<div class='mb-4'>";
                    echo "<label for='first_name' class='block text-gray-700 text-sm font-bold mb-2'>First Name:</label>";
                    echo "<input type='text' name='first_name' value='" . $row['first_name'] . "' class='border rounded w-full py-2 px-3'>";
                    echo "</div>";
                    
                    // Surname
                    echo "<div class='mb-4'>";
                    echo "<label for='surname' class='block text-gray-700 text-sm font-bold mb-2'>Surname:</label>";
                    echo "<input type='text' name='last_name' value='" . $row['last_name'] . "' class='border rounded w-full py-2 px-3'>";
                    echo "</div>";
                    
                    // Email
                    echo "<div class='mb-4'>";
                    echo "<label for='email' class='block text-gray-700 text-sm font-bold mb-2'>Email:</label>";
                    echo "<input type='email' name='email' value='" . $row['email'] . "' class='border rounded w-full py-2 px-3'>";
                    echo "</div>";
                    
                    // Role
                    echo "<div class='mb-4'>";
                    echo "<label for='role' class='block text-gray-700 text-sm font-bold mb-2'>Role:</label>";
                    echo "<select name='role' class='border rounded w-full py-2 px-3'>";
                    echo "<option value='doctor' " . ($row['role'] == 'doctor' ? 'selected' : '') . ">Doctor</option>";
                    echo "<option value='nurse' " . ($row['role'] == 'nurse' ? 'selected' : '') . ">Nurse</option>";
                    echo "<option value='nurse' " . ($row['role'] == 'admin' ? 'selected' : '') . ">Admin</option>";
                    echo "</select>";
                    echo "</div>";        
                    
                    // Submit Button
                    echo "<div class='text-center'>";
                    echo "<button type='submit' class='bg-blue-500 text-white px-4 py-2 rounded'>Update Staff</button>";
                    echo "</div>";
                    
                    echo "</form>";
                
                    
                } else {
                    echo "Staff not found";
                }

                $db_conn->close();
                ?>
            </section>

          </div>
        </div>
      </div>
      <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © 2020, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>





