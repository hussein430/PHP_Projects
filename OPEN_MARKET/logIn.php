<?php
if (@$_COOKIE["hussein"] == '1') {
    echo '
    <link rel="stylesheet" href="css/style.css">
    <body class="body-pop-up-already_login">
        <div class="pop_up_already_login">
            <img src="img/comp_3.gif" />
            <p class="pop_up_p"> عذرا انت مسجل دخول بالفعل</p>
        </div>
    </body>
    <meta http-equiv="refresh" content="3 , url=index.php"/>
    ';
    exit();
}

// connection folder
require "Alaa/Alaa.php";
// connection variable
global $Alex;

@$post_name = $_POST['user_name'];
@$post_password = $_POST['user_password'];

// Condition for security 

if (isset($_POST['signin'])) {
    if (empty($post_name && $post_password)) {
        $Error = "<h3 class='pop_up_error_login'>رجاءا ادخل المعلومات </h3>";
    } else {
        // Select all the values which have same name 
        $find_name = "SELECT * FROM signup WHERE SignUp_name='$post_name'";
        $run_find_name = mysqli_query($Alex, $find_name);

        // Condition for how many repeat the same value
        if (mysqli_num_rows($run_find_name) > 0) {
            $row = mysqli_fetch_array($run_find_name);
            $NameUser = $row['SignUp_name'];
            $PassUser = $row['SignUp_pass'];
            $TokenUser = $row['SignUp_token'];
            if ($post_password != $PassUser) {
                $Error = "<h3 class='pop_up_error_login'>عذرا كلمة المرور غير صحيحة</h3>";
            } else {
                setcookie("Token", $TokenUser, time() + (86400), "/");
                setcookie("User", $NameUser, time() + (86400), "/");
                setcookie("hussein", "1", time() + (86400), "/");


                echo '
                <link rel="stylesheet" href="css/style.css">

                <div class="pop_up_sigup">
                    <img src="img/giphy.gif" />
                    <p class="pop_up_p">تم تسجيل الدخول بنجاح</p>
                </div>
                <meta http-equiv="refresh" content="3 , url=index.php"/>
                ';
                exit();
            }
        } else {
            $Error = "<h3 class='pop_up_error_login'>عذرا لاتوجد بيانات بهذا الاسم</h3>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">

</head>

<body>
    <div class="image_container">
        <img src="img/pexels-pixabay-158179.jpg" alt="flower image">
    </div>

    <form action="" method="post">
        <div class="container">
            <div class="user_image">
                <i class="fa-solid fa-circle-user fa-2xl"></i>
                <?php echo @$Error ?>
            </div>
            <div class="log_in">
                <input required name="user_name" type="text" class="input_info" placeholder=" أدخل الاسم الثلاثي"><i class="fa-solid fa-user i_font"></i>
                <input required name="user_password" type="password" class="input_info" placeholder="أدخل الباسورد"><i class="fa-solid fa-fingerprint i_font i_pass"></i>
                <div class="signUp">
                    <a href="#" class="first_link"><input name="signin" value="تسجيل الدخول" class="createAccount" type="submit"></a>
                    <a href="index.php" class="second_link"> الرجوع</a>
                    <a href="signup.php" class="third_link">انشاء الحساب</a>
                </div>
            </div>
        </div>
    </form>

</body>

</html>