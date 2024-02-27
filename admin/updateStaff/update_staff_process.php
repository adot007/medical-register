
<?php
// Database connection code (similar to admin_dashboard.php)
include ".././db_conn.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staff_id = (int)$_POST['staff_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    
    //var_dump($_POST);
    
    // Update staff details in the database
    $sql = "UPDATE staff_data SET
            first_name = '$first_name',
            last_name = '$last_name',
            email = '$email',
            role = '$role'
            WHERE staff_id = $staff_id";

    if ($db_conn->query($sql) === true) {
        echo '<script type="text/javascript">alert("Staff Details Updated Successfully");window.location=\'.././viewStaff/\';</script>';
    } else {
        echo "Error updating staff details: " . $db_conn->error;
    }
}

$db_conn->close();
?>
