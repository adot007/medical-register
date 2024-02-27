<?php
session_start();

// Your database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sickbay";

// Create connection
$conn= new mysqli('localhost','root','','sickbay');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get patient details from the form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Insert patient details into the database
    $sql = "INSERT INTO patients (name, age, gender) VALUES ('$name', '$age', '$gender')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['patient_id'] = $conn->insert_id; // Save the patient ID in the session
        header("Location: diagnosis.php");
        exit();
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>