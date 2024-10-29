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

// Token user which signup
$Token_User = $_COOKIE["Token"];
$items = "SELECT * FROM signup WHERE SignUp_token = '$Token_User'";
$Run = mysqli_query($Alex, $items);
$Row = mysqli_fetch_array($Run);

// take the data from input
@$post_name = $_POST['user_name'];
@$post_email = $_POST['user_email'];
@$post_password = $_POST['user_password'];
@$post_skills = $_POST['user_skills'];
@$post_career = $_POST['user_carrer'];

// image upload to data base
@$image = $_FILES['upload_image']['name'];
@$image_copy = $_FILES['upload_image']['tmp_name'];
@$direction = "user-img/";
@$target = $direction . basename($_FILES['upload_image']['name']);
@$secur = strtolower(pathinfo($target, PATHINFO_EXTENSION));
$security = 1;
@$post_img = uniqid("hs-" . true) . '.' . strtolower(pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION));

//connection when we enter submit 
if (isset($_POST['upload'])) {
    if (empty($post_name && $post_email)) {
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
            <meta http-equiv="refresh" content="3 , url=Profile.php"/>
            ';
            exit();
        }
        if ($image != '') {
            move_uploaded_file($image_copy, "user-img/$post_img");

            $oldImage = "user-img/" . $Row['SignUp_img'];

            // check if the last file is empty or not
            if (is_file($oldImage)) {
                unlink($oldImage);
            }
        } else {
            $post_img = $Row['SignUp_img'];
        }


        $data_edit = "UPDATE signup
        SET
            SignUp_name = '$post_name',
            SignUp_email = '$post_email',
            SignUp_pass = '$post_password',
            SignUp_skill = '$post_skills',
            SignUp_career = '$post_career',
            SignUp_img = '$post_img' 

            WHERE SignUp_token = '$Token_User'";


        if (mysqli_query($Alex, $data_edit)) {
            echo '
            <link rel="stylesheet" href="css/style.css">

                <div class="pop_up_sigup">
                    <img src="img/giphy.gif" />
                    <p class="pop_up_p">تم تحديث البيانات بنجاح</p>
                </div>
                <meta http-equiv="refresh" content="3 , url= Profile.php"/>
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
    <title>البروفايل</title>
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
                    <p>الملف الشخصي</p>
                </td>
                <td><a href="index.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
    </div>


    <form method="post" enctype="multipart/form-data">
        <div class="profile_container">
            <div class="user_image_profile">
                <img src="user-img/<?php echo $Row['SignUp_img']; ?>">
            </div>
            <?php echo @$Error ?>
            <input required value="<?php echo $Row['SignUp_name']; ?>" name="user_name" type="text" class="input_info" placeholder=" أدخل الاسم الثلاثي"><i class="fa-solid fa-user i_font"></i>

            <input required value="<?php echo $Row['SignUp_email']; ?>"  name="user_email" type="email" class="input_info" placeholder="أدخل الايميل"><i class="fa-solid fa-envelope i_font"></i>

            <input required value="<?php echo $Row['SignUp_pass']; ?>"  name="user_password" type="text" class="input_info" placeholder="أدخل الباسورد"><i class="fa-solid fa-fingerprint i_font i_pass"></i>

            <input type="text" value="<?php echo $Row['SignUp_skill']; ?>"  name="user_skills" class="input_info" placeholder="ماهي مهاراتك"><i class="fa-solid fa-paperclip i_font"></i>

            <input type="text" value="<?php echo $Row['SignUp_career']; ?>"  name="user_carrer" class="input_info" placeholder="ماهو تخصصك"><i class="fa-solid fa-hand-holding-dollar i_font"></i>

            <input type="file" value="<?php echo $Row['SignUp_img']; ?>"  name="upload_image" value="أختر صورة" class="upload">

            <div class="signUp">
                <a href="ShowAllProducts.php" class="first_link"><input name="upload" type="submit" value="تعديل البيانات " class="createAccount"></a>
            </div>
        </div>
    </form>


</body>

</html>