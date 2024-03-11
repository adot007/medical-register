<?php
    session_start();

    // Check if form fields are set
    $patient_name = isset($_POST['patient_name']) ? $_POST['patient_name'] : '';
    $diagnosis = isset($_POST['diagnosis']) ? $_POST['diagnosis'] : '';
    $prescriptions = isset($_POST['prescription']) ? $_POST['prescription'] : [];
    $frequencies = isset($_POST['frequency']) ? $_POST['frequency'] : [];
    $durations = isset($_POST['duration']) ? $_POST['duration'] : [];
    $notes = isset($_POST['notes']) ? $_POST['notes'] : '';

    // Function to display prescriptions
    function displayPrescriptions($prescriptions, $frequencies, $durations) {
        if (count($prescriptions) > 0) {
            echo "<ul>";
            for ($i = 0; $i < count($prescriptions); $i++) {
                echo "<li>";
                echo "<strong>Drug:</strong> " . htmlspecialchars($prescriptions[$i]) . "<br>";
                echo "<strong>Frequency:</strong> " . htmlspecialchars($frequencies[$i]) . "<br>";
                echo "<strong>Duration:</strong> " . htmlspecialchars($durations[$i]) . "<br>";
                echo "</li>";
            }
            echo "</ul>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printable Record</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .record-item {
            margin-bottom: 20px;
        }
        .record-item label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .record-item span {
            display: block;
            margin-bottom: 10px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Medical Record</h1>
    <div class="record-item">
        <label>Patient Name:</label>
        <span><?php echo htmlspecialchars($patient_name); ?></span>
    </div>
    <div class="record-item">
        <label>Diagnosis:</label>
        <span><?php echo htmlspecialchars($diagnosis); ?></span>
    </div>
    <div class="record-item">
        <label>Prescriptions:</label>
        <?php displayPrescriptions($prescriptions, $frequencies, $durations); ?>
    </div>
    <div class="record-item">
        <label>Notes:</label>
        <span><?php echo htmlspecialchars($notes); ?></span>
    </div>
    <!-- Additional content or styling can be added as needed -->
</body>
</html>
