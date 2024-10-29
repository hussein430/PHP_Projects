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
   
// create token
$token = date("dmyhis");
$rand_num = rand(1, 2000);
$new_token = $token . $rand_num;

// image upload to data base
@$image = $_FILES['upload_image']['name'];
@$image_copy = $_FILES['upload_image']['tmp_name'];
@$direction = "copy_img/" ;
@$target = $direction.basename($_FILES['upload_image']['name']);
@$secur = strtolower(pathinfo($target,PATHINFO_EXTENSION));
$security = 1 ;
@$post_img = uniqid("hs-".true).'.' .strtolower(pathinfo($_FILES['upload_image']['name'],PATHINFO_EXTENSION));



//connection when we enter submit 
if (isset($_POST['add_object'])) {
    if (empty($post_name && $post_price)) {
        $Error = "<h3 class='pop_up_error'>رجاءا ادخل المعلومات </h3>";
    } else {
        if($secur != '' && $secur != 'jpg' && $secur != 'gif' && $secur != 'png'){
            $security = 0 ;
        }
        if($security == 0 ){
            echo '
            <link rel="stylesheet" href="css/style.css">
            <body class="body-pop-up-already_login">
                <div class="pop_up_already_login">
                    <img src="img/comp_3.gif" />
                    <p class="pop_up_p">عذرا الامتداد غير مسموح </p>
                </div>
            </body>
            <meta http-equiv="refresh" content="3 , url=AdminAddobject.php"/>
            ';
        exit();
        }
        if($image != ''){
            move_uploaded_file($image_copy , "copy_img/$post_img");
        }else{
            $post_img = '' ;
        }

        $data_enter = "INSERT INTO add_objects
        (
            object_token,
            object_name,
            object_price,
            object_img,
            object_info
        )VALUES(
            '$new_token',
            '$post_name',
            '$post_price',
            '$post_img',
            '$post_desc'
        )";

        if (mysqli_query($Alex, $data_enter)) {
            echo '
            <link rel="stylesheet" href="css/style.css">

                <div class="pop_up_sigup">
                    <img src="img/giphy.gif" />
                    <p class="pop_up_p">تم اضافة المنتج بنجاح</p>
                </div>
                <meta http-equiv="refresh" content="3 , url=AdminAddobject.php"/>
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
    <title>اضافة المنتجات</title>
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
                    <p>اضافة منتج جديد</p>
                </td>
                <td><a href="ShowProducts.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="name_price">
            <?php echo @$Error; ?>
            <input class="enter_name_price" type="text" placeholder="أسم المنتج" name="object_name">
            <input class="enter_name_price" type="text" placeholder=" أكتب السعر" name="object_price">
            <br>
            <input type="file" class="upload" name="upload_image">
            <textarea class="description" cols="35" rows="10" placeholder="الوصف" name="object_desc"></textarea>
            <input type="submit" value="اضافه المنتج" class="add_object" name="add_object">
        </div>
    </form>
</body>

</html>