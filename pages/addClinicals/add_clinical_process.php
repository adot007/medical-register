<?php

    include '../includes/db_conn.inc.php';

    #Retrieve patient records id from DB and store in session
    $_SESSION['current_patient_record_id'] = mysqli_insert_id($db_conn);

    $patient_id = $_SESSION['current_patient_id'];
    $record_id = $_SESSION['current_patient_record_id'];
    $document_name = $_POST['document_name'];
    $document_description = $_POST['document_description'];

     // Process file uploads
     $fileCount = count($_FILES["files"]["name"]);
     for ($i = 0; $i < $fileCount; $i++) {
         $targetDirectory = "uploads/";
         $targetFile = $targetDirectory . basename($_FILES["files"]["name"][$i]);
         move_uploaded_file($_FILES["files"]["tmp_name"][$i], $targetFile);
 
         // Determine file type based on file extension
         $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

         // Save filename and file type to the database
        $filename = basename($_FILES["files"]["name"][$i]);    
   
    
        $sql = "INSERT INTO clinical_data (patient_id, record_id, document_name, description, file_name, filetype)
            VALUES(?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($db_conn, $sql);

        mysqli_stmt_bind_param($stmt, "ssssss", $patient_id, $record_id, $document_name, $document_description, $file_name, $fileType);

        mysqli_execute($stmt);

}