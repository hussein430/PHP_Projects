<?php
// connection folder
require "Alaa/Alaa.php";
// connection variable
global $Alex;

@$Token_Project = $_GET["T"];
$items = "SELECT * FROM add_objects WHERE Object_token = '$Token_Project'";
$RunItems = mysqli_query($Alex, $items);
$RowItems = mysqli_fetch_array($RunItems);

$nameOpject = @$RowItems['Object_name'];
$imgOpject = @$RowItems['Object_img'];
$priceOpject = @$RowItems['Object_price'];


// create token
$token = date("dmyhis");
$rand_num = rand(1, 2000);
$new_token = $token . $rand_num;

// Token user which signup
$Token_User = @$_COOKIE["Token"];
$items = "SELECT * FROM signup WHERE SignUp_token = '$Token_User'";
$Run = mysqli_query($Alex, $items);
$Row = mysqli_fetch_array($Run);

if (isset($_POST['buy'])) {
    $Amount = "SELECT * FROM shop WHERE shop_token_user='$Token_User' AND shop_token_object='$Token_Project'";
    $Run_Amount = mysqli_query($Alex, $Amount);
    $Row_Amount = mysqli_fetch_array($Run_Amount);
    if (@$Row_Amount['shop_amount'] > 0) {
        $Total_Amount = $Row_Amount['shop_amount'] + 1;
        $update = "UPDATE shop SET shop_amount='$Total_Amount' WHERE shop_token_user='$Token_User' AND shop_token_object='$Token_Project' ";

        if (mysqli_query($Alex, $update)) {
            echo '
            <link rel="stylesheet" href="css/style.css">

            <div class="pop_up_sigup">
                <img src="img/giphy.gif" />
                <p class="pop_up_p">تم اضافة المنتج الى سلة المشتريات </p>
            </div>
            <meta http-equiv="refresh" content="3 , url=shopping.php"/>
            ';
            exit();
        } else {
        }
    } else {
        $data_enter = "INSERT INTO shop
    (
        shop_token,
        shop_name,
        shop_price,
        shop_img,
        shop_amount,
        shop_token_user,
        shop_token_object
    )VALUES(
        '$new_token',
        '$nameOpject',
        '$priceOpject',
        '$imgOpject',
        '1',
        '$Token_User',
        '$Token_Project'
    )";

        if (mysqli_query($Alex, $data_enter)) {
            echo '
            <link rel="stylesheet" href="css/style.css">

            <div class="pop_up_sigup">
                <img src="img/giphy.gif" />
                <p class="pop_up_p">تم شراء المنتج بنجاح</p>
            </div>
            <meta http-equiv="refresh" content="3 , url=index.php"/>
            ';
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيانات المنتج</title>
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
                    <p>بيانات المنتج</p>
                </td>
                <td><a href="index.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="product">
            <img src="copy_img/<?php echo @$RowItems['Object_img']; ?>">
            <p class="product_name"> <?php echo @$RowItems['Object_name']; ?> </p>
            <p class="product_price"> <?php echo @$RowItems['Object_price']; ?> </p>
            <textarea class="product_info" readonly> <?php echo @$RowItems['Object_info']; ?> </textarea>
            <?php
            if (@$_COOKIE["hussein"] != '1') {
                echo ' <a href="logIn.php" class="product_buy"> يرجى تسجيل الدخول</a> ';
            } else {
                echo ' <input name="buy" class="product_buy" type="submit" value="شراء المنتج">';
            }
            ?>
        </div>
    </form>
</body>

</html>