<?php

    include '../includes/db_conn.inc.php';

      $document_name = $_POST['document_name'];
      $document_description = $_POST['document_description'];
      $image_blob = $_POST['$image_blob'];
      $pdf_blob = $_POST['pdf_blob'];

      $sql = "INSERT INTO clinical_data (document_name, description, image_blob, pdf_blob)
VALUES(?, ?, ?, ?);";

$stmt = mysqli_prepare($db_conn, $sql);

mysqli_stmt_bind_param($stmt, "ssss", $document_name, $document_description, $image_blob, $pdf_blob);

mysqli_execute($stmt);

