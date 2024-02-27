<?php

include '../includes/db_conn.inc.php';

##Check if data exists in POST superglobal(form)

if (
    !isset($_POST['first_name']) ||
    !isset($_POST['surname']) ||
    !isset($_POST['other_names']) ||
    !isset($_POST['d_o_b']) ||
    !isset($_POST['faculty']) ||
    !isset($_POST['roll_num']) ||
    !isset($_POST['department']) ||
    !isset($_POST['gender']) ||
    !isset($_POST['first_diagnosis_date'])
) {
    echo "There are errors with the form you are submitting. Please check and try again!";
} else {

    ##Set data in POST superglobal to variables

    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $other_names = $_POST['other_names'];
    $date_of_birth = $_POST['d_o_b'];
    $faculty = $_POST['faculty'];
    $roll_num = $_POST['roll_num'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];
    $first_diagnosis_date = $_POST['first_diagnosis_date'];

    #Prepared statement for patient data submission

    $sql = "INSERT INTO patient_data (first_name, surname, other_names, d_o_b, faculty,
                         roll_num, department, gender, first_diagnosis_date)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
    
    #$stmt = mysqli_prepare($db_conn, $sql);
    $stmt = $db_conn -> prepare($sql);

    $stmt -> bind_param("sssssssss", $first_name, $surname, $other_names, $date_of_birth,
                           $faculty, $roll_num, $department, $gender, $first_diagnosis_date);

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
    } else {
        echo "Data submitted successfully!";
        #var_dump($_POST);
        #If data is submitted successfully, redirect to diagnosis page
        header('Location: ../pages/add_diagnosis.php');
    }

    mysqli_stmt_close($stmt);
}
?>
