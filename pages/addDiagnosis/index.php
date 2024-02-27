<?php 
session_start();

include '../includes/db_conn.inc.php';
//var_dump($_SESSION);

if(isset($_SESSION['current_patient_id'])){
    $current_patient_id = $_SESSION['current_patient_id'];
} elseif (isset($_SESSION['searched_patient_id'])){
    $current_patient_id = $_SESSION['searched_patient_id'];
};

if(isset($current_patient_id)){
   // $current_patient_id = $_SESSION['current_patient_id'];

     // Prepare and execute the SQL query 
   
     $sql = "SELECT first_name, surname FROM patient_data WHERE patient_id = ?";
     $stmt = $db_conn->prepare($sql);
     $stmt->bind_param("i", $current_patient_id);
     $stmt->execute();
     $stmt->bind_result($firstName, $lastName);
 
     // Fetch the results
     if ($stmt->fetch()) {
         // Display the patient's first name and last name
       //  echo "Patient ID: $current_patient_id<br>";
        // echo "First Name: $firstName<br>";
        // echo "Last Name: $lastName<br>";
         $fullName = $firstName;
         $fullName .= " "; 
         $fullName .= $lastName;
         //echo "Full Name: {$fullName}<br>";

        // Close the statement and connection
        $stmt->close();
     } else {
        
         echo "Patient not found.";

     } 
    } else {
        // If the patient ID is not set in the session, handle accordingly
        $fullName = "No patient selected...";
        echo "Patient ID not found in the session.";

    }

    $drugListSql = "SELECT DISTINCT drug FROM medicine_list ORDER BY drug ASC";
    $drugListResult = $db_conn->query($drugListSql);

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Diagnosis Form</title>
</head>

<body class="bg-gray-100">

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

        <!-- Main Content -->
        <main class="flex-1 p-4">
            <div class="max-w-fit mx-auto bg-white p-8 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-6">Add New Record</h2>
                <form action="./add_diagnosis_process.php" method="post" enctype="multipart/form-data">            

                    <div class="mb-4">
                        <label for="patient_name" class="block text-sm font-medium text-gray-600">Patient Name:</label>
                        <input type="text" name="patient_name" id="patient_name" readonly
                            class="mt-1 p-2 w-full border rounded-md" value="<?php echo $fullName; ?>" >
                    </div>
                    
                    <div class="mb-4">
                        <label for="diagnosis" class="block text-sm font-medium text-gray-600">Diagnosis:</label>
                        <textarea name="diagnosis" id="diagnosis" class="mt-1 p-2 w-full border rounded-md" required></textarea>
                    </div>

                    <!--div class="mb-4">
                        <label for="prescription" class="block text-sm font-medium text-gray-600">Prescription:</label>
                        <select name="drug" id="drugSelect">
                            <?php
                            // Check if there are results
                          //  if ($drugListResult->num_rows > 0) {
                                // Output data of each row
                            //    while ($row = $drugListResult->fetch_assoc()) {
                              //      echo "<option value=\"" . $row["drug"] . "\">" . $row["drug"] . "</option>";
                              //  }
                           // } else {
                             //   echo "<option value=\"\">No drugs available</option>";
                           // }
                            ?>
                        </select>
                        <textarea name="prescription" id="prescription" class="mt-1 p-2 w-full border rounded-md" required></textarea>
                    </div-->

                    <div class="mb-4">
                        <label for="prescription" class="block text-sm font-medium text-gray-600">Prescription:</label>
                        
                        <div class="relative inline-block w-full text-gray-700">
                            <select name="drug" id="drugSelect" class="w-full appearance-none px-4 py-2 border rounded-md">
                                <?php
                                // Check if there are results
                                if ($drugListResult->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $drugListResult->fetch_assoc()) {
                                        echo "<option value=\"" . $row["drug"] . "\">" . $row["drug"] . "</option>";
                                    }
                                } else {
                                    echo "<option value=\"\">No drugs available</option>";
                                }
                                ?>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M10 12a2 2 0 100-4 2 2 0 000 4zM17.707 4.293a1 1 0 00-1.414-1.414L10 10.586 3.707 4.293a1 1 0 00-1.414 1.414L10 12.586l7.707-7.707a1 1 0 000-1.414z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        
                        <!--textarea name="prescription" id="prescription" class="mt-1 p-2 w-full border rounded-md" required></textarea-->

                        <div id="selectedDrugs" class="mt-2"></div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const drugSelect = document.getElementById('drugSelect');
                            const prescriptionTextarea = document.getElementById('prescription');
                            const selectedDrugsDiv = document.getElementById('selectedDrugs');

                            drugSelect.addEventListener('change', function () {
                                const selectedDrug = drugSelect.value;

                                if (selectedDrug !== '') {
                                    const option = document.createElement('div');
                                    option.classList.add('inline-flex', 'items-center', 'bg-gray-200', 'rounded-full', 'px-3', 'py-1', 'mr-2', 'mb-2');
                                    option.innerHTML = `
                                        <span class="text-sm font-semibold mr-1">${selectedDrug}</span>
                                        <button type="button" class="text-xs font-semibold focus:outline-none" onclick="removeDrug(this)">X</button>
                                    `;

                                    selectedDrugsDiv.appendChild(option);
                                    prescriptionTextarea.value += selectedDrug + '\n';
                                    drugSelect.value = ''; // Reset dropdown value
                                }
                            });
                        });

                        function removeDrug(element) {
                            const drugToRemove = element.previousElementSibling.innerText.trim();
                            element.parentElement.remove();
                            
                            // Remove drug from textarea
                            const prescriptionTextarea = document.getElementById('prescription');
                            prescriptionTextarea.value = prescriptionTextarea.value.replace(drugToRemove + '\n', '');
                        }
                    </script>


                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-medium text-gray-600">Notes:</label>
                        <textarea name="notes" id="notes" class="mt-1 p-2 w-full border rounded-md"></textarea>
                    </div>

                    <div class="flex">
                        <!-- Original button -->
                        <!--input type="button" formaction="../pages/add_clinical.php" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600
                                focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Add Clinical Files
                        </input> -->
                        <input type="submit" onclick="window.location.href='../addClinicals/'" value="Add Clinical Files" name="goToClinical"
                        class="cursor-pointer bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none 
                            focus:shadow-outline-blue active:bg-blue-800">


                        <!-- New button (similar style) -->
                        <button type="submit" onclick="window.location.href='../nurseDash/'" name="goToNurseDash" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 
                            focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
            <!-- ?php include '../includes/footer.inc.php' ?-->
        </main>

    </div>                

</body>

</html>
