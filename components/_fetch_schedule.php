<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: ../login.php");
    exit;
}

include('components/_dbconnect.php');
$id = $_SESSION['userID'];
$query = "SELECT monday, tuesday, wednesday, thursday, friday FROM `phpusetimetable` WHERE userid = ?;";
$result = $conn->execute_query($query, [$id]);

function initialise_function()
{
    $schedule = [];
    $location = [];
    for ($i = 0; $i < 5; $i++) {
        array_push($schedule, []);
        array_push($location, []);
        for ($j = 0; $j < 10; $j++) {
            array_push($schedule[$i], "Free");
            array_push($location[$i], "Empty");
        }
    }
    return array($schedule, $location);
}

list($schedule, $location) = initialise_function();

if ($result->num_rows === 1) {
    $query_res = $result->fetch_assoc();
    $monday_tt = json_decode($query_res['monday'], true);
    $tuesday_tt = json_decode($query_res['tuesday'], true);
    $wednesday_tt = json_decode($query_res['wednesday'], true);
    $thursday_tt = json_decode($query_res['thursday'], true);
    $friday_tt = json_decode($query_res['friday'], true);

    $schedule[0] = $monday_tt['slots'];
    $schedule[1] = $tuesday_tt['slots'];
    $schedule[2] = $wednesday_tt['slots'];
    $schedule[3] = $thursday_tt['slots'];
    $schedule[4] = $friday_tt['slots'];

    $location[0] = $monday_tt['location'];
    $location[1] = $tuesday_tt['location'];
    $location[2] = $wednesday_tt['location'];
    $location[3] = $thursday_tt['location'];
    $location[4] = $friday_tt['location'];


} else {
    echo "<p class='font-poppins text-[#D4FAFC] text-center text-xl p-2 bg-[#FF6969] w-1/2 mx-auto rounded-md font-semibold'>You do not have a schedule at the moment! Create one now. </p><br> <br>";
}
?>