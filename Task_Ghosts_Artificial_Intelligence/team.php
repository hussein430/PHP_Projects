<?php

// connection folder
require "Alaa/Alaa.php";
// connection variable
global $Alex;

$hussein = "SELECT * FROM team";
$Run = mysqli_query($Alex, $hussein);

@$select = $_GET['T'];

if (@$_GET['d'] == 'd') {
    $delete = "DELETE FROM team WHERE Team_token = '$select' ";
    $run = mysqli_query($Alex, $delete);
    echo '
    <link rel="stylesheet" href="css/styles.css">

    <div class="pop_up_sigup">
        <img src="img/giphy.gif" />
        <p class="pop_up_p">The user has been deleted successfully</p>
    </div>
    <meta http-equiv="refresh" content="3 , url=team.php"/>
    ';
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b81843000d.js" crossorigin="anonymous"></script>


</head>

<body>
    <div>
        <div class="Search">
            <button class="button_link"><a href="index.php">BACK</a></button>
            <button class="button_link"><a href="info.php">INFO</a></button>
        </div>
        <div class="Search_user">
            <input type="text" placeholder="Search" id="search">
        </div>
        <div>
            <table class="Show_All_Products" id="table_info">
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Number</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                $count = 1;
                while ($Row = mysqli_fetch_array($Run)) {
                    echo '
                            <tr id="row_info">
                            <td>' . $count++ . '</td>
                            <td>' . $Row['Team_name'] . '</td>
                            <td>' . $Row['Team_number'] . '</td>
                            <td><a href="Admin_edit.php?T=' . $Row['Team_token'] . '" target="_blank"><i class="fa-solid fa-pen-to-square edit_icon"></i></a></td>
                            <td><a href="team.php?d=d&T=' . $Row['Team_token'] . '"><i class="fa-solid fa-trash delete_icon"></i></a></td>
                            </tr>
                        ';
                };
                ?>


            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/search_products.js"></script>
</body>

</html>