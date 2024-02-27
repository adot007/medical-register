<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nurse Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 text-white p-4">
    <nav>
        <span class="text-xl font-semibold">Nurse Dashboard</span>
        <!-- Add additional navigation items if needed -->
    </nav>
    </header>

    <div class="flex h-screen bg-gray-200">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 h-screen text-white">
        <div class="p-4">
        <h1 class="text-2xl font-semibold">Sidebar</h1>
        </div>

        <!-- Menu items with dropdowns -->
        <nav class="space-y-2 mt-6">
        <div class="pl-4">
            <a href="../pages/nurse_dash.php" class="block text-gray-300 hover:text-white ">Dashboard</a>
        </div>

        <div class="pl-4">
            <a href="#" class="block text-gray-300 hover:text-white">Search Patient</a>
        </div>

        <div class="pl-4">
            <a href="#" class="block text-gray-300 hover:text-white">Dashboard</a>
        </div>        

        <!-- Another Menu Item -->
        <div class="pl-4">
            <a href="#" class="block text-gray-300 hover:text-white">Settings</a>
        </div>
        </nav>

        <!-- Logout Button -->
        <div class="absolute bottom-4 left-4">
        <button class="text-gray-300 hover:text-white">Logout</button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4">
        <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6">Nurse's Dashboard</h1>
    
            <!-- Add Patient Form -->
            <button type="button" onclick="window.location.href='../pages/add_patient.php'" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Add Patient
            </button>
            
            <br /><br />        
    
            <!-- Search Patient Form -->
            <!-- class="mb-6"-->
            <form method="GET">
                <div class="mb-4">
                    <label for="search" class="block text-gray-700 font-semibold mb-2">Search Patient:</label>
                    <input type="text" id="search" name="search" class="w-full px-3 py-2 border rounded-md">
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Search</button>
            </form>
           
        <?php
    
        include "../includes/db_conn.inc.php";
    
        // Process search
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
    
            // Query to search patient by name email, or roll number
            $sql = "SELECT * FROM patient_data WHERE first_name LIKE '%$search%' OR surname LIKE '%$search%' OR roll_num LIKE '%$search%'";
            $result = $db_conn->query($sql);
    
            // Display search results
            if($result->num_rows > 0) {
                echo "<h2 class='mt-6 text-xl font-bold mb-4'>Search Results:</h2>";
                echo "<table class='table-auto mb-8'>";
                echo "<thead><tr><th class='border px-4 py-2'>First Name</th><th class='border px-4 py-2'>Last Name</th><th class='border px-4 py-2'>Roll Number</th></tr></thead>";
                echo "<tbody>";
    
                while($row = $result->fetch_assoc()) {
                    //print_r($row);
                    echo "
                    <tr onclick=\"window.location.href='../pages/getMedicalRecord.php?id={$row['patient_id']}'\" id =". $row['patient_id'] ."><td class='border px-4 py-2'>" . $row['first_name'] . "</td><td class='border px-4 py-2'>" . $row['surname'] . "</td><td class='border px-4 py-2'>" . $row['roll_num'] . "</td></tr>";
             }
                echo "</tbody></table>";
            } else {
                echo "<p class='mt-4 text-red-500'>No patients found for this search.</p>";
            }
        }
    
        ?>
    
          
        </div>
    </main>

    </div>

</body>
</html>
