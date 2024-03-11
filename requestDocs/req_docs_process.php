<?php

// Start or resume the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedOptions = isset($_POST["options"]) ? $_POST["options"] : [];
    $doctorName = isset($_POST["doctorName"]) ? $_POST["doctorName"] : "";
    $patientName = isset($_POST["patientName"]) ? $_POST["patientName"] : "";
    $date = isset($_POST["date"]) ? $_POST["date"] : "";

    // Create the letter content based on selected options
    $letterContent = "Dear {$doctorName},\n\n";
    $letterContent .= "I am writing to request the following medical checkup options for my patient, {$patientName}, on {$date}:\n\n";

    foreach ($selectedOptions as $option) {
        $letterContent .= "- {$option}\n";
    }

    $letterContent .= "\nPlease ensure that the necessary documents and reports are provided accordingly.\n\n";
    $letterContent .= "Sincerely,\n{$doctorName}";

    // Print or save the letter as needed
    echo "<pre>" . htmlspecialchars($letterContent) . "</pre>";
}

