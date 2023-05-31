<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: welcome.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('components\_dbconnect.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO `phpuser` (`name`, `email`, `password`) VALUES (?,?,?);";
    $result = $conn->execute_query($query, [$name, $email, $password]);
    if ($result) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['userID'] = mysqli_insert_id($conn);
        header("Location: welcome.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('components/_navbar.php'); ?>

    <form action="signup.php" method="post" class="mx-auto container w-1/5 font-poppins">
        <div class="flex flex-col bg-[#FFD3A3] rounded-md px-6 py-1 mt-4">
            <p class="text-3xl text-center mt-4">REGISTER</p>
            <div class="mb-2">
                <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-gray-400">
            </div>
            <div class="mb-2">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-gray-400">
            </div>
            <div class="mb-2">
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-gray-400">
            </div>
            <div class="mt-4 mb-4">
                <button type="submit" class="w-full py-2 px-4 bg-gray-600 text-white rounded-md shadow-md">Sign
                    Up</button>
            </div>
        </div>
    </form>

</body>

</html>