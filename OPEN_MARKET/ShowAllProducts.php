<?php

if (@$_COOKIE["hussein"] != '1') {
    echo '
    <link rel="stylesheet" href="css/style.css">
        <body class="body-pop-up-already_login">
            <div class="pop_up_already_login">
                <img src="img/comp_3.gif" />
                <p class="pop_up_p">عذرا يرجى تسجيل الدخول </p>
            </div>
        </body>
        <meta http-equiv="refresh" content="3 , url=logIn.php"/>
        ';
    exit();
}

// connection folder
require "Alaa/Alaa.php";
// connection variable
global $Alex;

$hussein = "SELECT * FROM add_objects";
$Run = mysqli_query($Alex, $hussein);

@$select = $_GET['T'];

if (@$_GET['d'] == 'd') {
    $delete = "DELETE FROM add_objects WHERE object_token = '$select' ";
    $run = mysqli_query($Alex, $delete);
    echo '
    <link rel="stylesheet" href="css/style.css">

    <div class="pop_up_sigup">
        <img src="img/giphy.gif" />
        <p class="pop_up_p">تم  حذف المنتج بنجاح</p>
    </div>
    <meta http-equiv="refresh" content="3 , url=ShowAllProducts.php"/>
    ';
    exit();
}

?>


<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتجات</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">

</head>

<body>
    <div>
        <table class="table_heading">
            <tr>
                <td>
                    <p>جميع المنتجات</p>
                </td>
                <td><a href="ShowProducts.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
        <div class="Search">
            <input type="text" placeholder="ابحث هنا" id="search">
        </div>
        <div>
            <table class="Show_All_Products" id="table_info">
                <tr>
                    <th>ت</th>
                    <th>صورة المنتج</th>
                    <th>أسم المنتج</th>
                    <th>سعر المنتج</th>
                    <th>التعديل</th>
                    <th>الحذف</th>
                </tr>

                <?php
                $count = 1;
                while ($Row = mysqli_fetch_array($Run)) {
                    echo '
                            <tr id="row_info">
                            <td>' . $count++ . '</td>
                            <td><img width=200 src="copy_img/' . $Row['object_img'] . '" alt="image"></td>
                            <td>' . $Row['object_name'] . '</td>
                            <td>' . $Row['object_price'] . '</td>
                            <td><a href="Admin_edit.php?T=' . $Row['object_token'] . '" target="_blank"><i class="fa-solid fa-pen-to-square edit_icon"></i></a></td>
                            <td><a href="ShowAllProducts.php?d=d&T=' . $Row['object_token'] . '"><i class="fa-solid fa-trash delete_icon"></i></a></td>
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