<?php
    // Your database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sickbay";

    // Create connection
    $conn= new mysqli('localhost','root','','sickbay');

    // Check connection
    if($conn->connect_error){
        die('connection failed  :  ' .$conn->connect_error);
    }
        $con = mysqli_connect ("localhost","root","","sickbay");

        // Initialize variables
    $lastEnteredAmount = "";

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the entered price

        $price = $_POST['price'];

        // Fetch the latest exchange rate from the exchange_rates table
        $exchangeRateResult = $conn->query("SELECT * FROM exchange_rates ORDER BY id DESC LIMIT 1");
        $exchangeRateRow = $exchangeRateResult->fetch_assoc();
        $exchangeRate = $exchangeRateRow['rate'];

        // Convert the price to dollars
        $dollars = $price * $exchangeRate;

        // Insert the price and converted amount into the database
        $sql = "INSERT INTO appointments (amount, amount_in_dollars) VALUES ('$price', '$dollars')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Price ($price) has been added to the database with the equivalent of {$dollars} dollars using the exchange rate of {$exchangeRate}.</p>";
            $lastEnteredAmount = $price; // Save the last entered amount
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
    ?>

    

   