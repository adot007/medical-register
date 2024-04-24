<?php
session_start();

$_SESSION['patient_id'] = 1041;

require_once __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;

include '../includes/conn.inc.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if checkboxes are selected
    if(isset($_POST['options'])) {
        // Get patient details from the database
        $patientId = $_SESSION['current_patient_id']; // Assuming you have the patient ID in session
        $sql = "SELECT * FROM patient_data WHERE patient_id = $patientId";
        $result = $conn->query($sql);
        print_r ($result);
        print_r ($_SESSION);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $first_name = $row['first_name']; // Assuming 'first_name' is a column in your patients table
        } else {
            $first_name = "Unknown";
        }
        if (isset($_SESSION['d_o_b'])) {
            $d_o_b = $_SESSION['d_o_b'];
        } else {
            $d_o_b = "Unknown";
        }
        if (isset($_SESSION['gender'])) {
            $gender = $_SESSION['gender'];
        } else {
            $gender = "Unknown";
        }
        // Selected documents
        $selectedDocuments = $_POST['options'];

        // Load the referral note template
        $templatePath = __DIR__ . '/templates/referral_note_template.docx';
        if (file_exists($templatePath)) {
            // Replace placeholders with actual data
            $templateProcessor = new TemplateProcessor($templatePath);
            $templateProcessor->setValue('first_name', $first_name);
            $templateProcessor->setValue('d_o_b', $d_o_b);
            $templateProcessor->setValue('gender', $gender);
            $templateProcessor->setValue('selected_documents', implode(', ', $selectedDocuments));

            // Output or download the Word document
            $outputFilePath = tempnam(sys_get_temp_dir(), 'referral_note') . '.docx';
            $templateProcessor->saveAs($outputFilePath);
            
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Disposition: attachment; filename="referral_note.docx"');
            readfile($outputFilePath);

            // Cleanup temporary file
            unlink($outputFilePath);
            exit;
        } else {
            die("Template file not found.");
        }
    } else {
        die
("Please select at least one document.");
    }
}
