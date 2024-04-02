<?php

session_start();

$_SESSION['current_patient_id'] = $patient_id;

include '../includes/conn.inc.php';

##Check if data exists in POST superglobal(form)

if (
    !isset($_POST['first_name']) ||
    !isset($_POST['surname']) ||
    !isset($_POST['other_names']) ||
    !isset($_POST['d_o_b']) ||
    !isset($_POST['faculty']) ||
    !isset($_POST['roll_num']) ||
    !isset($_POST['department']) ||
    !isset($_POST['gender']) 
) {
    echo "There are errors with the form you are submitting. Please check and try again!";
} else {

    // Set data in POST superglobal to variables    

    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $other_names = $_POST['other_names'];
    $date_of_birth = $_POST['d_o_b'];
    $faculty = $_POST['faculty'];
    $relation = !isset($_POST['relation']) ? "Self" : $_POST['relation'];
    $roll_num = $_POST['roll_num'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];

   /*  if(!isset($_POST['relation'])){
        $relation = "Self";
    } else {
        $relation = $_POST['$relation'];
    } */

    //Prepared statement for patient data submission

    $sql = "INSERT INTO patient_data (first_name, surname, other_names, d_o_b, faculty,
                         relation, roll_num, department, gender)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
    
    #$stmt = mysqli_prepare($conn, $sql);
    $stmt = $conn -> prepare($sql);

    $stmt -> bind_param("sssssssss", $first_name, $surname, $other_names, $date_of_birth,
                           $faculty, $relation, $roll_num, $department, $gender);

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo "Error executing statement: " . $stmt->error;
    } else {
        // Data submitted successfully
        echo "<script>alert(\"Data submitted successfully!\")</script>";
        
        // Retrieve patient ID from the database
        $patient_id = $conn->insert_id;

        $sql = "INSERT INTO appointments (patient_id, arrival_time) VALUES (?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $patient_id);
        $result = $stmt->execute();


        // Store patient ID in session
        $_SESSION['current_patient_id'] = $patient_id;

        // Check which submit button was clicked and redirect accordingly
        if (isset($_POST['submit_vitals'])) {
            // Redirect to add vitals page
            header('Location: ../addVitals/');
            exit(); // Stop further execution
        } elseif (isset($_POST['submit_appointments'])) {
            // Redirect to nurse dashboard
            header('Location: ../nurseDash/');
            exit(); // Stop further execution
        }
    }
    
    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>