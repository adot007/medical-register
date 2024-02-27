<!--GET all medical records -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients Records</title>
</head>
<body>

<h2>Patient Records</h2>

<?php

    include "../includes/db_conn.inc.php";

    // Check connection
    if ($db_conn->connect_error) {
        die("Connection failed: " . $db_conn->connect_error);
    } else {
        echo "<script>alert(\"Connection successful...\")</script>";
    };

    // // Fetch and display patient records
    // $query = "SELECT patient_data.patient_id, patient_data.first_name, patient_data.surname, patient_data.first_visit,
    //          medical_records.visit_date, medical_records.diagnosis, medical_records.prescription 
    //         FROM patient_data 
    //         LEFT JOIN medical_records ON patient_data.patient_id = medical_records.patient_id 
    //         ORDER BY medical_records.visit_date DESC;"; 

    // $result = $db_conn->query($query);

    // if($result){
    //     echo "<script>alert(\"Executing query....\")</script>";   
    //     var_dump($result);
    // }

    // if ($result->num_rows > 0) {
    //     print_r($result);
    //     // echo "<table border='1'>";
    //     // echo "<tr><th>Patient ID</th><th>Patient Name</th><th>Action</th></tr>";
    //     // while ($row = $result->fetch_assoc()) {
    //     //     echo "<tr>";
    //     //     echo "<td>" . $row["patient_id"] . "</td>";
    //     //     echo "<td>" . $row["first_name"] ." ".$row["surname"]."</td>";
    //     //    // echo "<td>" . $row["surname"] . "</td>";
    //     //     echo "<td>" . $row["first_visit"] . "</td>";
    //     //     echo "<td><a href='view_patient.php?record_id=" . $row["record_id"] . "'>View Details</a></td>";
    //     //     echo "</tr>";
    //     // }
    //     // echo "</table>";
    // } else {
    //     echo "<p>No records found</p>";
    // }

   // $db_conn->close();

   // Fetch and display patient records

    // $query = "SELECT patient_data.patient_id, patient_data.first_name, patient_data.surname, patient_data.first_visit,
    // medical_records.visit_date, medical_records.diagnosis, medical_records.prescription 
    // FROM patient_data 
    // LEFT JOIN medical_records ON patient_data.patient_id = medical_records.patient_id 
    // ORDER BY medical_records.visit_date DESC;"; 

    $query = "SELECT * FROM 'patient_data';";

    print_r($query);

    $result = mysqli_execute_query($db_conn, $query);

    print_r($result);

    // $result = $db_conn->query($query);

    // if ($result) {
    // // Use server-side logging or other secure methods for displaying messages
    // error_log("Executing query....");

    // // Process the results here
    // while ($row = $result->fetch_assoc()) {
    // // Process each row of the result set
    // var_dump($row);
    // }

    // // Free the result set
    // $result->free();
    // } else {
    // // Display the error message
    // echo "Error executing query: " . $db_conn->error;
    // }

    ?>

</body>
</html>