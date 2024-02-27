<?php

    include '../includes/db_conn.inc.php';  

    $patient_id = $_POST['patient_id'];
    $description = $_POST['description'];
    $date = $_POST['diagnosis_date'];
     # $[] = $_POST[''];

  $sql = "INSERT INTO diagnosis_data (patient_id, description, diagnosis_date)
          VALUES(?, ?, ?);";

  $stmt = mysqli_prepare($db_conn, $sql);

  mysqli_stmt_bind_param($stmt, "sss", $patient_data, $description, $date);

  mysqli_execute($stmt);
  
  if(!isset($_POST)){
    die("Error submitting details. Please try again.");
  } else {
    echo('<script>alert("Details submitted successfully")</script>');
  }