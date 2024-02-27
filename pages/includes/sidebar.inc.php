<?php
// sidebar.php

function generateSidebar() {
    // Your PHP logic can go here, if needed
    ?>

   
        <!-- Sidebar -->
    <aside class="flex-initial w-64 sticky bg-gray-800 h-screen text-white p-4">

        <!-- Menu items with dropdowns -->
        <nav class="space-y-2 mt-6">
            <a href="../pages/nurse_dash.php" class="block text-gray-300 hover:text-white">Dashboard</a>
            <a href="#" class="block text-gray-300 hover:text-white">Search Patient</a>
            <a href="../pages/getAllMedicalRecord.php" class="block text-gray-300 hover:text-white">View Patients</a>
            <a href="#" class="block text-gray-300 hover:text-white">Settings</a>
        </nav>

        <!-- Logout Button -->
        <div class="absolute bottom-4 left-4">
            <button onclick="window.location.href=\'../includes/logout.inc.php\' " class="text-gray-300 hover:text-white">Logout</button>
        </div>
    </aside>


    <?php
}

// End of sidebar.php
?>
