<?php 
 #Continue session
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="info-card"></div>
        <div class="info-card"></div>
        <div class="info-card"></div>
        <div class="info-card"></div>
        <button onclick = "window.location.href='../pages/add_patient.php'">Add New Patient</button>
        <input type="search" name="search" id="search">
    </div>

    <?php include '../includes/footer.inc.php' ?>

</body>
</html>