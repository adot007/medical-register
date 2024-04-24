<?php
session_start();
$_SESSION['$current_patient_id'] = '';

include '../includes/conn.inc.php';

// Check if all required fields are present in the POST data
$requiredFields = ['first_name', 'surname', 'other_names', 'd_o_b', 'faculty', 'roll_num', 'department', 'gender'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field])) {
        echo "There are errors with the form you are submitting. Please check and try again!";
        exit(); // Stop further execution
    }
}

// Retrieve data from POST
$first_name = $_POST['first_name'];
$surname = $_POST['surname'];
$other_names = $_POST['other_names'];
$date_of_birth = $_POST['d_o_b'];
$faculty = $_POST['faculty'];
$relation = isset($_POST['relation']) ? $_POST['relation'] : "Self";
$roll_num = $_POST['roll_num'];
$department = $_POST['department'];
$gender = $_POST['gender'];

// Check which submit button was clicked and redirect accordingly
if (isset($_POST['submit_vitals'])) {
    // Prepare and execute statement for patient data submission
    $sql = "INSERT INTO patient_data (first_name, surname, other_names, d_o_b, faculty, relation, roll_num, department, gender)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $first_name, $surname, $other_names, $date_of_birth, $faculty, $relation, $roll_num, $department, $gender);
    $result = $stmt->execute();

    if ($result) {
        // Data submitted successfully
        echo "<script>alert(\"Data submitted successfully!\")</script>";
        
        // Retrieve patient ID from the database
        $patient_id = $conn->insert_id;

        // Store patient ID in session
        $_SESSION['current_patient_id'] = $patient_id;

        // Close the statement
        $stmt->close();

        // Redirect to add vitals page
        header('Location: ../addVitals/');
        exit(); // Stop further execution

    } else {
        echo "Error executing statement: " . $stmt->error;
    }

} elseif (isset($_POST['submit_appointments'])) {

    // Prepare and execute statement for patient data submission
    $sql = "INSERT INTO patient_data (first_name, surname, other_names, d_o_b, faculty, relation, roll_num, department, gender)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $first_name, $surname, $other_names, $date_of_birth, $faculty, $relation, $roll_num, $department, $gender);
    $result = $stmt->execute();

    if ($result) {
    // Data submitted successfully
    echo "<script>alert(\"Data submitted successfully!\")</script>";

    // Retrieve patient ID from the database
    $patient_id = $conn->insert_id;

    // Store patient ID in session
    $_SESSION['current_patient_id'] = $patient_id;

    // Close the statement
    $stmt->close();
    
    }

    // Check if current patient ID is set in session
    if (!isset($_SESSION['current_patient_id'])) {
        echo "Error: Current patient ID is not set in session.";
        exit(); // Stop further execution
    }

    // Get the current patient ID from session
    $current_patient_id = $_SESSION['current_patient_id'];

    // Prepare and execute statement for setting appointment
    $sql = "INSERT INTO appointments (patient_id) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $current_patient_id);
    $result = $stmt->execute();

    if ($result) {
        echo "<alert>Appointment has been set for this patient...</alert>";
    } else {
        echo "Error setting appointment: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Redirect to nurse dashboard
    header('Location: ../nurseDash/');
    exit(); // Stop further execution
}

// Close the database connection
$conn->close();
