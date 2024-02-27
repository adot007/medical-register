<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Simple Test Page</title>
</head>
<body>

<div class="flex h-screen bg-gray-200">
    <?php
            
        include "../includes/sidebar.inc.php";
        generateSidebar();

        include "../includes/db_conn.inc.php";

    ?>

    <main class="flex-1 p-4">
        <?php
            $query = "SELECT * FROM patient_data";
            $result = $db_conn->query($query);
            print_r($result);
            if($result){
                while($row = $result->fetch_assoc()){
                    var_dump($row);
                }
            }
        ?>

    </main>
</div>


</body>
</html>