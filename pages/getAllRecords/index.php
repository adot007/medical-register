<?php
    session_start();

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Medical Records</title>
</head>
<body class="bg-gray-200">
    <?php 
        include "../includes/db_conn.inc.php";

        $query = "SELECT patient_data.first_name, patient_data.surname, patient_data.first_visit,
                 medical_records.visit_date, medical_records.diagnosis, medical_records.prescription 
                 FROM patient_data 
                 LEFT JOIN medical_records ON patient_data.patient_id = medical_records.patient_id 
                 ORDER BY medical_records.visit_date DESC;"; 

        $result = $db_conn->query($query);

        if($result){

            echo "<h2 class='mt-6 text-xl font-bold mb-4'>Medical Records:</h2>";
            echo "<div class='mx-auto w-3/4 bg-white p-4 shadow-md rounded mt-4'>";
            echo "<table class='table-auto mb-8'>";
            echo "<thead><tr><th class='border px-4 py-2'>First Name</th>
                    <th class='border px-4 py-2'>Last Name</th>
                    <th class='border px-4 py-2'>First Visit</th>
                    <th class='border px-4 py-2'>Visit Date</th>
                    <th class='border px-4 py-2'>Diagnosis</th>
                    <th class='border px-4 py-2'>Prescription</th></tr></thead>";
            echo "<tbody>";

                while ($row = $result->fetch_assoc()){
                    //var_dump($row);
                    echo "<tr><td class='border px-4 py-2'>". $row['first_name']."</td>
                    <td class='border px-4 py-2'>". $row['surname']."</td>
                    <td class='border px-4 py-2'>". $row['first_visit']."</td>
                    <td class='border px-4 py-2'>". $row['visit_date']."</td>
                    <td class='border px-4 py-2'>". $row['diagnosis']."</td>
                    <td class='border px-4 py-2'>". $row['prescription']."</td></tr>";
                 }

         echo "</div>";
            
        }
    ?>
    
</body>
</html>