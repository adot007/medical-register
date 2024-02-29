<?php

session_start();

include "../includes/conn.inc.php";

if( 
    !isset($_POST['upperBloodPressure']) ||
    !isset($_POST['lowerBloodPressure']) ||
    !isset($_POST['temperature'])    

) {
    echo "There are errors with the form you are trying to submit. Please check and try again";

} else {
    //Assign HTML form inputs to PHP variables in POST superglobal
    $upperBloodPressure = $_POST['upperBloodPressure'];
    $lowerBloodPressure = $_POST['lowerBloodPressure'];
    $temperature = $_POST['temperature'];
    $patientID = !isset($_SESSION['current_patient_id']) ? NULL : $_SESSION['current_patient_id'];
    #$ = $_POST[''];

    //Prepared statement for data insertion
    $sql = "INSERT INTO patient_vitals (temperature, bp_upper, bp_lower, patient_id)
                VALUES(?, ?, ?, ?);";

    $stmt = $conn -> prepare($sql);

    $stmt -> bind_param("ssss", $upperBloodPressure,$lowerBloodPressure, $temperature, $patientID);

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
    } else {
        echo "<script>alert(\"Data submitted successfully!\")</script>";
        //var_dump($result);
        
        #Retrieve patient vitals id from DB and store in session
        $_SESSION['current_patient_vitals_id'] = mysqli_insert_id($conn);
       
        #If data is submitted successfully, redirect to diagnosis page
        header('Location: ../addDiagnosis/');
    }

    mysqli_stmt_close($stmt);
}