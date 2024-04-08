<?php   
    //   include '../includes/header.inc.php';
     session_start();
    
     $patient_id = null;
// Retrieve patient ID from a session variable if it's already set
if (isset($_SESSION['current_patient_id'])) {
    $patient_id = $_SESSION['current_patient_id'];
} 
// else {
//     // Display an error message
//     echo "Patient ID not found.";
//     // You can also redirect the user to another page using header function
//     // header("Location: error_page.php");
//     exit(); 
// }
    $pageTitle = "Add Patient";
?>

<!DOCTYPE html>
<html lang="en">
<?php  
include("../partials/head.php") ;
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php  
      include("../partials/sidebar.php") ;
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
                include("../partials/search.php") ;
            ?>

            <!-- Topbar Navbar -->
            <?php  
                include("../partials/navbar.php") ;
            ?>
        
        </nav>
        <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Patient</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


    <script>                    
        function showSecondDropdown() {
            var facultyDropdown = document.getElementById("faculty");
            var relationDropdown = document.getElementById("relationDropdownContainer");

            // Get the selected value from the first dropdown 

            var selectedValue = facultyDropdown.options[facultyDropdown.selectedIndex].value;

            // Check if the selected value is the one that triggers showing the second dropdown
            if (selectedValue === "Staff") {
                // Show the second dropdown
                relationDropdown.classList.remove("hidden");
            } else {
                // Hide the second dropdown if a different option is selected
                relationDropdown.classList.add("hidden");
            }
        }

        function checkDOB() {
        const dateOfBirth = document.getElementById('d_o_b');
        const faculty = document.getElementById('faculty').value;
        const relation = document.getElementById('relation').value;

        if (faculty === 'student') {
            const selectedDOB = new Date(dateOfBirth.value);
            const todaysDate = new Date();
            const age = Math.floor((todaysDate - selectedDOB) / (1000 * 60 * 60 * 24 * 365));

            if (age < 16) {
                alert('Please select a valid date of birth for a student.');
                dateOfBirth.focus();
                return false;
            }
        } else if (faculty === 'staff') {
            const selectedDOB = new Date(dateOfBirth.value);
            const todaysDate = new Date();
            const age = Math.floor((todaysDate - selectedDOB) / (1000 * 60 * 60 * 24 * 365));

            if (relation === 'ward' && age > 18) {
                alert('Please select a valid date of birth for a staff member related as a ward.');
                dateOfBirth.focus();
                return false;
            } else if (relation === 'spouse' && age < 18) {
                alert('Please select a valid date of birth for a staff member related as a spouse.');
                dateOfBirth.focus();
                return false;
            }
        }

        return true;

        }

        document.getElementById('faculty').addEventListener('change', checkDOB);
        document.getElementById('relation').addEventListener('change', checkDOB);
        document.getElementById('dateOfBirth').addEventListener('change', checkDOB);

    </script>


    <div class="col-lg-6 mx-auto mb-4">
        <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4">Input data here</h2>
                <form name="addPatient" action="./add_patient_process.php" method="POST">

                    <!-- Input 1 -->
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="first_name" class="block text-gray-600">First Name:</label>
                            <input type="text" id="first_name" name="first_name" class="form-control form-control-user" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="surname" class="block text-gray-600">Surname:</label>
                            <input type="text" id="surname" name="surname" class="form-control form-control-user" required>
                        </div>
                    </div>

                    <!-- Input 3 -->
                    <div class="form-group">
                        <label for="other_names" class="block text-gray-600">Other Names:</label>
                        <input type="text" id="other_names" name="other_names" class="form-control form-control-user">
                    </div>

                    <!-- Input 4 -->
                    <div class="form-group">
                        <label for="d_o_b" class="block text-gray-600">Date of Birth:</label>
                        <input type="date" id="d_o_b" name="d_o_b" class="form-control form-control-user" required>
                    </div>

                    <!-- Input 5 -->
                    <div class="form-group">
                        <label for="faculty" class="block text-gray-600">Faculty:</label>
                        <select id="faculty" name="faculty" class="form-control form-control-user" onchange="showSecondDropdown()" required>
                            <option value="Student">Student</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>

                    <!-- Input 6 -->
                    <div id="relationDropdownContainer" class="form-group hidden">
                        <label for="relation" class="block text-gray-600">Relation:</label>
                        <select id="relation" name="relation" class="form-control form-control-user" required>
                            <option value="Self">Self</option>
                            <option value="Spouse">Spouse</option>
                            <option value="Ward">Ward</option>
                        </select>
                    </div>

                    <!-- Input 7 -->
                    <div class="form-group">
                        <label for="roll_num" class="block text-gray-600">Roll Number:</label>
                        <input type="text" id="roll_num" name="roll_num" class="form-control form-control-user" required>
                    </div>

                    <!-- Input 8 -->
                    <div class="form-group">
                        <label for="department" class="block text-gray-600">Department:</label>
                        <select id="department" name="department" class="form-control form-control-user" required>
                            <optgroup label="Administrative Departments">
                                <option value="Admissions">Admissions</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="IT">IT</option>
                            </optgroup>
                            <optgroup label="Academic Departments">
                                <option value="Transport">Transport</option>
                                <option value="Engineering">Engineering</option>
                                <option value="ICT">ICT</option>
                                <option value="Nautical Science">Nautical Science</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Input 9 -->
                    <div class="form-group">
                        <label for="gender" class="block text-gray-600">Gender:</label>
                        <select id="gender" name="gender" class="form-control form-control-user" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" name="submit_vitals" class="btn btn-primary btn-user btn-block">Submit and Add to Vitals</button>
                    </div>
               

    <!-- Second Submit Button -->
    </form>
    <div class="mt-3">
    <form action="./add_to_appointments.php" method="post" id="addToAppointmentsForm">
    <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
    <!-- Other form inputs -->
    <button type="submit" name="submit_appointments" class="btn btn-primary btn-user btn-block">Submit and Add to Appointments</button>
</form>

    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToAppointmentsForm = document.forms['addToAppointments'];

        addToAppointmentsForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Submit the form data
            const formData = new FormData(addToAppointmentsForm);
            fetch(addToAppointmentsForm.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    // Form submitted successfully
                    // You can redirect or show a success message here
                    console.log('Patient added to appointments successfully');
                } else {
                    // Handle errors or display error messages
                    console.error('Error adding patient to appointments');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>


</body>



</html>
