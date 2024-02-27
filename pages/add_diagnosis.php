<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Diagnosis Form</title>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Diagnosis Form</h2>
        <form action="../func/add_diagnosis_process.php" method="post" enctype="multipart/form-data">


             <div class="mb-4">
                <label for="patient_id" class="block text-sm font-medium text-gray-600">Patient ID:</label>
                <input type="text" name="patient_id" id="patient_id" readonly
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="patient_name" class="block text-sm font-medium text-gray-600">Patient Name:</label>
                <input type="text" name="patient_name" id="patient_name" readonly
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea name="description" id="description"
                    class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                <label for="diagnosis_date" class="block text-sm font-medium text-gray-600">Date of diagnosis:</label>
                <input type="date" id="diagnosis_date" name="diagnosis_date" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="flex">
                <!-- Original button -->
                <!--input type="button" formaction="../pages/add_clinical.php" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600
                         focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Add Clinical Files
                </input> -->
                <input type="button" onclick="window.location.href='../pages/add_clinical.php'" value="Add Clinical Files"
                 class="cursor-pointer bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none 
                    focus:shadow-outline-blue active:bg-blue-800">


                <!-- New button (similar style) -->
                <button type="submit" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 
                    focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Submit
                </button>
            </div>

        </form>
    </div>
    <?php include '../includes/footer.inc.php' ?>

</body>

</html>
