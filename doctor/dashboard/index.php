<!DOCTYPE html>
<html lang="en">
    
<head>
<?php 
    # Continue session
    session_start();

   // include '../includes/header.inc.php';
   //include '../includes/searchbox.inc.php';
?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <!-- Existing Info Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="info-card bg-white p-4 rounded-md shadow-md">
                <p>Card 1</p>
            </div>

            <div class="info-card bg-white p-4 rounded-md shadow-md">
                <p>Card 2</p>
            </div>

            <div class="info-card bg-white p-4 rounded-md shadow-md">
                <p>Card 3</p>
            </div>

            <div class="info-card bg-white p-4 rounded-md shadow-md">
                <p>Card 4</p>
            </div>

            

        <!-- Add New Patient Button 
        <button onclick="window.location.href='../pages/add_patient.php'"
            class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Add New Patient
        </button>

        Search Input -->
        <!-- input type="search" name="search" id="search"
            class="mt-4 p-2 border rounded-md w-full sm:w-auto" 

        <div class="mt-4 relative">
            <input type="search" name="search" id="search"
             class="pl-10 pr-4 p-2 border rounded-md w-full sm:w-auto focus:outline-none focus:ring focus:border-blue-300"
              placeholder="Search...">
             <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                 <i class="fas fa-search text-gray-500"></i>
            </div>
        </div>-->

        <!-- Queue of Incoming Patients -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Queue of Incoming Patients</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <!-- Example patient card, replace with actual content from the WebSocket -->
                <div class="info-card bg-white p-4 rounded-md shadow-md">Patient 1</div>
                <div class="bg-white p-4 rounded-md shadow-md">Patient 2</div>
                <div class="bg-white p-4 rounded-md shadow-md">Patient 3</div>
            </div>
        </div>
    </div>


    <?php include '../includes/footer.inc.php' ?>

</body>

</html>
