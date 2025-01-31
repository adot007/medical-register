<?php
    // Start the session to manage user data across pages
    session_start();

    // Set the page title
    $pageTitle = "Add Record";
    
?>

<!DOCTYPE html>
<html lang="en">

<?php  
    // Include the common head section of HTML
    include("../partials/head.php");
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php  
        // Include the sidebar
        include("../partials/sidebar.php");
        // Uncomment the line below if you need to include the connection file
        // include '../includes/conn.inc.php';
        // Uncomment the line below if you want to debug session data
        // var_dump($_SESSION);

        // Check if the current patient ID is set in the session
        if(isset($_SESSION['current_patient_id'])){
            $current_patient_id = $_SESSION['current_patient_id'];
        } elseif (isset($_SESSION['searched_patient_id'])){
            $current_patient_id = $_SESSION['searched_patient_id'];
        }

        // Check if the current patient ID is set
        if(isset($current_patient_id)){
            // Prepare and execute the SQL query to fetch patient data
            $sql = "SELECT first_name, other_names, surname FROM patient_data WHERE patient_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $current_patient_id);
            $stmt->execute();
            $stmt->bind_result($firstName, $othername, $lastName);
    
            // Fetch the results
            if ($stmt->fetch()) {
                // Build the full name of the patient
                $fullName = $firstName;
                $fullName .= " ";
                if ($othername) {
                    $fullName .= $othername;
                    $fullName .= " ";
                } else {
                    $fullName .= $lastName;
                }

                // Close the statement and connection
                $stmt->close();
            } else {
                // Display an error message if the patient is not found
                echo "Patient not found.";
            } 
        } else {
            // If the patient ID is not set in the session, handle accordingly
            $fullName = "No patient selected...";
            echo "Patient ID not found in the session.";
        }

        // Query to get the distinct list of drugs from the medicine list
        $drugListSql = "SELECT DISTINCT drug FROM medicine_list ORDER BY drug ASC";
        $drugListResult = $conn->query($drugListSql);
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
                    // Include the search bar
                    include("../partials/search.php");
                ?>

                <!-- Topbar Navbar -->
                <?php  
                    // Include the navigation bar
                    include("../partials/navbar.php");
                ?>
               
            </nav>

            <!-- Main Content -->
            <main class="flex-1 p-4">
                <div class="max-w-fit mx-auto">
                    <div class="col-lg-7 mx-auto mb-4">
                        <div class="card border-primary shadow h-100 py-2">
                            <div class="card-body">
                                <h2 class="text-2xl font-semibold mb-4">Add Diagnosis</h2>
                                <form action="./add_diagnosis_process.php" method="POST" enctype="multipart/form-data">

                                    <!-- Display the patient's name -->
                                    <div class="form-group">
                                        <label for="patient_name" class="block text-gray-600">Patient Name:</label>
                                        <input type="text" name="patient_name" id="patient_name" readonly class="form-control form-control-user mt-1" value="<?php echo $fullName; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="diagnosis" class="block text-gray-600">Diagnosis:</label>
                                        <textarea name="diagnosis" id="diagnosis" class="form-control form-control-user mt-1"></textarea>
                                    </div>

                                    <div id="selectedDrugs" class="mt-2"></div>
                               

                                    <!-- Prescription selection -->
                                    <div class="form-group">
                                    <label for="prescription" class="block text-gray-600">Prescription:</label>

                                    <div class="relative inline-block w-full text-gray-700">
                                        <select name="prescription[]" id="drugSelect" class="w-full appearance-none px-4 py-2 border rounded-md">
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
                                    </div>
                                </div>
                                

                                        <!-- Display selected drugs -->
                                        <div id="selectedDrugs" class="mt-2"></div>
                                    </div>

                                    <!-- Input field for additional notes -->
                                    <div class="form-group">
                                        <label for="notes" class="block text-gray-600">Notes:</label>
                                        <textarea name="notes" id="notes" class="form-control form-control-user mt-1"></textarea>
                                    </div>

                                    <!-- Form submission buttons -->
                                    <div class="mt-6">
                                        <input type="submit" onclick="window.location.href='../requestDocs/'" value="Request Additional Documents" name="goToDocReq" class="btn btn-primary btn-user btn-block">
                                        <button type="submit" onclick="window.location.href='/medical/'" name="goToNurseDash" class="btn btn-primary btn-user btn-block mt-3">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

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

        <!-- Drug Selection Script -->
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






</body>

</html>
