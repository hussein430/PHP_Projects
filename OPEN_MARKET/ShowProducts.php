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

$product = "SELECT * from add_objects";
$Run = mysqli_query($Alex , $product);
$num_products = mysqli_num_rows($Run);

?>


<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات</title>
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
                    <p>لوحة الأدمن</p>
                </td>
                <td><a href="index.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
    </div>

    <div class="Admin_add">
        <a href="AdminAddobject.php" class="Admin_add_object">اضافة منتج جديد</a>
        <div class="Admin_objects">
            <a href="ShowAllProducts.php">
                <p><?php echo $num_products ?></p>
                <p>اجمالي المنتجات الموجودة</p>
            </a>
        </div>
    </div>

</body>

</html>