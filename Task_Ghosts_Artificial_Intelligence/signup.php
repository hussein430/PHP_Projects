<?php
// connection folder
require "Alaa/Alaa.php";
// connection variable
global $Alex;
// take the data from input
@$post_name = $_POST['user_name'];
@$post_phone = $_POST['user_phone'];
@$post_password = $_POST['user_pass'];

// create token
$token = date("dmyhis");
$rand_num = rand(1, 2000);
$new_token = $token . $rand_num;

//connection when we enter submit 
if (isset($_POST['signUp'])) {
    if (empty($post_name && $post_password)) {
        $Error = "<h3 class='pop_up_error'>Please enter the information</h3>";
    } else {
        $data_enter = "INSERT INTO team
    (
        Team_token,
        Team_name,
        Team_number,
        Team_pass
    )VALUES(
        '$new_token',
        '$post_name',
        '$post_phone',
        '$post_password'
    )";


        if (mysqli_query($Alex, $data_enter)) {
            @setcookie("Token", $new_token, time() + (86400), "/");
            @setcookie("User", $post_name, time() + (86400), "/");
            @setcookie("hussein", "1", time() + (86400), "/");

            echo '
            <link rel="stylesheet" href="css/signUp.css">

                <div class="pop_up_sigup">
                    <img src="img/giphy.gif" />
                    <p class="pop_up_p">Account successfully created</p>
                </div>
                <meta http-equiv="refresh" content="3 , url=index.php"/>
                ';
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="css/signUp.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b81843000d.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="image_container">
        <img src="img/circle-5090539_1280.jpg" alt="circle image">
    </div>
    <form method="post">
        <div class="container">
            <h1>Welcome</h1>
            <?php echo @$Error ?>
            <input required name="user_name" type="text" class="input_info" placeholder="User Name"><i class="fa-solid fa-user i_font"></i>
            <input required name="user_phone" type="number" class="input_info" placeholder="Phone Number"><i class="fa-solid fa-envelope i_font"></i>
            <input required name="user_pass" type="password" class="input_info" placeholder="User Password"><i class="fa-solid fa-fingerprint i_font i_pass"></i>
            <div class="signUp">
                <a href="ShowAllProducts.php" class="first_link"><input name="signUp" type="submit" value="Create Account" class="createAccount"></a>
                <a href="index.php" class="second_link"> Back</a>
                <a href="login.php" class="third_link">Sign In</a>
            </div>
        </div>
    </form>


</body>

</html>