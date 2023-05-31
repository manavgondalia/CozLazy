<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('components/_navbar.php'); ?>

    


    <h1 class="text-3xl text-center mb-8 font-poppins font-bold">Welcome
        <p class="inline-block text-[#9376E0]">
            <?php echo $_SESSION['name'] ?>
        </p>!
    </h1>

    <?php include('components/_table.php') ?>



</body>

<script>
    var modal = document.getElementById("myModal");

    var btns = document.getElementsByClassName("open-modal");

    var span = document.getElementsByClassName("close")[0];

    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {

            modal.style.display = "block";
            var id = this.getAttribute("data-id");
            document.getElementsByClassName("update-tt-input-apt")[0].value = this.innerText;
            document.getElementsByClassName("update-tt-input-loc")[0].value = this.getAttribute("location");
            document.getElementById("updateForm").action = "./_update_cell.php?id=" + id;

        });
    }
    span.onclick = function () {
        modal.style.display = "none";
    }

</script>

</html>