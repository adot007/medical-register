<!--GET all medical records -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/eurostile" rel="stylesheet">
    <title>View All Patients</title>
</head>

<body class="bg-gray-200">

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
                class="bg-red-500 text-white px-4 py-2 rounded"">
                Logout
            </button>
            </div>
        </aside>

    <main class="flex-1 p-4">
    <h2 class='mt-6 text-xl font-bold mb-4'>Patient Records:</h2>
        
        <?php

        include "../includes/db_conn.inc.php";

        // Check connection
        if ($db_conn->connect_error) {
            die("Connection failed: " . $db_conn->connect_error);
        }  

        $query = "SELECT patient_id, first_name, surname, first_visit, roll_num, faculty, relation from patient_data";

        //print_r($query);

        $result = $db_conn->query($query);

        //var_dump($result);  

        if ($result) {
       

        if($result->num_rows > 0)
            // Process the results here
            echo "";
            echo "<div class='h-full overflow-y-scroll mx-auto w-3/4 bg-white p-4 shadow-md rounded mt-4'>";
            echo "<table class='table-auto mb-8'>";
            echo "<thead><tr><th class='border px-4 py-2'>First Name</th>
                    <th class='border px-4 py-2'>Last Name</th>
                    <th class='border px-4 py-2'>First Visit</th>
                    <th class='border px-4 py-2'>Roll Number</th>
                    <th class='border px-4 py-2'>Faculty</th>
                    <th class='border px-4 py-2'>Relation</th></tr></thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
            // Process each row of the result set
            //var_dump($row);
            
            echo "<tr id=".$row['patient_id']." ><td class='border px-4 py-2'>". $row['first_name']."</td>
                    <td class='border px-4 py-2'>". $row['surname']."</td>
                    <td class='border px-4 py-2'>". $row['first_visit']."</td>
                    <td class='border px-4 py-2'>". $row['roll_num']."</td>
                    <td class='border px-4 py-2'>". $row['faculty']."</td>
                    <td class='border px-4 py-2'>". $row['relation']."</td></tr>";
            }

            echo "</tbody>";
            echo "</div>";

        // Free the result set
        $result->free();
        } else {
        // Display the error message
        echo "Error executing query: " . $db_conn->error;
        }

        ?>
    </main>

</div>

</body>
</html>