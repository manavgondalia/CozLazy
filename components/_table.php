<?php

// session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: ../login.php");
    exit;
}

include('components/_fetch_schedule.php');
?>


<div class="container mx-auto">
    <table class="table-fixed border-separate border-spacing-2 border-8 border-gray-400 mx-auto">
        <thead>
            <tr>
                <th></th>
                <?php
                for ($i = 8; $i < 13; $i++) {
                    $start = $i;
                    $end = $i + 1;
                    if ($end == 13) {
                        $end = 1;
                    }
                    echo "<th class='border border-gray-400 px-4 py-2 font-poppins'>$start:00-$end:00</th>";
                }
                for ($i = 2; $i < 7; $i++) {
                    $start = $i;
                    $end = $i + 1;
                    echo "<th class='border border-gray-400 px-4 py-2 font-poppins'>$start:00-$end:00</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < 5; $i++) {
                $day = date("l", strtotime("Monday + $i day"));
                echo "<tr>";
                echo "<td class='border border-gray-400 px-4 py-2 font-poppins font-bold'>$day</td>";
                for ($j = 0; $j < 10; $j++) {
                    echo "<td> <button class='open-modal w-full border border-gray-400 hover:scale-110 hover:border-black hover:bg-[#F9F5F6] px-4 py-2 text-center font-poppins' data-id = '" . $i * 10 + $j . "' location = '" . $location[$i][$j] . "'>{$schedule[$i][$j]} </button> </td>"; // this is what we will manipulate
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div id="myModal"
        class="hidden absolute bg-blue-500 w-1/5 top-0 bottom-0 right-0 left-0 m-auto max-h-60 rounded-lg">
        <div class="relative">
            <span class="close absolute right-1 hover:cursor-pointer text-2xl">&times;</span>
            <br>
            <p class="text-[#F6FFA6] text-center">Simply type to modify the schdeule.</p>
            <form id="updateForm" method="POST" action="./_update_cell.php" class="flex flex-col p-6">
                <div class="mb-2">
                    <input
                        class="update-tt-input-apt w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-gray-400"
                        type="text" name="appointment" placeholder="Appointment">
                </div>
                <div class="mb-2">
                    <input
                        class="update-tt-input-loc w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-gray-400"
                        type="text" name="location" placeholder="Location">
                </div>
                <div class="mb-2">
                    <button class="w-full py-2 px-4 bg-gray-600 text-white rounded-md shadow-md"
                        type="submit">Modify</button>
                </div>
            </form>
        </div>
    </div>
</div>