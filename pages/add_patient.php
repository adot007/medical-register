<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-200 p-6">

    <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Input data here</h2>

        <form action="../func/add_patient_process.php" method="POST">

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
                <select id="faculty" name="faculty" class="form-input mt-1 block w-full" required>
                    <option value="Staff">Staff</option>
                    <option value="Student">Student</option>
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

            <!-- Input 8 -->
            <div class="mb-4">
                <label for="first_diagnosis_date" class="block text-gray-600">First Diagnosis:</label>
                <input type="date" id="first_diagnosis_date" name="first_diagnosis_date" class="form-input mt-1 block w-full" required>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
            </div>

        </form>
    </div>

</body>


</html>
