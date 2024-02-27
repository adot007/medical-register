<?php
include ".././db_conn.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO staff_data (role, first_name, last_name, email, pw) 
            VALUES ('$role', '$first_name', '$last_name', '$email', '$password')";

    if ($db_conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">alert("Staff Added Successfully");window.location=\'../dashboard/\';</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $db_conn->error;
    }
}

$db_conn->close();
?>