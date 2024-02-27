

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Database</title>
</head>
<body>
    <form method="POST" action = "../js/blank.inc.php">
            <div class="mb-4">
                <label for="search" class="block text-gray-700 font-semibold mb-2">Search Patient:</label>
                <input type="text" id="search" name="search" class="w-full px-3 py-2 border rounded-md">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Search</button>
    </form>
</body>
</html>

"SELECT patient_data.patient_id, patient_data.first_name, patient_data.surname, patient_data.first_visit,
             medical_records.visit_date, medical_records.diagnosis, medical_records.prescription 
            FROM patient_data 
            LEFT JOIN medical_records ON patient_data.patient_id = medical_records.patient_id 
            ORDER BY medical_records.visit_date DESC;"; 