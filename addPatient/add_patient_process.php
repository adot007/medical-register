<?php

session_start();

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
    
    #$stmt = mysqli_prepare($db_conn, $sql);
    $stmt = $conn -> prepare($sql);

    $stmt -> bind_param("sssssssss", $first_name, $surname, $other_names, $date_of_birth,
                           $faculty, $relation, $roll_num, $department, $gender);

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
    } else {
        echo "<script>alert(\"Data submitted successfully!\")</script>";
        //var_dump($result);
        
        #Retrieve patient ID from DB and store in session
        $_SESSION['current_patient_id'] = mysqli_insert_id($db_conn);
       
        #If data is submitted successfully, redirect to diagnosis page
        header('Location: ../addVitals/');
    }

    mysqli_stmt_close($stmt);
}
?>
