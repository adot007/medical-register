<?php

    include '../includes/db_conn.inc.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $other_names = $_POST['other_names'];
    $date_of_birth = $_POST['d_o_b'];
    $faculty = $_POST['faculty'];
    $roll_no = $_POST['roll_no'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];
    $first_diagnosis_date = $_POST['first_diagnosis_date'];
  # $first_name = $_POST['first_name'];

    $sql = "INSERT INTO patient_data (first_name, surname, other_names, d_o_b, faculty,
                         roll_num, department, gender, first_diagnosis_date)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
                
    $stmt = mysqli_prepare($db_conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $other_names, $date_of_birth,
                           $faculty, $roll_no, $department, $gender, $first_diagnosis_date);

    mysqli_execute($stmt);                       