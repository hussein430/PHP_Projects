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

// take the data from input
@$post_name = $_POST['object_name'];
@$post_price = $_POST['object_price'];
@$post_desc = $_POST['object_desc'];
@$post_img = $_POST['upload_image'];

// select the item from data base 
@$hussein = $_GET['T'];
$items = "SELECT * FROM add_objects WHERE object_token = '$hussein'";
$Run = mysqli_query($Alex, $items);
$Row = mysqli_fetch_array($Run);

// image upload to data base
@$image = $_FILES['upload_image']['name'];
@$image_copy = $_FILES['upload_image']['tmp_name'];
@$direction = "copy_img/";
@$target = $direction . basename($_FILES['upload_image']['name']);
@$secur = strtolower(pathinfo($target, PATHINFO_EXTENSION));
$security = 1;
@$post_img = uniqid("hs-" . true) . '.' . strtolower(pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION));



//connection when we enter submit 
if (isset($_POST['add_object'])) {
    if (empty($post_name && $post_price)) {
        $Error = "<h3 class='pop_up_error'>رجاءا ادخل المعلومات </h3>";
    } else {
        if ($secur != '' && $secur != 'jpg' && $secur != 'gif' && $secur != 'png') {
            $security = 0;
        }
        if ($security == 0) {
            echo '
            <link rel="stylesheet" href="css/style.css">
            <body class="body-pop-up-already_login">
                <div class="pop_up_already_login">
                    <img src="img/comp_3.gif" />
                    <p class="pop_up_p">عذرا الامتداد غير مسموح </p>
                </div>
            </body>
            <meta http-equiv="refresh" content="3 , url=Admin_edit.php"/>
            ';
            exit();
        }
        if ($image != '') {
            move_uploaded_file($image_copy, "copy_img/$post_img");

            $oldImage = "copy_img/" . $Row['object_img'];

            // check if the last file is empty or not
            if (is_file($oldImage)) {
                unlink($oldImage);
            }
        } else {
            $post_img = $Row['object_img'];
        }


        $data_edit = "UPDATE add_objects
        SET
            object_name = '$post_name',
            object_price = '$post_price',
            object_img = '$post_img',
            object_info = '$post_desc'

        WHERE object_token = '$hussein'";


        if (mysqli_query($Alex, $data_edit)) {
            echo '
            <link rel="stylesheet" href="css/style.css">

                <div class="pop_up_sigup">
                    <img src="img/giphy.gif" />
                    <p class="pop_up_p">تم تحديث بيانات المنتج بنجاح</p>
                </div>
                <meta http-equiv="refresh" content="3 , url=Admin_edit.php?T=' . $hussein . '"/>
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
    <title>تعديل المنتج</title>
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
                    <p>تعديل بيانات المنتج</p>
                </td>
                <td><a href="ShowAllProducts.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="name_price">
            <img width="200px" src="copy_img/<?php echo @$Row['object_img']; ?>" /><br>
            <?php echo @$Error; ?>
            <input class="enter_name_price" type="text" placeholder="أسم المنتج" name="object_name" value="<?php echo @$Row['object_name']; ?>">
            <input class="enter_name_price" type="text" placeholder=" أكتب السعر" name="object_price" value="<?php echo @$Row['object_price']; ?>">
            <br>
            <input type="file" class="upload" name="upload_image">
            <textarea name="object_desc" class="description" cols="35" rows="10" placeholder="الوصف"><?php echo @$Row['object_info']; ?></textarea>
            <input type="submit" value="تعديل المنتج" class="add_object" name="add_object">
        </div>
    </form>
</body>

</html>