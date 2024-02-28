
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel = "stylesheet" href="../css/tailwind.min.css" >
    <title>RMU - Login</title>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-md shadow-md">
        <form action="./login_func.php" method="post" class="flex flex-col space-y-4">
            
            <label for="email" class="text-sm font-medium text-gray-600">E-mail:</label>
            <input type="text" name="email" id="email" class="mt-1 p-2 border rounded-md">
            
            <label for="password" class="text-sm font-medium text-gray-600">Password:</label>
            <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-md">
            
            <button type="submit" name="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Login
            </button>
        
        </form>
    </div>
    <?php include '../includes/footer.inc.php' ?>
</body>

</html>
