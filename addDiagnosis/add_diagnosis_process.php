<?php

  session_start();

  include '../includes/conn.inc.php';  

  if(!isset($_SESSION)){
    echo("No valid session data found.");
  } else {
      $current_patient_id = $_SESSION['current_patient_id'];
  }
  $diagnosis = $_POST['diagnosis'];
  $prescription = $_POST['prescription'];
  $frequency = $_POST['frequency'];
  $duration = $_POST['duration'];
  $notes = $_POST['notes'];
  //If the staff ID is not SET, submit as NULL to the DB; else use the staff ID'
  $staff_id = !isset($_SESSION['staff_id']) ? NULL : $_SESSION['staff_id'];

  //If the vitals ID for the current patient is not SET, submit as NULL to the DB; else use it.
  $vitals_id = !isset($_SESSION['current_patient_vitals_id']) ? NULL : $_SESSION['current_patient_vitals_id'];

  # $[] = $_POST[''];

  $sql = "INSERT INTO medical_records (patient_id, staff_id, vitals_id, diagnosis, prescription, notes, frequency, duration)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param($stmt, "ssssssss", $current_patient_id, $staff_id, $vitals_id, $diagnosis, $prescription, $notes, $frequency, $duration);

  mysqli_execute($stmt);
  
  if(!isset($_POST)){
    die("Error submitting details. Please try again.");
  } else {
    echo('<script>alert("Details submitted successfully")</script>');

    if(isset($_POST['goToClinical'])){
      header ('location: ../addClinicals');
    } elseif (isset($_POST['goToNurseDash'])){
      header ('location: /medical/');
    }
  }