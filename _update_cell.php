<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('./components/_fetch_schedule.php');
    $appointment = $_POST['appointment'];
    $location = $_POST['location'];
    $cell = $_GET['id'];
    $dayID = floor($cell / 10);
    $slot = $cell % 10;
    $id = $_SESSION['userID'];
    $day = strtolower(date("l", strtotime("Monday + $dayID day")));

    $temp = $query_res;
    $pday = json_decode($temp[$day], true);
    $pday['slots'][$slot] = $appointment;
    $pday['location'][$slot] = $location;


    $temp[$day] = json_encode($pday);
    $query = "SELECT * FROM `phpusetimetable` WHERE userid = ?;";
    $result = $conn->execute_query($query, [$id]);


    $query = "UPDATE `phpusetimetable` SET $day = ? WHERE userid = ?;";
    $result = $conn->execute_query($query, [$temp[$day], $id]);


    if ($result) {
        header("Location: welcome.php");
    } else {
        echo "Error updating cell!";
    }
} else {
    echo "Error: Invalid Request!";
}

?>