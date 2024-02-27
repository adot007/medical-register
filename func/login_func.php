<?php

#Start session
session_start();
//$_SESSION('staff_name') = ($row['last_name']." ".$row['$first_name']);

require '../includes/db_conn.inc.php';

//SQL statement to query database
$query = "SELECT * FROM staff_data WHERE email = ? AND pw = ?;";

//Prepare statement for DB
$stmt = mysqli_prepare($db_conn, $query);

if ($stmt){
    $login_email = $_POST['email'];
    $login_pw = $_POST['password'];

    echo "<p>E-mail: {$login_email} || PW: {$login_pw}</p>";

    mysqli_stmt_bind_param($stmt, "ss", $login_email, $login_pw);
   
    mysqli_stmt_execute($stmt);
  
    //Store result in variable
    $query_result = mysqli_stmt_get_result($stmt);

     // Process the result set as needed
     while ($row = mysqli_fetch_assoc($query_result)) {
      // Do something with the data
      //print_r($row);
      $_SESSION['staff_id'] = ($row['last_name']." ".$row['$first_name']);
      header('location:../pages/doc_dash.php');   
      

     }

    mysqli_stmt_close($stmt);

} else {
  // Handle the error if the prepared statement fails
  echo "Error in preparing statement: " . mysqli_error($db_conn);
}

// Close the database connection when done
mysqli_close($db_conn);



/**
<?php

// Assuming you have established a database connection already

$query = "SELECT * FROM staff_data WHERE username = ? AND pw = ?";
$stmt = mysqli_prepare($db_conn, $query);

if ($stmt) {
    $login_email = $_POST['login_email']; // Replace with your actual form field name
    $login_pw = $_POST['login_pw']; // Replace with your actual form field name

    mysqli_stmt_bind_param($stmt, "ss", $login_email, $login_pw);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Process the result set as needed
    while ($row = mysqli_fetch_assoc($result)) {
        // Do something with the data
        print_r($row);
    }

    mysqli_stmt_close($stmt);
} else {
    // Handle the error if the prepared statement fails
    echo "Error in preparing statement: " . mysqli_error($db_conn);
}

// Close the database connection when done
mysqli_close($db_conn);

?>
*/
