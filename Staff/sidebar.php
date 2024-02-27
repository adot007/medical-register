
<?php
// Start or resume a session
session_start();


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: logout.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

    <!-- Sidebar -->
    <div id="sidebar" class="fixed h-full bg-gray-800 text-white w-64 p-4 transform -translate-x-full transition-transform ease-in-out duration-300">
        <div class="flex justify-between mb-4">
            <div>
                <button id="closeSidebar" class="text-white focus:outline-none text-lg">&times;</button>
                <div class="mt-4 text-center">
                    <span class="text-gray-400 text-lg">Admin Dashboard</span>
                </div>
            </div>
            <div>
                <button id="openDropdown" class="text-white focus:outline-none"></button>
            </div>
        </div>
        <ul>
            <li class="mb-2">
                <a href="admin_dashboard.php" class="block text-white">Home</a>
            </li>
            <li class="mb-2">
                <div class="relative">
                    <button id="dropdownBtn" class="flex items-center focus:outline-none">
                        <span class="mr-2">Manage Staff</span>
                    </button>
                    <div class="absolute left-0 mt-2 hidden bg-gray-700 p-2 w-48 rounded z-10">
                        <a href="add_staff.php" class="block text-white">Add Staff</a>
                        <a href="view_staff.php" class="block text-white">View Staff</a>
                        
                    </div>
                </div>
            </li>
            <!-- Additional dropdown option with contents below -->
            <li class="mb-2">
                <div class="relative">
                    <button id="newDropdownBtn" class="flex items-center focus:outline-none">
                        <span class="mr-2">Manage Patients</span>
                    </button>
                    <div class="absolute left-0 top-full mt-2 hidden bg-gray-700 p-2 w-48 rounded z-10">
                        <a href="../pages/getAllPatients.php" class="block text-white">View All Patient</a>
                        <a href="../pages/getAllRecords.php" class="block text-white">View Medical Records</a>
                        
                    </div>
                </div>
            </li>
        </ul>
        <div class="absolute bottom-0 mb-4">
            <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
        </div>
    </div>

    <button id="openSidebar" class="text-lg fixed left-0 top-0 m-4">&#9776;</button>
    <div class="text-center">
        <!-- Your main content goes here -->



        
    </div>

    <script>
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        openSidebarBtn.addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
            openSidebarBtn.style.display = 'none';
            closeSidebarBtn.style.display = 'block';
        });

        closeSidebarBtn.addEventListener('click', function() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            openSidebarBtn.style.display = 'block';
            closeSidebarBtn.style.display = 'none';
        });

        // Logic for the first dropdown
        const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownContent = document.querySelector('.absolute.left-0');

        dropdownBtn.addEventListener('click', function() {
            dropdownContent.classList.toggle('hidden');
        });

        // Logic for the new dropdown
        const newDropdownBtn = document.getElementById('newDropdownBtn');
        const newDropdownContent = document.querySelector('.absolute.left-0.top-full');

        newDropdownBtn.addEventListener('click', function() {
            newDropdownContent.classList.toggle('hidden');
        });
    </script>
</body>

</html>