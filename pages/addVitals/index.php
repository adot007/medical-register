<?php
    session_start();

    print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vitals</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md">

        <form action="add_vitals_func.php" method="POST" class="space-y-4">

            <div class="form-group">
                <label for="upperBloodPressure" class="label">Blood Pressure <span class="text-gray-500">*</span> <span class="text-xs text-gray-500">Upper</span></label><br />
                <input type="number" step=".1" id="upperBloodPressure" name="upperBloodPressure" class="input w-full border-b-4 border-blue-200 leading-loose" required>
            </div><br />

            <div class="form-group">
                <label for="lowerBloodPressure" class="label">Blood Pressure <span class="text-gray-500">*</span> <span class="text-xs text-gray-500">Lower</span></label><br />
                <input type="number" step=".1" id="lowerBloodPressure" name="lowerBloodPressure" class="input w-full border-b-4 border-blue-200 leading-loose" required>
            </div><br />

            <div class="form-group">
                <label for="temperature" class="label">Temperature <span class="text-gray-500">*</span> <span class="text-xs text-gray-500">°C</span></label><br />
                <input type="number" step=".1" id="temperature" name="temperature" class="input w-full border-b-4 border-blue-200 leading-loose" required>
            </div><br />

            <!--
            <div class="form-group">
                <label for="labelName" class="label">Label Name <span class="text-gray-500">*</span></label><br />
                <input type="text" id="labelName" name="labelName" class="input w-full border-b-4 border-blue-200 leading-loose" required>
            </div><br /> -->

            <!-- Add your submit button here -->
            <!-- For example: -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>

        </form>

    </div>

</body>
</html>
