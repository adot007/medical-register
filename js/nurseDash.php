<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse's Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="bg-gray-100 p-4">

    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-6">Nurse's Dashboard</h1>

        <!-- Add Patient Form -->
        <form id="addPatientForm" class="mb-6">
            <div class="mb-4">
                <label for="patientName" class="block text-gray-700 font-semibold mb-2">Patient Name:</label>
                <input type="text" id="patientName" name="patientName" class="w-full px-3 py-2 border rounded-md">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Patient</button>
        </form>

        <!-- Search Patient Form -->
        <form id="searchPatientForm" class="mb-6">
            <div class="mb-4">
                <label for="search" class="block text-gray-700 font-semibold mb-2">Search Patient:</label>
                <input type="text" id="search" name="search" class="w-full px-3 py-2 border rounded-md">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Search</button>
        </form>

        <!-- WebSocket Connection -->
        <div id="websocketStatus" class="text-sm text-gray-500"></div>
    </div>

    <script>
        // WebSocket Connection
        const socket = new WebSocket('ws://your-websocket-server-url');

        socket.addEventListener('open', (event) => {
            document.getElementById('websocketStatus').innerText = 'WebSocket Connection Established';
        });

        socket.addEventListener('close', (event) => {
            document.getElementById('websocketStatus').innerText = 'WebSocket Connection Closed';
        });

        socket.addEventListener('error', (event) => {
            document.getElementById('websocketStatus').innerText = 'WebSocket Connection Error';
        });
    </script>

    <script>
        // Function to handle adding a patient
        document.getElementById('addPatientForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const patientName = document.getElementById('patientName').value;

            if (patientName.trim() !== '') {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'add_patient.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Clear the input field after successful addition
                        document.getElementById('patientName').value = '';
                    }
                };
                xhr.send('patientName=' + encodeURIComponent(patientName));
            }
        });

        // Function to handle searching for a patient
        document.getElementById('searchPatientForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const searchTerm = document.getElementById('search').value;

            if (searchTerm.trim() !== '') {
                // Implement your logic to search for a patient by name or ID
                // You can use AJAX to send a request to the server and update the UI accordingly
            }
        });
    </script>

</body>
</html>
