<?php
session_start();

include '../includes/conn.inc.php';

// Check if patient_id is set
if (isset($_SESSION['current_patient_id'])) {
    $patient_id = $_SESSION['current_patient_id'];
} else {
    // Handle the case when patient ID is not found in the session
    exit("Error: Patient ID not found in session.");
}

// Retrieve the patient ID from the session variable
// $patient_id = $_SESSION['current_patient_id'];


// Retrieve patient ID from the form
// $patient_id = $_POST['patient_id'];

if (!is_numeric($patient_id)) {
    exit("Error: Invalid patient ID.");
}

// Prepare and execute the SQL statement to insert into appointments table
$sql = "INSERT INTO appointments (patient_id, arrival_time) VALUES (?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $patient_id); // Assuming patient_id is an integer
$result = $stmt->execute();

if ($result) {
    echo "<script>alert('Patient Appointment added successfully'); window.location='../nurseDash/';</script>";
} else {
    echo "Error adding patient to appointments: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
