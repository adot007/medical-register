<?php
// Start session
session_start();

// Include database connection
require '../includes/conn.inc.php';

// SQL statement to query database
$query = "SELECT * FROM staff_data WHERE email = ? AND pw = ?;";

// Prepare statement for DB
$stmt = mysqli_prepare($conn, $query);

// Check if the prepared statement is successful
if ($stmt) {
    // Get the login email and password from the POST request
    $login_email = $_POST['email'];
    $login_pw = $_POST['password'];

    // Bind the login email and password to the prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $login_email, $login_pw);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result of the query
    $query_result = mysqli_stmt_get_result($stmt);

    //Process the result set as needed
    while ($row = mysqli_fetch_assoc($query_result)) {
      //print_r($row);
      //Set the session variables with the staff name, role, and id
        $_SESSION['staff_name'] = ($row['last_name']." ".$row['first_name']);
        $_SESSION['role'] = $row['role'];
        $_SESSION['staff_id'] = $row['staff_id'];

        // Redirect the user based on their role
        if ($_SESSION['role'] == 'doctor') {
            header('location:../docDash/');
        } elseif ($_SESSION['role'] == 'nurse') {
            header('location:../nurseDash/');
          // echo "<script>alert(\"Here!!\")</script>";
        } elseif ($_SESSION['role'] == 'admin') {
            header('location:../admin/dashboard');
        } else {
            // Display an error message if the credentials are invalid
            die("Invalid credentials. Please try again.");
        }
    }

    // if ($query_result -> num_rows > 0) {
    //   echo "<script> alert(\"Here!!\")</script>";

    //   // while ($row = mysqli_fetch_assoc($query_result)) {
    //   //   print_r($row);

    // }  else {
    //   echo "<script> alert(\"No results found!\")</script>";

    // };


} else {
    // Handle the error if the prepared statement fails
    echo "Error in preparing statement: " . mysqli_error($conn);
}

// Close the database connection when done
mysqli_close($conn);

