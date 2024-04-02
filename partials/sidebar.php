 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIDEBAR</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php
    if(isset($_SESSION['role']) && $_SESSION['role'] == "nurse"){
        echo "<li class='nav-item active'>";
        echo "<a class='nav-link' href='../nurseDash/'>";        
        echo "<span>Dashboard</span></a>";
        echo "</li>";
    } elseif(isset($_SESSION["role"]) && $_SESSION["role"] == "doctor"){
        echo "<li class='nav-item active'>";
        echo "<a class='nav-link' href='../docDash/'>";        
        echo "<span>Dashboard</span></a>";
        echo "</li>";
    } elseif(isset($_SESSION["role"]) && $_SESSION["role"] == "admin"){
        echo "<li class='nav-item active'>";
        echo "<a class='nav-link' href='../admin/'>";        
        echo "<span>Dashboard</span></a>";
        echo "</li>";
    }
?>


<!-- Divider -->
<hr class="sidebar-divider">


<!-- Heading 
<div class="sidebar-heading">
    Interface
</div>-->

<!-- Nav Item - Pages Collapse Menu 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li>-->

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-folder"></i>
                <span>Records</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Records:</h6>
            <a class="collapse-item" href="/medical-register/getAllPatients/">All Patients</a>
            <a class="collapse-item" href="/medical-register/getAllRecords/">All Records</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading 
<div class="sidebar-heading">
    Addons
</div>-->

<!-- Nav Item - Pages Collapse Menu 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>-->

<!-- Nav Item - Charts 
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>-->

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-table"></i>
        <span>Doctors Queue</span></a>
</li>

<!-- Divider 
<hr class="sidebar-divider d-none d-md-block">-->

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<div class="text-center d-none d-md-inline mt-4">
    <button onclick="window.location.href= '../logout/' " class="btn btn-danger btn-sm">
        Logout 
    </button>
</div>

</ul>