<?php

// Start or resume the session
session_start();

// Include the database connection file
include '../includes/conn.inc.php';

# Retrieve patient records id from DB and store it in session
$_SESSION['current_patient_record_id'] = mysqli_insert_id($conn);

// Retrieve session variables or set them to empty strings if not set
$current_patient_id = isset($_SESSION['current_patient_id']) ? $_SESSION['current_patient_id'] : "";
$patient_record_id = isset($_SESSION['current_patient_record_id']) ? $_SESSION['current_patient_record_id'] : "";
$document_name = $_POST['document_name'];
$document_description = $_POST['document_description'];

// Process file uploads
$fileCount = count($_FILES["files"]["name"]);
for ($i = 0; $i < $fileCount; $i++) {
    // Specify the target directory for file uploads
    $targetDirectory = "../uploads/";

    // Generate the target file path
    $targetFile = $targetDirectory . basename($_FILES["files"]["name"][$i]);

    // Move the uploaded file to the target directory
    move_uploaded_file($_FILES["files"]["tmp_name"][$i], $targetFile);

    // Determine file type based on file extension
    $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

    // Save filename and file type to the database
    $filename = basename($_FILES["files"]["name"][$i]);

    // Prepare SQL statement for insertion
    $sql = "INSERT INTO `clinical_data` (patient_id, record_id, document_name, document_description, file_name, filetype)
            VALUES(?, ?, ?, ?, ?, ?);";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Check if the preparation of the statement was successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssssss", $current_patient_id, $patient_record_id, $document_name, $document_description, $filename, $fileType);

        // Execute the prepared statement
        $executionResult = mysqli_stmt_execute($stmt);

        // Check if the execution was successful
        if ($executionResult) {
            echo "Insertion successful!";
            header ("Location: ../nurseDash/");
        } else {
            // Print detailed error information
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Print detailed error information
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);


