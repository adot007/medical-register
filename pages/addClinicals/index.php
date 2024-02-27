<?php
session_start();
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Clinical Data</title>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Clinical Data</h2>
      
        <form action="./add_clinical_process.php" method="post" enctype="multipart/form-data">
       
            <div class="mb-4">
                <label for="document_name" class="block text-sm font-medium text-gray-600">
                    Document Name:
                </label>
                <input type="text" name="document_name" id="document_name" required
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="document_description" class="block text-sm font-medium text-gray-600">
                    Document Description:
                </label>
                <textarea name="document_description" id="document_description"
                    class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                <label for="files" class="block text-sm font-medium text-gray-600">Files:</label>
                <input type="file" name="files[]" id="files" class="mt-1 p-2 w-full border rounded-md" multiple>
            </div>

            <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Submit
            </button>
        </form>
    </div>
    <?php include '../includes/footer.inc.php' ?>

</body>

</html>
