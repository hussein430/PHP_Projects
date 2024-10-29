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

$get_user_token = $_COOKIE['Token'];
$hussein = "SELECT * FROM shop WHERE shop_token_user = '$get_user_token'";
$Run_hussein = mysqli_query($Alex, $hussein);

if (@$_GET['D'] == 'D') {
    $TokenShop = $_GET['T'];
    $delete = "DELETE FROM shop WHERE shop_token = '$TokenShop' ";
    $run = mysqli_query($Alex, $delete);
    echo'<meta http-equiv="refresh" content="0 , url=shopping.php"/>';
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة المشتريات</title>
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
                    <p>سلة المشتريات</p>
                </td>
                <td><a href="index.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
    </div>

    <div class="container_product_edit">
        <table class="product_container">
            <?php
                while ($Row_hussein = mysqli_fetch_array($Run_hussein)) {
                    @$Total_Price= $Row_hussein['shop_price'] * $Row_hussein['shop_amount'];
                    echo '
                        <tr>
                            <td class="product_details">
                                <div class="details">
                                    <p>' . $Row_hussein['shop_name'] . '</p>
                                    <p>' . $Row_hussein['shop_price'] . ' : السعر</p>
                                    <p>' . $Row_hussein['shop_amount'] . ' : الكمية</p>
                                    <p>' . $Total_Price . '$ : الاجمالي</p>
                                    
                                </div>
                            </td>
                            <td rowspan="2">
                                <img width="400px
                                " src="copy_img/'.$Row_hussein['shop_img'].'" alt="Frozen img">
                            </td>
                        </tr>
                        <tr>
                            <td class="product_details">
                                <a class="info" href="buy.php?T='.$Row_hussein['shop_token_object'].'">التفاصيل</a>
                                <a class="delete" href="shopping.php?D=D&T='.$Row_hussein['shop_token'].'">الحذف</a>
                            </td>
                        </tr>';
                        @$All_Price += $Total_Price;
                }
            ?>
        </table>
        <div>
            <p class="total_price">
               $الحساب الاجمالي : <?php echo @$All_Price ?> 
            </p>
        </div>
    </div>

</body>

</html>