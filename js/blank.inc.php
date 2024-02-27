<?php 

    //Add DB connection
    include "../includes/db_conn.inc.php";

    // Get the search query
    $searchQuery = $_POST['search'];
    if(!isset($searchQuery)){
        echo "<script>alert(\"No search query found\")</script>";
    } else {
        echo "<script>alert(\"Searching...\")</script>";
    };

    // Query the database
    $sql = "SELECT * FROM patient_data WHERE first_name LIKE '%$searchQuery%' OR surname LIKE '%$searchQuery%' OR roll_num LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    // Display the results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "No results found";
    }

    // Close the database connection
    $conn->close();

?>