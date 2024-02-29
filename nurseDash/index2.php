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
        <!--span class="text-xl font-semibold">Nurse Dashboard</span-->
        <!-- Add additional navigation items if needed -->
    </nav>
    </header>

    <div class="flex h-screen bg-gray-200">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 h-screen text-white">
        <div class="p-4">
        <!--h1 class="text-2xl font-semibold">Sidebar</h1-->
        </div>

        <!-- Menu items with dropdowns -->
        <nav class="space-y-2 mt-6">
        <div class="pl-4">
            <a href="../nurseDash/" class="block text-gray-300 hover:text-white ">Dashboard</a>
        </div><br>

        <div class="pl-4">
            <a href="../nurseDash/#" class="block text-gray-300 hover:text-white">Search Patient</a>
        </div><br>

        <div class="pl-4">
            <a href="../getAllPatients/" class="block text-gray-300 hover:text-white">View Patients</a>
        </div><br>

        <div class="pl-4">
            <a href="#" class="block text-gray-300 hover:text-white">Settings</a>
        </div>
        </nav>

        <!-- Logout Button -->
        <div class="absolute bottom-4 left-4">
        <button onclick="window.location.href= '../logout/' " 
            class="bg-red-500 text-white px-4 py-2 rounded">
            Logout
        </button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4">
        <div class="max-w-fit mx-auto bg-white p-8 rounded-md shadow-md">
            <!-- h1 class="text-2xl font-bold mb-6">Nurse's Dashboard</h1-->
    
            <!-- Add Patient Form -->
            <button type="button" onclick="window.location.href='../addPatient/'"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Add Patient
            </button>
            
            <br /><br />        
    
            <!-- Search Patient Form -->
            <!-- class="mb-6"-->
            <form method="GET">
                <div class="mb-4 ">
                    <label for="search" class="block text-gray-700 font-semibold mb-2">
                        Search Patient by Name or Roll Number:
                    </label>
                    <input type="text" id="search" name="search" class="w-full px-3 py-2 border rounded-md"
                         placeholder="Enter Name or Roll Number">
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Search</button>
            </form>
           
        <?php
    
        include "../includes/conn.inc.php";
    
        // Process search
        if(isset($_GET['search']) && $_GET['search'] != "") {
            $search = $_GET['search'];            
    
            // Query to search patient by name or roll number
            $sql = "SELECT * FROM patient_data WHERE first_name LIKE '%$search%' OR surname LIKE '%$search%' OR roll_num LIKE '%$search%'";
            $result = $conn->query($sql);
    
            // Display search results
            if($result->num_rows > 0) {
                echo "<h2 class='mt-6 text-xl font-bold mb-4'>Search Results:</h2>";
                echo "<table class='table-auto mb-6'>";
                echo "<thead><tr><th class='border px-4 py-2'>First Name</th>
                        <th class='border px-4 py-2'>Last Name</th>
                        <th class='border px-4 py-2'>Other Names</th>
                        <th class='border px-4 py-2'>Faculty</th>
                        <th class='border px-4 py-2'>Roll Number</th>
                        <th class='border px-4 py-2'>View Records</th>
                        <th class='border px-4 py-2'>Add New Record</th></tr></thead>";
                echo "<tbody>";
    
                while($row = $result->fetch_assoc()) {
                    //var_dump($row);
                    echo "<tr id =". $row['patient_id'] ." class=' hover:bg-gray-100'>
                            <td class='border px-4 py-2'>" . $row['first_name'] . "</td>
                            <td class='border px-4 py-2'>" . $row['surname'] . "</td>
                            <td class='border px-4 py-2'>" . $row['other_names'] . "</td>
                            <td class='border px-4 py-2'>" . $row['faculty'] . "</td>
                            <td class='border px-4 py-2'>" . $row['roll_num'] . "</td>
                            <td class='border px-4 py-2'>" . "<button class='bg-blue-500 text-white px-4 py-2 rounded' onclick=\"window.location.href='../getPatientMedicalRecord/index.php?id={$row['patient_id']}'\">"."View Records"."</button>" . "</td>
                            <td class='border px-4 py-2'>" . "<button class='bg-green-500 text-white px-4 py-2 rounded' onclick=\"window.location.href='window.location.href='../addDiagnosis/'\">"."Add New Record"."</button>" . "</td></tr>";
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


