<?php   
 //   include '../includes/header.inc.php';
 session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

</head>

<body class="bg-gray-200 p-6">

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

    <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Input data here</h2>

        <form name="addPatient" action="./add_patient_process.php" method="POST">

            <!-- Input 1 -->
            <div class="mb-4">
                <label for="first_name" class="block text-gray-600">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-input mt-1 block w-full" required>
            </div>

            <!-- Input 2 -->
            <div class="mb-4">
                <label for="surname" class="block text-gray-600">Surname:</label>
                <input type="text" id="surname" name="surname" class="form-input mt-1 block w-full" required>
            </div>

            <!-- Repeat the pattern for Input 3 to Input 8 -->

            <!-- Input 3 -->
            <div class="mb-4">
                <label for="other_names" class="block text-gray-600">Other Names:</label>
                <input type="text" id="other_names" name="other_names" class="form-input mt-1 block w-full" >
            </div>

            <!-- Input 4 -->
            <div class="mb-4">
                <label for="d_o_b" class="block text-gray-600">Date of Birth:</label>
                <input type="date" id="d_o_b" name="d_o_b" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="faculty" class="block text-gray-600">Faculty:</label>
                <select id="faculty" name="faculty" class="form-input mt-1 block w-full" 
                onchange="showSecondDropdown()" required>
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>

            <div id="relationDropdownContainer" class="mb-4 hidden">
                <label for="relation" class="block text-gray-600">Relation:</label>
                <select id="relation" name="relation" class="form-input mt-1 block w-full" required>
                    <option value="Self">Self</option>
                    <option value="Spouse">Spouse</option>
                    <option value="Ward">Ward</option>
                </select>
            </div>

            <!-- Input 5 -->
            <div class="mb-4">
                <label for="roll_num" class="block text-gray-600">Roll Number:</label>
                <input type="text" id="roll_num" name="roll_num" class="form-input mt-1 block w-full" required>
            </div>

            <!-- Input 6 -->
            <div class="mb-4">
                <label for="department" class="block text-gray-600">Department:</label>
                <select id="department" name="department" class="form-input mt-1 block w-full" required>
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

            <!-- Input 7 -->
            <div class="mb-4">
                <label for="gender" class="block text-gray-600">Gender:</label>
                <select id="gender" name="gender" class="form-input mt-1 block w-full" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
            </div>

        </form>
    </div>

</body>



</html>
