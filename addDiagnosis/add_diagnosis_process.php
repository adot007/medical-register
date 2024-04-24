<?php

  session_start();

  include '../includes/conn.inc.php';  

  if(!isset($_SESSION)){
    echo("No valid session data found.");
  } else {
      $current_patient_id = $_SESSION['current_patient_id'];
  }
  $diagnosis = $_POST['diagnosis'];
  $prescription = $_POST['prescription[]'];
  
  $notes = $_POST['notes'];
  //If the staff ID is not SET, submit as NULL to the DB; else use the staff ID'
  $staff_id = !isset($_SESSION['staff_id']) ? NULL : $_SESSION['staff_id'];

  //If the vitals ID for the current patient is not SET, submit as NULL to the DB; else use it.
  $vitals_id = !isset($_SESSION['current_patient_vitals_id']) ? NULL : $_SESSION['current_patient_vitals_id'];

  # $[] = $_POST[''];

  $sql = "INSERT INTO medical_records (patient_id, staff_id, vitals_id, diagnosis, prescription, notes)
        VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
  mysqli_stmt_bind_param($stmt, "ssssss", $current_patient_id, $staff_id, $vitals_id, $diagnosis, $prescription, $notes);

  if (mysqli_stmt_execute($stmt)) {
    echo '<script>alert("Details submitted successfully")</script>';  

    if (isset($_POST['goToDocReq'])) {
            header('location: ../requestDocs');
            exit(); // Ensure script stops execution after redirection
        } elseif (isset($_POST['goToNurseDash'])) {
            header('location: ../nurseDash/');
            exit(); // Ensure script stops execution after redirection
        }
    } else {
        echo "Error executing SQL statement: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing SQL statement: " . mysqli_error($conn);
}

// Close connection after usage
mysqli_close($conn);
