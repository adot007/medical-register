<?php
// Assuming you have a session_start() at the beginning of your pages
//session_start();

//include '../includes/logout.inc.php';

// Check if a user is logged in
if ($_SESSION){  /** && isset($_SESSION['staff_name'])) {*/
    $userName = $_SESSION['staff_name'];
    $logoutLink = '<a href="../pages/logout.php">Logout</a>';
} else {
    //$userName = "Stranger";
    //$logoutLink = ''; // No logout link for guests
    header('location:../pages/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMU SICKBAY</title>
</head>
<body>
<style>
body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color:  #c9cbd6 ;
            color: #fff;
            padding: 0px 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            /* Styles for the left side of the header */
        }

        .header-right {
            text-align: right;
        }

        .header-right a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #555;
            opacity: 0.5;
        }
    </style>

    <header>
        <h1>RMU SICKBAY</h1>
        <p>Welcome <?php echo $userName; ?></p>
        <?php echo $logoutLink; ?>
    </header>
