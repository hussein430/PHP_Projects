<!-- Back-End -->

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
// take the data from input
@$post_name = $_POST['user_name'];
@$post_email = $_POST['user_email'];
@$post_password = $_POST['user_password'];
@$post_skills = $_POST['user_skills'];
@$post_career = $_POST['user_carrer'];

// create token
$token = date("dmyhis");
$rand_num = rand(1, 2000);
$new_token = $token . $rand_num;

//connection when we enter submit 
if (isset($_POST['signUp'])) {
    if (empty($post_name && $post_email && $post_password)) {
        $Error = "<h3 class='pop_up_error'>رجاءا ادخل المعلومات </h3>";
    } else {


        $data_enter = "INSERT INTO signup
        (
            SignUp_token,
            SignUp_name,
            SignUp_email,
            SignUp_pass,
            SignUp_skill,
            SignUp_career
        )VALUES(
            '$new_token',
            '$post_name',
            '$post_email',
            '$post_password',
            '$post_skills',
            '$post_career'
        )"; 
  
        if (mysqli_query($Alex, $data_enter)) {
            setcookie("Token", $new_token, time() + (86400), "/");
            setcookie("User", $post_name, time() + (86400), "/");
            setcookie("hussein", "1", time() + (86400), "/");

            echo '
            <link rel="stylesheet" href="css/style.css">

                <div class="pop_up_sigup">
                    <img src="img/giphy.gif" />
                    <p class="pop_up_p">تم ارسال البيانات بنجاح</p>
                </div>
                <meta http-equiv="refresh" content="3 , url=index.php"/>
                ';
            exit();
        }
    }
}

?>

<!-- Front-End -->

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انشاء الحساب</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">

</head>

<body>
    <div class="image_container">
        <img src="img/685208.jpg" alt="flower image">
    </div>
    <form method="post">
        <div class="container">
            <h1>اهلا وسهلا بكم </h1>
            <?php echo @$Error ?>
            <input required name="user_name" type="text" class="input_info" placeholder=" أدخل الاسم الثلاثي"><i class="fa-solid fa-user i_font"></i>
            <input required name="user_email" type="email" class="input_info" placeholder="أدخل الايميل"><i class="fa-solid fa-envelope i_font"></i>
            <input required name="user_password" type="password" class="input_info" placeholder="أدخل الباسورد"><i class="fa-solid fa-fingerprint i_font i_pass"></i>
            <input type="text" name="user_skills" class="input_info" placeholder="ماهي مهاراتك"><i class="fa-solid fa-paperclip i_font"></i>
            <input type="text" name="user_carrer" class="input_info" placeholder="ماهو تخصصك"><i class="fa-solid fa-hand-holding-dollar i_font"></i>
            <div class="signUp">
                <a href="ShowAllProducts.php" class="first_link"><input name="signUp" type="submit" value="انشاء الحساب" class="createAccount"></a>
                <a href="index.php" class="second_link"> الرجوع</a>
                <a href="login.php" class="third_link">تسجيل الدخول</a>
            </div>
        </div>
    </form>


</body>

</html>